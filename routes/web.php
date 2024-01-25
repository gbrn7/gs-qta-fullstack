<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CabangController;
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
    
    Route::get('/getCurrentUser', [AuthController::class, 'getCurrentUser'])->name('admin.getCurrentUser');
    Route::put('/updateCurrentUser', [AuthController::class, 'updateUserData'])->name('admin.updateCurrentUser');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::prefix('data-cabang')->group(function () {
        Route::get('/', [CabangController::class, 'index'])->name('admin.data.cabang');
        Route::post('/', [CabangController::class, 'filter'])->name('admin.data.cabang.filter');
        Route::post('/store', [CabangController::class, 'store'])->name('admin.data.cabang.store');
        Route::put('/update', [CabangController::class, 'update'])->name('admin.data.cabang.update');
        Route::delete('/destroy', [CabangController::class, 'delete'])->name('admin.data.cabang.delete');
    });    

    Route::prefix('/data-transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('admin.data.transaksi');
        Route::post('/', [TransaksiController::class, 'filter'])->name('admin.data.transaksi.filter');
    });


});
