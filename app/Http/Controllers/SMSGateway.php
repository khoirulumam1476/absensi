<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Tests\Server;

class SMSGateway extends Controller
{
    //
    public function index()
    {
    	$title 		          = 'SMS Gateway';
    	$jam_pertama          = $this->getSiswaTidakMasukbyJam('pertama');
        $jam_kedua            = $this->getSiswaTidakMasukbyJam('kedua');
        $jam_ketiga           = $this->getSiswaTidakMasukbyJam('ketiga');
        $jam_keempat          = $this->getSiswaTidakMasukbyJam('keempat');
		$jam_pertama_details  = [];
        $jam_kedua_details    = [];
        $jam_ketiga_details   = [];
        $jam_keempat_details  = [];

        foreach ( $jam_pertama as $sis ) {
            $data[] = [
                'nis'   	=> $this->getNisSiswa($sis->id_siswa),
                'nama'  	=> $this->getNamaSiswa($sis->id_siswa),
                'kelas'     => $this->getKelasSiswa($sis->id_kelas),
                'status' 	=> $sis->status,
            ];
            $jam_pertama_details = collect($data);
        } 

        foreach ( $jam_kedua as $sis ) {
            $data[] = [
                'nis'       => $this->getNisSiswa($sis->id_siswa),
                'nama'      => $this->getNamaSiswa($sis->id_siswa),
                'kelas'     => $this->getKelasSiswa($sis->id_kelas),
                'status'    => $sis->status,
            ];
            $jam_kedua_details = collect($data);
        } 

        foreach ( $jam_ketiga as $sis ) {
            $data[] = [
                'nis'       => $this->getNisSiswa($sis->id_siswa),
                'nama'      => $this->getNamaSiswa($sis->id_siswa),
                'kelas'     => $this->getKelasSiswa($sis->id_kelas),
                'status'    => $sis->status,
            ];
            $jam_ketiga_details = collect($data);
        } 

        foreach ( $jam_keempat as $sis ) {
            $data[] = [
                'nis'       => $this->getNisSiswa($sis->id_siswa),
                'nama'      => $this->getNamaSiswa($sis->id_siswa),
                'kelas'     => $this->getKelasSiswa($sis->id_kelas),
                'status'    => $sis->status,
            ];
            $jam_keempat_details = collect($data);
        } 

    	return view( 'sms.index', [
            'jam_pertama'   => $jam_pertama_details, 
            'jam_kedua'     => $jam_kedua_details, 
            'jam_ketiga'    => $jam_ketiga_details, 
            'jam_keempat'   => $jam_keempat_details, 
            'title'         => $title
        ]);
    }

    public function kirimSMS(Request $request)
    {
    	$absensi    = $this->getSiswaTidakMasuk();
		$details 	= [];
        foreach ( $absensi as $sis ) {
        	switch ( $sis->status ) {
        		case 'S':
        			$body = "Pada jam mata pelajaran pertama anak Anda dengan nama {$this->getNamaSiswa($sis->id_siswa)} tidak masuk karna sakit.

						by
						kepsek MA Walisongo 3 Sebaung";
        			break;
        		case 'I':
        			$body = "Pada jam mata pelajaran pertama anak Anda dengan nama {$this->getNamaSiswa($sis->id_siswa)} tidak masuk karna Ijin.

						by
						kepsek MA Walisongo 3 Sebaung";
        			break;
        		case 'A':
        			$body = "Pada jam mata pelajaran pertama anak Anda dengan nama {$this->getNamaSiswa($sis->id_siswa)} tidak masuk tanpa keterangan Alias Bolos

						by
						kepsek MA Walisongo 3 Sebaung";
        			break;
        		default:
        			$body = '';
        			break;
        	}
            
            $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL 				=> "https://smsgateway24.com/getdata/addsms",
			  CURLOPT_RETURNTRANSFER 	=> true,
			  CURLOPT_ENCODING 			=> "",
			  CURLOPT_MAXREDIRS 		=> 10,
			  CURLOPT_TIMEOUT 			=> 0,
			  CURLOPT_FOLLOWLOCATION 	=> false,
			  CURLOPT_HTTP_VERSION 		=> CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST 	=> "POST",
			  CURLOPT_POSTFIELDS 		=> array(
			  		'token' => '56383d5d000a887ac11d21d2ab4ff365',
			  		'sendto' => $this->getTeleponWali($sis->id_siswa),
			  		'body' => $body,
			  		'device_id' => '778', 
			  		'sim' => '2'
			  	),
			));

			$response 	= curl_exec($curl);
			$err 		= curl_error($curl);

			curl_close($curl);
        } 


		return redirect('/sms')->with( 'sukses', 'Pesan berhasil dikirim' );
    }

    public function outbox()
    {
        $title      = 'SMS Gateway';
        $client     = new \GuzzleHttp\Client();
        
        $test = 'https://smsgateway24.com/getdata/getallsms?token=56383d5d000a887ac11d21d2ab4ff365&device_id=778&status=2&begindate=2019-07-13&enddate=2030-07-16';
        $result = file_get_contents( $test ); 
        $result = json_decode( $result ); 
        $details = [];

        if ( ! empty( $result->smss ) ) {
            foreach ( $result->smss as $sms ) {
                $data[] = [
                    'telepon'   => $sms->sendto,
                    'pesan'  	=> $sms->body,
                    'status' 	=> 'Terkirim',
                ];
                $details = collect($data);
            }  
        }

        return view( 'sms.outbox', ['data_sms' => $details, 'title' => $title]);
    }


    public function getSiswaTidakMasuk()
    {
    	$absensi    = DB::table('detail_absensi')
                    ->select('detail_absensi.status','detail_absensi.id_siswa')
                    ->where('status', '!=', 'H' )
                    ->get();
        return $absensi;
    }

    public function getSiswaTidakMasukbyJam( $jam )
    {
        $absensi    = DB::table('absensi')->distinct()
                    ->select('id_siswa','status','id_kelas','tanggal')
                    ->leftJoin('detail_absensi', 'absensi.id', '=', 'detail_absensi.id_absensi' )
                    ->where('status', '!=', 'H' )
                    ->where('jam_pelajaran', $jam )
                    ->whereDay('tanggal', '=', date('d') );
                    
        if ( $jam == 'kedua' || $jam == 'ketiga' || $jam == 'keempat' ) {
            $absensi->where('status', '=', 'A');
        }
        return $absensi->get();
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

    public function getKelasSiswa($id)
    {
        $kelas    = DB::table('kelas')
                    ->select('nama_kelas')
                    ->where('id', $id )
                    ->first();

        return $kelas->nama_kelas;
    }

    public function getTeleponWali($id)
    {
    	$siswa    = DB::table('siswa')
                    ->select('telepon_wali')
                    ->where('id', $id )
                    ->first();

    	return $siswa->telepon_wali;
    }
}
