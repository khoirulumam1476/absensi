<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuruController extends Controller
{
    function index() {
    	$data_guru    = \App\Guru::all();
        $data_mapel   = \App\Mapel::all();
    	$title 		  = 'Data Guru';
    	return view( 'guru.index', [ 'data_guru' => $data_guru, 'data_mapel' => $data_mapel, 'title' => $title]);
    }
    function tambah(Request $request) {
    	
        // Input data user
        $user = new \App\User;
        $user->role             = 'guru';
        $user->name             = $request->nama_guru;
        $user->email            = $request->email_guru;
        $user->password         = bcrypt('rahasia');
        $user->remember_token   = str_random(60);
        $user->save();

        // Input data guru
        $request->request->add(['user_id' => $user->id]);
        $guru = \App\Guru::create($request->all());
        
        
    	return redirect('/guru')->with('sukses','Data Berhasil di Input');
    }

    public function edit($id)
    { 
    	$guru          = \App\Guru::find($id);
        $data_mapel    = \App\Mapel::all();
    	$title 		= 'Data Guru';
    	return view('guru.edit', ['guru' => $guru, 'data_mapel' => $data_mapel,  'title' => $title ]);

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

    public function detail($id)
    { 
        $guru = \App\Guru::find($id);
        $title      = 'Data Guru';
        return view('guru.detail', ['guru' => $guru, 'title' => $title ]);
    }
}
