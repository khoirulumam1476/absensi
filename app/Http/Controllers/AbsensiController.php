<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AbsensiController extends Controller
{
    function index() {
    	$title 		= 'Input Absensi';
        $siswa      = \App\Siswa::all();
        $details    = [];

        foreach ( $siswa as $sis ) {
            $data[] = [
                'nis'   => $sis->nis,
                'nama'  => $sis->nama,
                'hadir' => $this->getStatus($sis->id, 'H')->count(),
                'sakit' => $this->getStatus($sis->id, 'S')->count(),
                'ijin'  => $this->getStatus($sis->id, 'I')->count(),
                'alpa'  => $this->getStatus($sis->id, 'A')->count(),
            ];
            $details = collect($data);
        }   

        // dd($details);
    	return view( 'absensi.index', ['data_absensi' => $details, 'title' => $title]);
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

    public function list()
    {
    	$title 		= 'Daftar Kelas';
    	$data_kelas = \App\Kelas::all();
    	return view( 'absensi.list', ['data_kelas' => $data_kelas, 'title' => $title]);
    }

    public function update(Request $request)
    {
    	$kode_kelas = $request->query('kode_kelas');
        $data_mapel = \App\Mapel::all();

    	$title 		= 'Update Absensi';
    	if ( isset( $kode_kelas ) ) {
    		$data_siswa = \App\Siswa::where( 'kelas', $kode_kelas )->get();
    	} else {
    		$data_siswa = \App\Siswa::all();
    	}
    	return view( 'absensi.update', ['data_siswa' => $data_siswa,'data_mapel' => $data_mapel, 'title' => $title]);
    }

    public function simpan(Request $request)
    {
        $absensi            =  new \App\Absensi;
        $absensi->id_guru   = $request->input('id_guru');
        $absensi->id_kelas  = $request->input('id_kelas');
        $absensi->tanggal   = $request->input('tanggal');
        $absensi->save();

        foreach ( $request->absen as $user_id => $status ) {
            $detail_absensi = new \App\DetailAbsensi;
            $detail_absensi->id_absensi  = $absensi->id;
            $detail_absensi->id_siswa    = $user_id;
            $detail_absensi->status      = $status;
            $detail_absensi->save();
        }

        return redirect('/absensi/update')->with('sukses','Data Berhasil di Input');

    }
}
