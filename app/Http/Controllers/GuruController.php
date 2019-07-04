<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    function index() {
    	$data_guru = \App\Guru::all();
    	$title 		= 'Data Guru';
    	return view( 'guru.index', ['data_guru' => $data_guru, 'title' => $title]);
    }
    function tambah(Request $request) {
    	\App\Guru::create($request->all());
    	return redirect('/guru')->with('sukses','Data Berhasil di Input');
    }

    public function edit($id)
    { 
    	$guru = \App\Guru::find($id);
    	$title 		= 'Data Guru';
    	return view('guru.edit', ['guru' => $guru, 'title' => $title ]);

    }

    public function update(Request $request, $id)
    { 
    	$guru = \App\Guru::find($id);
    	$guru->update($request->all());
    	$title 		= 'Data Guru';
    	return redirect('/guru')->with('sukses','Data Berhasil di Edit');

    }

    public function delete($id)
    { 
    	$guru = \App\Guru::find($id);
    	$guru->delete($guru);
    	$title 		= 'Data Guru';
    	return redirect('/guru')->with('sukses','Data Berhasil di hapus');

    }
}
