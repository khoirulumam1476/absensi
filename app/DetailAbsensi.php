<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAbsensi extends Model
{
    //
    protected $table = 'detail_absensi';
	protected $fillable  = ['id_absensi','id_siswa','status'];
}
