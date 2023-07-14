<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/user', UserController::class);

Route::resource('/alternatif', AlternatifController::class);

Route::resource('/kriteria', KriteriaController::class);

Route::resource('/transaksi', TransaksiController::class);
Route::get('/laporan/trs', [LaporanController::class, 'transaksi']);
Route::get('/laporan/trs/pdf', [LaporanController::class, 'transaksiPdf']);

Route::get('/laporan/buku', [LaporanController::class, 'buku']);
Route::get('/laporan/buku/pdf', [LaporanController::class, 'bukuPdf']);