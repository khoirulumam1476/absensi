<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index() {
    	$data_siswa = \App\Siswa::all();
        $data_kelas = \App\Kelas::all();
    	$title 		= 'Data Siswa';
    	return view( 'siswa.index', ['data_siswa' => $data_siswa, 'data_kelas' => $data_kelas, 'title' => $title ]);
    }
    function tambah(Request $request) {
    	\App\Siswa::create($request->all());
    	return redirect('/siswa')->with('sukses','Data Berhasil di Input');
    }

    public function edit($id)
    { 
    	$siswa = \App\Siswa::find($id);
    	$title 		= 'Data Siswa';
    	return view('siswa.edit', ['siswa' => $siswa, 'title' => $title ]);

    }

    public function update(Request $request, $id)
    { 
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
    	$title 		= 'Data Siswa';
    	return redirect('/siswa')->with('sukses','Data Berhasil di Edit');

    }

    public function delete($id)
    { 
    	$siswa = \App\Siswa::find($id);
    	$siswa->delete($siswa);
    	$title 		= 'Data Siswa';
    	return redirect('/siswa')->with('sukses','Data Berhasil di hapus');

    }
}
