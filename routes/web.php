<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view( 'home', ['title'=>'Home']);
});

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@postlogin');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/tambah', 'SiswaController@tambah');
	Route::get('/siswa/{id}/edit', 'SiswaController@edit');
	Route::post('/siswa/{id}/update', 'SiswaController@update');
	Route::get('/siswa/{id}/delete', 'SiswaController@delete');

	Route::get('/guru', 'GuruController@index');
	Route::post('/guru/tambah', 'GuruController@tambah');
	Route::get('/guru/{id}/edit', 'GuruController@edit');
	Route::post('/guru/{id}/update', 'GuruController@update');
	Route::get('/guru/{id}/delete', 'GuruController@delete');

	Route::get('/jurusan', 'JurusanController@index');
	Route::post('/jurusan/tambah', 'JurusanController@tambah');
	Route::get('/jurusan/{id}/edit', 'JurusanController@edit');
	Route::post('/jurusan/{id}/update', 'JurusanController@update');
	Route::get('/jurusan/{id}/delete', 'JurusanController@delete');

	Route::get('/kelas', 'KelasController@index');
	Route::post('/kelas/tambah', 'KelasController@tambah');
	Route::get('/kelas/{id}/edit', 'KelasController@edit');
	Route::post('/kelas/{id}/update', 'KelasController@update');
	Route::get('/kelas/{id}/delete', 'KelasController@delete');

	Route::get('/mapel', 'MapelController@index');
	Route::post('/mapel/tambah', 'MapelController@tambah');
	Route::get('/mapel/{id}/edit', 'MapelController@edit');
	Route::post('/mapel/{id}/update', 'MapelController@update');
	Route::get('/mapel/{id}/delete', 'MapelController@delete');

	Route::get('/update', 'UpdateController@index');
	Route::get('/rekap', 'RekapController@index');
	Route::get('/koneksi', 'KoneksiController@index');
	Route::get('/controlaccess', 'KontrolaccessController@index');

	Route::get('/absensi', 'AbsensiController@index');
	Route::get('/absensi/list', 'AbsensiController@list');
	Route::get('/absensi/update', 'AbsensiController@update');
	Route::post('/absensi/simpan', 'AbsensiController@simpan');

	Route::get('/sms', 'SMSGateway@index');

});
