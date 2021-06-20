<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::resource('request-surat', RequestController::class)->only(['index', 'show', 'update']);
    Route::resource('response-surat', ResponseController::class)->only(['index', 'show']);

    Route::get('/tambahsuratkeluar', [App\Http\Controllers\SuratkeluarController::class, 'create'])->name('tambahsuratkeluar');
    Route::post('/simpansuratkeluar', [App\Http\Controllers\SuratkeluarController::class, 'store'])->name('simpansuratkeluar');
    Route::get('/suratkeluar/{keluar}/delete', [App\Http\Controllers\SuratkeluarController::class, 'delete'])->name('suratkeluar-delete-keluar');
    Route::get('/suratkeluar/{keluar}/edit', [App\Http\Controllers\SuratkeluarController::class, 'edit'])->name('suratkeluar-edit-keluar');
    Route::post('/suratkeluar/{keluar}/update', [App\Http\Controllers\SuratkeluarController::class, 'update'])->name('suratkeluar-update-keluar');

    Route::get('/tambahresponse', [App\Http\Controllers\ResponseController::class, 'create'])->name('tambahresponse');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/suratkeluar', [App\Http\Controllers\SuratkeluarController::class, 'index'])->name('suratkeluar');

Route::get('/response', [App\Http\Controllers\ResponseController::class, 'index'])->name('response');
