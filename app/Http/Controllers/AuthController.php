<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
    	return view('auth.login', ['title' => 'Login']);
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }

    public function postlogin(Request $request)
    {
    	if ( Auth::attempt($request->only( 'email', 'password' ))) {
    		return redirect( '/');
    	}
    	return redirect( '/login')->with('gagal','Email atau password yang anda masukkan salah');
    }
}
