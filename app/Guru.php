<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
	protected $table = 'guru';
	protected $fillable  = ['user_id','nip','nama_guru','email_guru','ttl','jenis_kelamin','agama','telepon','alamat','mengajar'];

	public function mapel()
	{
		return $this->hasMany('App\Mapel');
	}
}
