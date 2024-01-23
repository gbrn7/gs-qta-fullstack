<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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
Route::get('/signIn', [AuthController::class, 'index'])->name('signIn');
Route::post('/signIn', [AuthController::class, 'authenticate'])->name('signIn.auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

Route::any('/{any}', function () {
    if(auth()->user()){
        return redirect()->route('admin.home');
    }

    return redirect()->route('signIn');
})->where('any', '.*');
