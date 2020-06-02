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

Route::get('/', 'TheController@index');

Route::get('/pemasukan', 'TheController@pemasukan');
Route::post('/pemasukan', 'TheController@add_pemasukan');

Route::get('/pengeluaran', 'TheController@pengeluaran');
Route::post('/pengeluaran', 'TheController@add_pengeluaran');

Route::get('/pembagian', 'TheController@pembagian');
Route::get('/add_pembagian', 'TheController@add_pembagian');
Route::post('/add_pembagian', 'TheController@add_pembagian_act');
Route::get('/edit_pembagian/{id}', 'TheController@edit_pembagian');
Route::post('/edit_pembagian', 'TheController@edit_pembagian_act');
Route::post('/hapus_pembagian', 'TheController@hapus_pembagian');

Route::get('/mutasi', 'TheController@mutasi');

Route::get('/catatan', 'TheController@catatan');
Route::get('/add_catatan', 'TheController@add_catatan');
Route::post('/add_catatan', 'TheController@add_catatan_act');
Route::get('/delete_catatan/{id}', 'TheController@delete_catatan');
