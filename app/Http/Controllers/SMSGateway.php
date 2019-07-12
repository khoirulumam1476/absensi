<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SMSGateway extends Controller
{
    //
    public function index()
    {
    	$title 		= 'SMS Gateway';
    	$abensi    = DB::table('detail_absensi')
                    ->select('detail_absensi.status','detail_absensi.id_siswa')
                    ->where('status', '!=', 'H' )
                    ->get();
		$details = [];
        foreach ( $abensi as $sis ) {
            $data[] = [
                'nis'   	=> $this->getNisSiswa($sis->id_siswa),
                'nama'  	=> $this->getNamaSiswa($sis->id_siswa),
                'status' 	=> $sis->status,
            ];
            $details = collect($data);
        } 

        $details = collect($details);
    	return view( 'sms.index', ['data_absensi' => $details, 'title' => $title]);
    }

    public function getNamaSiswa($id)
    {
    	$siswa    = DB::table('siswa')
                    ->select('nama')
                    ->where('id', $id )
                    ->first();

    	return $siswa->nama;
    }

    public function getNisSiswa($id)
    {
    	$siswa    = DB::table('siswa')
                    ->select('nis')
                    ->where('id', $id )
                    ->first();

    	return $siswa->nis;
    }
}
