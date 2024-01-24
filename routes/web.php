<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/sign-in-admin', [AuthController::class, 'index'])->name('signIn');
Route::post('/sign-in-admin', [AuthController::class, 'authenticate'])->name('signIn.auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    Route::get('/data-transaksi', [TransaksiController::class, 'index'])->name('admin.data.transaksi');
    Route::post('/data-transaksi', [TransaksiController::class, 'filter'])->name('admin.data.transaksi.filter');
});
