<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
	protected $table = 'guru';
	protected $fillable  = ['nip','nama_guru','ttl','jenis_kelamin','agama','telepon','alamat'];
}
