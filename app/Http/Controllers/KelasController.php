<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    function index() {
    	$data_kelas    = \App\Kelas::all();
    	$title 		   = 'Data Kelas';
        $data_jurusan  = \App\Jurusan::all();
    	return view( 'kelas.index', ['data_kelas' => $data_kelas, 'data_jurusan' => $data_jurusan, 'title' => $title ]);
    }
    
    function tambah(Request $request) {
    	\App\Kelas::create($request->all());
    	return redirect('/kelas')->with('sukses','Data Berhasil di Input');
    }
    
    public function edit($id)
    {  
    	$kelas  = \App\Kelas::find($id);
        $data_jurusan  = \App\Jurusan::all();
    	$title 	= 'Data Kelas';
    	return view('kelas.edit', ['kelas' => $kelas, 'data_jurusan' => $data_jurusan, 'title' => $title ]);

    }

    public function update(Request $request, $id)
    { 
    	$kelas = \App\Kelas::find($id);
    	$kelas->update($request->all());
    	$title 		= 'Data Kelas';
    	return redirect('/kelas')->with('sukses','Data Berhasil di Edit');

    }

    public function delete($id)
    { 
    	$kelas = \App\Kelas::find($id);
    	$kelas->delete($kelas);
    	$title 		= 'Data Kelas';
    	return redirect('/kelas')->with('sukses','Data Berhasil di hapus');

    }
}
