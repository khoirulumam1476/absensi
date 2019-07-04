<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapController extends Controller
{
    function index() {
    	return view( 'rekap.index');
}
