<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';
    protected $fillable  = ['nis','nama','ttl','jenis_kelamin','agama','alamat','kelas','nama_wali','jenis_kelamin_wali','agama_wali','pekerjaan_wali','telepon_wali'];
}
