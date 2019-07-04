<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    function index() {
    	$data_mapel = \App\Mapel::all();
    	$title 		= 'Data Mata Pelajaran';
    	return view( 'mapel.index', ['data_mapel' => $data_mapel, 'title' => $title]);
    }
    function tambah(Request $request) {
    	\App\Mapel::create($request->all());
    	return redirect('/mapel')->with('sukses','Data Berhasil di Input');
    }
    public function edit($id)
    { 
    	$mapel = \App\Mapel::find($id);
    	$title 		= 'Data Mapel';
    	return view('mapel.edit', ['mapel' => $mapel, 'title' => $title ]);

    }

    public function update(Request $request, $id)
    { 
    	$mapel = \App\Mapel::find($id);
    	$mapel->update($request->all());
    	$title 		= 'Data Mapel';
    	return redirect('/mapel')->with('sukses','Data Berhasil di Edit');

    }

    public function delete($id)
    { 
    	$mapel = \App\Mapel::find($id);
    	$mapel->delete($mapel);
    	$title 		= 'Data Mapel';
    	return redirect('/mapel')->with('sukses','Data Berhasil di hapus');

    }
}
