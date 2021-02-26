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
//ADMIN
Route::get('/', 'App\Http\Controllers\AdminController@index');
Route::get('/settings', 'App\Http\Controllers\AdminController@settings');
Route::put('/setting/{id}/edit', 'App\Http\Controllers\AdminController@update');



Route::resource('/dataabsen', 'App\Http\Controllers\DataAbsenController');
Route::resource('/cardsdata', 'App\Http\Controllers\DataKartuController');
Route::resource('/newcards', 'App\Http\Controllers\DataKartuBaruController');
Route::resource('/blockedcards', 'App\Http\Controllers\DataKartuBlokController');

Route::resource('/schedules', 'App\Http\Controllers\JadwalController');



//DATA KARTU API
Route::get('/simpankartu/{uid}/{key}', 'App\Http\Controllers\ApiController@simpankartu');
Route::get('/devicemode/{key}', 'App\Http\Controllers\ApiController@deviceMode');
Route::get('/absensi/{id}/{key}', 'App\Http\Controllers\ApiController@absen');
