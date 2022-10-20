<?php

use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [PagesController::class, 'index']);

Route::get('/kamar-p', [PagesController::class, 'kamar']);

Route::get('/fasilitas', [PagesController::class, 'fasilitas']);

Route::get('/pemesanan', [PemesananController::class, 'index'])->middleware('user');

Route::get('/riwayat-pemesanan', [HomeController::class, 'riwayat'])->middleware('user');

Route::get('/invoice/{id}', [HomeController::class, 'invoice'])->middleware('user');

Route::get('/resepsionis', [PemesananController::class, 'resepsionis'])->name('resepsionis')->middleware('resepsionis');

Route::post('/pemesanan', [PemesananController::class, 'store'])->middleware('user');

Route::post('/status/{id}', [PemesananController::class, 'status']);

Route::resource('/kamar', KamarController::class)->middleware('admin');

Route::resource('/fasilitas-kamar', FasilitasKamarController::class)->middleware('admin');

Route::resource('/fasilitas-hotel', FasilitasHotelController::class)->middleware('admin');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user');

Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.adminhome')->middleware('admin');
