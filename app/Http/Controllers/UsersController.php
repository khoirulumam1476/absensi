<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

   	public function index()
   	{
   		$data_users = \App\User::all();
    	$title 		= 'Data Users';
    	return view( 'user.index', ['data_users' => $data_users, 'title' => $title ]);
   	}

   	public function edit($id)
    { 
    	$users     = \App\User::find($id);
    	$title 	   = 'Data User';
    	return view('user.edit', ['users' => $users, 'title' => $title ]);

    }

    public function update(Request $request, $id)
    { 
    	$users = \App\User::find($id);
    	$users->email 		= $request->email;
    	$users->role 		= $request->role;
    	$users->password 	= bcrypt($request->password);
    	$users->update();

    	$title 		= 'Data Users';
    	return redirect('/users')->with('sukses','Data Berhasil di Edit');

    }

    public function delete($id)
    { 
    	$users = \App\User::find($id);
    	$users->delete($users);
    	$title 		= 'Data User';
    	return redirect('/users')->with('sukses','Data Berhasil di hapus');

    }
}	
