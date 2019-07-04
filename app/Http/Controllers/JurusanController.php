<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
   function index() {
    	$data_jurusan = \App\Jurusan::all();
    	$title 		= 'Data Jurusan';
    	return view( 'jurusan.index', ['data_jurusan' => $data_jurusan, 'title'=> $title]);
    }
    function tambah(Request $request) {
    	\App\Jurusan::create($request->all());
    	return redirect('/jurusan')->with('sukses','Data Berhasil di Input');
    }
    public function edit($id)
    { 
    	$jurusan = \App\Jurusan::find($id);
    	$title 		= 'Data Jurusan';
    	return view('jurusan.edit', ['jurusan' => $jurusan, 'title' => $title ]);

    }

    public function update(Request $request, $id)
    { 
    	$jurusan = \App\Jurusan::find($id);
    	$jurusan->update($request->all());
    	$title 		= 'Data Jurusan';
    	return redirect('/jurusan')->with('sukses','Data Berhasil di Edit');

    }

    public function delete($id)
    { 
    	$jurusan = \App\Jurusan::find($id);
    	$jurusan->delete($jurusan);
    	$title 		= 'Data Jurusan';
    	return redirect('/jurusan')->with('sukses','Data Berhasil di hapus');

    }

}
