<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{

    function index(Request $request) {
        $set_kelas      = $request->query('kelas');
        $set_semester   = $request->query('semester');
        $title      = 'Input Absensi';
        $siswa      = \App\Siswa::all();
        $kelas      = \App\Kelas::all();
        $details    = [];
        $absensi    = DB::table('absensi')
                    ->select('id_siswa')
                    ->leftJoin('detail_absensi', 'id_absensi', '=', 'detail_absensi.id_absensi' );

        if ($request->has('kelas') && $set_kelas != 0 ) {
            $absensi->where('id_kelas', '=', $set_kelas);
        }
        if ($request->has('semester') && $set_semester != 0) {
            $absensi->where('semester', '=', $set_semester);
        }
        $result = $absensi->distinct()->get();

        foreach ( $result as $sis ) {
            $data[] = [
                'id'    => $sis->id_siswa,
                'nis'   => $this->getNis($sis->id_siswa),
                'nama'  => $this->getNama($sis->id_siswa),
                'hadir' => $this->getStatus($sis->id_siswa, 'H')->count(),
                'sakit' => $this->getStatus($sis->id_siswa, 'S')->count(),
                'ijin'  => $this->getStatus($sis->id_siswa, 'I')->count(),
                'alpa'  => $this->getStatus($sis->id_siswa, 'A')->count(),
            ];
            $details = collect($data);
        }   
        // dd($details);
        return view( 'absensi.index', ['data_absensi' => $details, 'data_kelas' => $kelas, 'title' => $title]);
    }


    public function list()
    {
    	$title 		= 'Daftar Kelas';
    	$data_kelas = \App\Kelas::all();
        $details    = [];

        foreach ( $data_kelas as $kelas ) {
            $data[] = [
                'id_kelas'      => $kelas->id,
                'nama_kelas'    => $kelas->nama_kelas,
                'tidak_masuk'   => count( $this->getTidakMasuk($kelas->id)),
            ];
            $details = collect($data);
        }   
        // dd($details);
    	return view( 'absensi.list', ['data_kelas' => $details, 'title' => $title]);
    }

    public function input(Request $request)
    {
    	$id_kelas = $request->query('id_kelas');
        $data_mapel = \App\Mapel::all();
        $data_guru  = \App\Guru::all();

    	$title 		= 'Update Absensi';
    	if ( isset( $id_kelas ) ) {
    		$data_siswa = \App\Siswa::where( 'kelas', $this->getNamaKelas( $id_kelas ) )->get();
    	} else {
    		$data_siswa = \App\Siswa::all();
    	}
    	return view( 'absensi.input', ['data_siswa' => $data_siswa,'data_mapel' => $data_mapel,'data_guru' => $data_guru, 'title' => $title]);
    }

    public function simpan(Request $request)
    {
        $absensi                =  new \App\Absensi;
        $absensi->id_guru       = $request->input('id_guru');
        $absensi->id_kelas      = $request->input('id_kelas');
        $absensi->id_mapel      = $request->input('id_mapel');
        $absensi->semester      = $request->input('semester');
        $absensi->jam_pelajaran = $request->input('jam_pelajaran');
        $absensi->tanggal       = $request->input('tanggal');
        $absensi->save();

        foreach ( $request->absen as $user_id => $status ) {
            $detail_absensi = new \App\DetailAbsensi;
            $detail_absensi->id_absensi  = $absensi->id;
            $detail_absensi->id_siswa    = $user_id;
            $detail_absensi->status      = $status;
            $detail_absensi->save();
        }

        return redirect('/absensi')->with('sukses','Data Berhasil di Input');
    }

    public function export()
    {
        return Excel::download(new AbsensiExport(), 'absensi.xlsx');
    }

     public function getStatus($id, $status)
    {
        $details    = DB::table('detail_absensi')
                    ->select('detail_absensi.status')
                    ->where('id_siswa', $id )
                    ->where('status', $status )
                    ->get();

        return $details;
    }

    public function getNama($id)
    {
        $siswa    = DB::table('siswa')
                    ->select('nama')
                    ->where('id', $id )
                    ->first();

        return $siswa->nama;
    }

    public function getNis($id)
    {
        $siswa    = DB::table('siswa')
                    ->select('nis')
                    ->where('id', $id )
                    ->first();

        return $siswa->nis;
    }

    public function getNamaKelas($id)
    {
        $kelas    = DB::table('kelas')
                    ->select('nama_kelas')
                    ->where('id', $id )
                    ->first();

        return $kelas->nama_kelas;
    }

    public function getTidakMasuk($id)
    {
        $absensi    = DB::table('absensi')
                    ->join('detail_absensi', 'detail_absensi.id_absensi', 'absensi.id')
                    // ->select('id_kelas')
                    ->where('id_kelas', $id)
                    ->where('status', '!=', 'H')
                    ->get();

        return $absensi;
    }
}
