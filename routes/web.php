<?php

use App\Http\Controllers\RequestsController;
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

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/tambahsuratmasuk', [App\Http\Controllers\SuratmasukController::class, 'create'])->name('tambahsuratmasuk');
    Route::post('/simpansuratmasuk', [App\Http\Controllers\SuratmasukController::class, 'store'])->name('simpansuratmasuk');
    Route::get('/suratmasuk/{masuk}/delete', [App\Http\Controllers\SuratmasukController::class, 'delete'])->name('suratmasuk-delete-masuk');
    Route::get('/suratmasuk/{masuk}/edit', [App\Http\Controllers\SuratmasukController::class,'edit'])->name('suratmasuk-edit-masuk');
    Route::post('/suratmasuk/{masuk}/update', [App\Http\Controllers\SuratmasukController::class,'update'])->name('suratmasuk-update-masuk');
    
    Route::get('/tambahsuratkeluar', [App\Http\Controllers\SuratkeluarController::class, 'create'])->name('tambahsuratkeluar');
    Route::post('/simpansuratkeluar', [App\Http\Controllers\SuratkeluarController::class, 'store'])->name('simpansuratkeluar');
    Route::get('/suratkeluar/{keluar}/delete', [App\Http\Controllers\SuratkeluarController::class, 'delete'])->name('suratkeluar-delete-keluar');
    Route::get('/suratkeluar/{keluar}/edit', [App\Http\Controllers\SuratkeluarController::class,'edit'])->name('suratkeluar-edit-keluar');
    Route::post('/suratkeluar/{keluar}/update', [App\Http\Controllers\SuratkeluarController::class,'update'])->name('suratkeluar-update-keluar');
    
    Route::get('/tambahrequest', [App\Http\Controllers\RequestsController::class, 'create'])->name('tambahrequest');
    Route::post('/simpanrequest', [App\Http\Controllers\RequestsController::class, 'store'])->name('simpanrequest');
    
    Route::get('/tambahresponse', [App\Http\Controllers\ResponseController::class, 'create'])->name('tambahresponse');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/suratmasuk', [App\Http\Controllers\SuratmasukController::class, 'index'])->name('suratmasuk');

Route::get('/suratkeluar', [App\Http\Controllers\SuratkeluarController::class, 'index'])->name('suratkeluar');

Route::get('/requests', [App\Http\Controllers\RequestsController::class, 'index'])->name('requests');
Route::get('/requests/{request}', [App\Http\Controllers\RequestsController::class, 'show'])->name('requests.show');
Route::put('/requests/{data}', [RequestsController::class, 'update'])->name('requests.update');

Route::get('/response', [App\Http\Controllers\ResponseController::class, 'index'])->name('response');