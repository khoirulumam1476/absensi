<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    function index() {
    	$title 		= 'Input Absensi';
    	$data_siswa = \App\Siswa::all();
    	return view( 'absensi.index', ['data_siswa' => $data_siswa, 'title' => $title]);
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
