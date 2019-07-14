<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AbsensiController extends Controller
{
    // function index(Request $request) {
    //     $set_kelas      = $request->query('kelas');
    //     $set_semester   = $request->query('semester');
    // 	$title 		= 'Input Absensi';
    //     $siswa      = \App\Siswa::all();
    //     $kelas      = \App\Kelas::all();
    //     $details    = [];

    //     foreach ( $siswa as $sis ) {
    //         $data[] = [
    //             'nis'   => $sis->nis,
    //             'nama'  => $sis->nama,
    //             'hadir' => $this->getStatus($sis->id, 'H')->count(),
    //             'sakit' => $this->getStatus($sis->id, 'S')->count(),
    //             'ijin'  => $this->getStatus($sis->id, 'I')->count(),
    //             'alpa'  => $this->getStatus($sis->id, 'A')->count(),
    //         ];
    //         $details = collect($data);
    //     }   

    // 	return view( 'absensi.index', ['data_absensi' => $details, 'data_kelas' => $kelas, 'title' => $title]);
    // }

    function index(Request $request) {
        $set_kelas      = $request->query('kelas');
        $set_semester   = $request->query('semester');
        $title      = 'Input Absensi';
        $siswa      = \App\Siswa::all();
        $kelas      = \App\Kelas::all();
        $details    = [];

        if ( isset( $set_kelas ) && $set_kelas != 0 ) {
            $absensi = DB::table('absensi')
                    ->where('id_kelas', $set_kelas )
                    ->where('semester', $set_semester )
                    ->first();
            $detail_absensi = DB::table('detail_absensi')
                    ->where('id_absensi', $absensi->id )
                    ->get();
            dd($detail_absensi);
        }

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

        return view( 'absensi.index', ['data_absensi' => $details, 'data_kelas' => $kelas, 'title' => $title]);
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

    public function getNamaKelas($id)
    {
        $kelas    = DB::table('kelas')
                    ->select('nama_kelas')
                    ->where('id', $id )
                    ->first();

        return $kelas->nama_kelas;
    }

    public function simpan(Request $request)
    {
        $absensi            =  new \App\Absensi;
        $absensi->id_guru   = $request->input('id_guru');
        $absensi->id_kelas  = $request->input('id_kelas');
        $absensi->id_mapel  = $request->input('id_mapel');
        $absensi->semester  = $request->input('semester');
        $absensi->tanggal   = $request->input('tanggal');
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
}
