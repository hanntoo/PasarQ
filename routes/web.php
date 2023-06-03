<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.home');
    Route::view('/aboutpenjual', 'penjual.about')->name('penjual.about');
});

Route::middleware(['auth', 'checkRole:pembeli'])->group(function () {
    Route::get('/riwayat', RiwayatController::class)->name('riwayat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin',[AdminController::class, 'search']);
    Route::delete('/admin/hapus={id}',[AdminController::class,'destroy']);
});

require __DIR__.'/auth.php';
