<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    protected $table = 'absensi';
	protected $fillable  = ['id_guru','id_kelas','id_mapel','semester','jam_pelajaran','tanggal'];

}
