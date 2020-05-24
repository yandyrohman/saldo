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

Route::get('/pengeluaran', 'TheController@pengeluaran');

Route::get('/pembagian', 'TheController@pembagian');
Route::get('/form_pembagian', 'TheController@form_pembagian');

Route::get('/mutasi', 'TheController@mutasi');

Route::get('/bantuan', 'TheController@bantuan');

# sedikit catatan
/*
bila salah satu saldo dihapus, maka nilai dari saldo
sebelumnya akan ditambahkan ke semua saldo dengan nilai sama rata
*/
