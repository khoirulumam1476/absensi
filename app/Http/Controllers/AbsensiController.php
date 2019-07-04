<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    function index() {
    	$title 		= 'Input Absensi';
    	$data_siswa = \App\Siswa::all();
    	return view( 'absensi.index', ['data_siswa' => $data_siswa, 'title' => $title]);
    }
}
