<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\JamPraktikController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\KontenController;
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

Route::get('', [ClientController::class, 'index'])->name('client.index');
Route::get('/form-reservasi', [ClientController::class, 'formView'])->name('client.form');
Route::get('/get-jam-praktik', [ClientController::class, 'getJamPraktik'])->name('client.getJamPraktik');
Route::post('/create-transaction', [ClientController::class, 'storeTransaction'])->name('client.storeTransaction');

Route::get('/sign-in-admin', [AuthController::class, 'index'])->name('signIn');
Route::post('/sign-in-admin', [AuthController::class, 'authenticate'])->name('signIn.auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    
    Route::get('/getCurrentUser', [AuthController::class, 'getCurrentUser'])->name('admin.getCurrentUser');
    Route::put('/updateCurrentUser', [AuthController::class, 'updateUserData'])->name('admin.updateCurrentUser');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::prefix('/data-jam-praktik')->group(function () {
        Route::get('/', [JamPraktikController::class, 'index'])->name('admin.data.jam-praktik');
        Route::post('/', [JamPraktikController::class, 'index'])->name('admin.data.jam-praktik.filter');
        Route::post('/store', [JamPraktikController::class, 'store'])->name('admin.data.jam-praktik.store');
        Route::put('/edit', [JamPraktikController::class, 'update'])->name('admin.data.jam-praktik.update');
        Route::delete('/destroy', [JamPraktikController::class, 'delete'])->name('admin.data.jam-praktik.delete');
    });

    Route::prefix('data-cabang')->group(function () {
        Route::get('/', [CabangController::class, 'index'])->name('admin.data.cabang');
        Route::post('/', [CabangController::class, 'index'])->name('admin.data.cabang.filter');
        Route::post('/store', [CabangController::class, 'store'])->name('admin.data.cabang.store');
        Route::put('/update', [CabangController::class, 'update'])->name('admin.data.cabang.update');
        Route::delete('/destroy', [CabangController::class, 'delete'])->name('admin.data.cabang.delete');
    });    

    Route::prefix('/data-transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('admin.data.transaksi');
        Route::post('/', [TransaksiController::class, 'index'])->name('admin.data.transaksi.filter');
    });

    Route::prefix('manajemen-konten')->group(function () {
        Route::get('/', [KontenController::class, 'index'])->name('admin.manajemen.konten');
        Route::get('/header', [KontenController::class, 'kontenHeader'])->name('admin.manajemen.konten.header');
        Route::put('/header', [KontenController::class, 'updateKontenHeader'])->name('admin.manajemen.konten.header.update');
        
        Route::prefix('body')->group(function (){
            Route::get('/', [KontenController::class, 'kontenBody'])->name('admin.manajemen.konten.body');
            Route::delete('/', [KontenController::class, 'deleteKontenBody'])->name('admin.manajemen.konten.body.delete');
            Route::put('/', [KontenController::class, 'updateJudulKontenBody'])->name('admin.manajemen.konten.body.judul.update');
            Route::get('/create', [KontenController::class, 'createKontenBody'])->name('admin.manajemen.konten.body.create');
            Route::post('/store', [KontenController::class, 'storeKontenBody'])->name('admin.manajemen.konten.body.store');
        });
    });


});
