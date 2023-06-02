<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'checkRole:penjual'])->group(function () {
    Route::get('/dashboard', [PenjualController::class, 'index']);
    Route::get('/dashboard',[PenjualController::class, 'search']);
    Route::get('/dashboard/create',[PenjualController::class,'create']);
    Route::post('/dashboard/store',[PenjualController::class,'store']);
    Route::get('/dashboard/edit={id_produk}',[PenjualController::class,'edit']);
    Route::put('/dashboard/{id_produk}',[PenjualController::class,'update']);
    Route::delete('/dashboard/hapus={id_produk}',[PenjualController::class,'destroy']);
});

Route::middleware(['auth', 'checkRole:pembeli'])->group(function () {
    Route::get('/riwayat', RiwayatController::class)->name('riwayat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/about', 'about')->name('about');

require __DIR__.'/auth.php';
