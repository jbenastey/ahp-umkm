<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('master','MasterController')->middleware('auth');
Route::get('/pernyataan/{id}/create','MasterController@createPernyataan')->middleware('auth');
Route::post('/pernyataan/store', 'MasterController@storePernyataan');
Route::get('/pernyataan/{id}/edit','MasterController@editPernyataan')->middleware('auth');
Route::post('/pernyataan/update', 'MasterController@updatePernyataan');
Route::get('/pernyataan/{id}/delete/{idKriteria}','MasterController@destroyPernyataan')->middleware('auth');


//Route::resource('/kuesioner','KuesionerController')->middleware('auth');
Route::get('/kuesioner','KuesionerController@index')->middleware('auth');
Route::get('/kuesioner','KuesionerController@index')->middleware('auth');
Route::get('/kuesioner/isi', 'KuesionerController@kuesioner')->name('isi');
Route::post('/kuesioner/simpan', 'KuesionerController@simpanKuesioner')->name('simpan');
Route::get('/kuesioner/isi-karyawan', 'KuesionerController@kuesionerKaryawan')->name('isi-karyawan');
Route::post('/kuesioner/simpan-karyawan', 'KuesionerController@simpanKuesionerKaryawan')->name('simpan-karyawan');
Route::get('/kuesioner/isi-pakar', 'KuesionerController@kuesionerPakar')->name('isi-pakar');
Route::post('/kuesioner/simpan-pakar', 'KuesionerController@simpanKuesionerPakar')->name('simpan-pakar');

Route::get('/kuesioner/{id}/lihat','KuesionerController@show')->middleware('auth');

Route::get('/ahp','AhpController@index')->middleware('auth');
Route::get('/ahp/{id}/lihat','AhpController@show')->middleware('auth');
Route::get('/ahp/{id}/hitung/{jenis}','AhpController@hitung')->middleware('auth');
Route::get('/ahp/{id}/kinerja','AhpController@kinerja')->middleware('auth');

Route::get('/kuesioner/{id}/ubah-kriteria','KuesionerController@ubahKriteria')->middleware('auth');
Route::post('/kuesioner/{id}/update-kriteria','KuesionerController@updateKriteria')->middleware('auth');

Route::get('/kuesioner/{id}/ubah-subkriteria/{jenis}','KuesionerController@ubahSubkriteria')->middleware('auth');
Route::post('/kuesioner/{id}/update-subkriteria/{jenis}','KuesionerController@updateSubkriteria')->middleware('auth');

Route::get('/grafik/jurusan','GrafikController@jurusan')->middleware('auth');
Route::get('/grafik/individu/{jurusan}','GrafikController@individu')->middleware('auth');

Route::get('umkm','MasterController@indexUmkm')->middleware('auth');
Route::get('umkm/create','MasterController@createUmkm')->middleware('auth');
Route::post('umkm/store','MasterController@storeUmkm')->middleware('auth');

