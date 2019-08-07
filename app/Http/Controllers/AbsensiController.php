<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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

        if ($request->has('kelas') ) {
            $absensi->where('id_kelas', '=', $set_kelas);
        }
        if ($request->has('semester') ) {
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
        $user       = auth()->user();
        $set_user     = [
            'id_guru'     => $this->getIdGuruByUserID($user->id),
            'nama_mapel'  => $this->getGuruMengajarByuserID($user->id),
        ];
        $current_user = collect( $set_user );
    	$title 		= 'Update Absensi';
    	if ( isset( $id_kelas ) ) {
    		$data_siswa = \App\Siswa::where( 'kelas', $this->getNamaKelas( $id_kelas ) )->get();
    	} else {
    		$data_siswa = \App\Siswa::all();
    	}
    	return view( 'absensi.input', ['data_siswa' => $data_siswa,'data_mapel' => $data_mapel,'data_guru' => $data_guru, 'current_user' => $current_user, 'title' => $title]);
    }

    public function simpan(Request $request)
    {
        $absensi                =  new \App\Absensi;
        $absensi->id_guru       = $request->input('id_guru');
        $absensi->id_kelas      = $request->input('id_kelas');
        if ( auth()->user()->role == 'admin' ) {
            $absensi->id_mapel      = $request->input('id_mapel');
        } else {
            $absensi->id_mapel      = $this->getIdMapelbyNama($request->input('nama_mapel'));
        }
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

        return redirect('/absensi/detail/?id='.$absensi->id)->with('sukses','Data Berhasil di Input');
    }

    public function detail()
    { 
        $id         = isset( $_GET['id'] ) ? $_GET['id'] : '' ;
        $absensi    = DB::table('detail_absensi')
                    ->where('id_absensi', $id)
                    ->get();
        $details    = [];

        foreach ( $absensi as $sis ) {
            $data[] = [
                'nama'      => $this->getNama($sis->id_siswa),
                'nis'       => $this->getnis($sis->id_siswa),
                'status'    => $sis->status,
            ];
            $details = collect( $data );
        }
        $title      = 'Details Absensi';
        return view('absensi.detail', ['absensi' => $details, 'title' => $title ]);

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
                    ->where('jam_pelajaran', 'pertama')
                    ->whereDay('tanggal', '=', date('d') )
                    ->get();

        return $absensi;
    }

    public function getIdMapelbyNama($nama_mapel)
    {
        $mapel    = DB::table('mapel')
                    ->select('id')
                    ->where('nama_mapel', $nama_mapel )
                    ->first();

        return $mapel->id;
    }

    public function getIdGuruByUserID($user_id)
    {
        $guru    = DB::table('guru')
                    ->select('id')
                    ->where('user_id', $user_id )
                    ->first();

        return $guru->id;
    }

    public function getGuruMengajarByuserID($user_id)
    {
        $guru    = DB::table('guru')
                    ->select('mengajar')
                    ->where('user_id', $user_id )
                    ->first();

        return $guru->mengajar;
    }
}
