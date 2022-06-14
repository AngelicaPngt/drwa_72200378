<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Guru
Route::get('/guru','App\Http\Controllers\GuruController@getDataGuru')->middleware('verifystring');
Route::get('/guru/{id}','App\Http\Controllers\GuruController@getDataGuruById')->middleware('verifystring');
Route::post('/insertguru','App\Http\Controllers\GuruController@insertDataGuru')->middleware('verifystring');
Route::put('/updateguru','App\Http\Controllers\GuruController@updateDataGuru')->middleware('verifystring');
Route::delete('/deleteguru','App\Http\Controllers\GuruController@deleteDataGuru')->middleware('verifystring');
Route::get('/gurutoken','App\Http\Controllers\GuruController@getDataGuruToken')->middleware('verifystring');

//Kelas
Route::get('/kelas','App\Http\Controllers\KelasController@getDataKelas')->middleware('verifystring');
Route::get('/kelas/{id}','App\Http\Controllers\KelasController@getDataKelasById')->middleware('verifystring');
Route::post('/insertkelas','App\Http\Controllers\KelasController@insertDataKelas')->middleware('verifystring');
Route::put('/updatekelas','App\Http\Controllers\KelasController@updateDataKelas')->middleware('verifystring');
Route::delete('/deletekelas','App\Http\Controllers\KelasController@deleteDataKelas')->middleware('verifystring');
Route::get('/kelastoken','App\Http\Controllers\GuruController@getDataKelasToken')->middleware('verifystring');

//Mapel
Route::get('/mapel','App\Http\Controllers\MapelController@getDataMapel')->middleware('verifystring');
Route::get('/mapel/{id}','App\Http\Controllers\MapelController@getDataMapelById')->middleware('verifystring');
Route::post('/insertmapel','App\Http\Controllers\MapelController@insertDataMapel')->middleware('verifystring');
Route::put('/updatemapel','App\Http\Controllers\MapelController@updateDataMapel')->middleware('verifystring');
Route::delete('/deletemapel','App\Http\Controllers\MapelController@deleteDataMapel')->middleware('verifystring');
Route::get('/mapeltoken','App\Http\Controllers\MapelController@getDataMapelToken')->middleware('verifystring');

//Jadwal Guru
Route::get('/jadwal','App\Http\Controllers\JadwalController@getDataJadwal')->middleware('verifystring');
Route::get('/jadwal/{id}','App\Http\Controllers\JadwalController@getDataJadwalById')->middleware('verifystring');
Route::post('/insertjadwal','App\Http\Controllers\JadwalController@insertDataJadwal')->middleware('verifystring');
Route::put('/updatejadwal','App\Http\Controllers\JadwalController@updateDataJadwal')->middleware('verifystring');
Route::delete('/deletejadwal','App\Http\Controllers\JadwalController@deleteDataJadwal')->middleware('verifystring');
Route::get('/jadwaltoken','App\Http\Controllers\MapelController@getDataJadwalToken')->middleware('verifystring');

//Presensi Harian
Route::get('/harian','App\Http\Controllers\PresensiHarianController@getDataHarian')->middleware('verifystring');
Route::get('/harian/{id}','App\Http\Controllers\PresensiHarianController@getDataHarianById')->middleware('verifystring');
Route::post('/insertharian','App\Http\Controllers\PresensiHarianController@insertDataHarian')->middleware('verifystring');
Route::put('/updateharian','App\Http\Controllers\PresensiHarianController@updateDataHarian')->middleware('verifystring');
Route::delete('/deleteharian','App\Http\Controllers\PresensiHarianController@deleteDataHarian')->middleware('verifystring');
Route::get('/hariantoken','App\Http\Controllers\PresensiHarianController@getDataHarianToken')->middleware('verifystring');

//Presensi Mengajar
Route::get('/mengajar','App\Http\Controllers\PresensiMengajarController@getDataMengajar')->middleware('verifystring');
Route::get('/mengajar/{id}','App\Http\Controllers\PresensiMengajarController@getDataMengajarById')->middleware('verifystring');
Route::post('/insertmengajar','App\Http\Controllers\PresensiMengajarController@insertDatamengajar')->middleware('verifystring');
Route::put('/updatemengajar','App\Http\Controllers\PresensiMengajarController@updateDataMengajar')->middleware('verifystring');
Route::delete('/deletemengajar','App\Http\Controllers\PresensiMengajarController@deleteDataMengajar')->middleware('verifystring');
Route::get('/hariantoken','App\Http\Controllers\PresensiMengajarController@getDataMengajarToken')->middleware('verifystring');