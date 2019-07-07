<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
	protected $fillable  = ['kode_mapel','nama_mapel','kkm'];

	public function guru()
	{
		return $this->belongsTo('App\Guru');
	}
}
