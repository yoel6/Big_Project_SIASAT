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
    return view('welcome');
});
Route::get('/siasat/home', 'siasatController@home');
Route::get('/siasat/login', 'siasatController@login');
Route::post('/siasat/ceklogin', 'siasatController@ceklogin');
Route::post('/siasat/cek', 'siasatController@cek');
Route::post('/siasat/hasil', 'siasatController@hasil');
Route::get('/siasat/hapussession', 'siasatController@hapussession');
Route::get('/siasat/regristrasi', 'siasatController@regristrasi');
Route::get('/siasat/lengkap/{kodematkul}', 'siasatController@lengkap');
Route::get('/siasat/matakuliah', 'siasatController@matakuliah');
Route::get('/siasat/cekout/{kode}', 'siasatController@cekout');
Route::get('/siasat/matakuliah_share', 'siasatController@matakuliah_share');
Route::get('/siasat/matkul/{kode1}', 'siasatController@matkul');
Route::get('/siasat/matkul2/{kode2}', 'siasatController@matkul2');
Route::get('/siasat/kartu_study', 'siasatController@kartu_study');
Route::get('/siasat/hapus1/{kode3}', 'siasatController@hapus1');
Route::get('/siasat/jadwal', 'siasatController@jadwal');
Route::get('/siasat/login_dosen', 'siasatController@login_dosen');
Route::post('/siasat/login_dosen1', 'siasatController@login_dosen1');
Route::get('/siasat/Dosen', 'siasatController@Dosen');
Route::get('/siasat/hapussession1', 'siasatController@hapussession1');
Route::get('/siasat/dosen_kelas', 'siasatController@dosen_kelas');
Route::post('/siasat/proses_kelas', 'siasatController@proses_kelas');
Route::get('/siasat/akhir', 'siasatController@akhir');
Route::post('/siasat/input_kelas', 'siasatController@input_kelas');
Route::get('/siasat/kode_kelas', 'siasatController@kode_kelas');
Route::get('/siasat/tampilkan', 'siasatController@tampilkan');
Route::get('/siasat/hapus/{hapus}', 'siasatController@hapus');
Route::get('/siasat/tampilkan1/{tampilkan1}', 'siasatController@tampilkan1');
Route::get('/siasat/nilai/{nilai}', 'siasatController@nilai');


