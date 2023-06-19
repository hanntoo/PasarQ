<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DetailController;
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
Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail');
Route::get('/search', [HomeController::class, 'search']);

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
    Route::get('/keranjang/{id}', function ($id) {
        return view('keranjang');
    })->name('keranjang');
    Route::get('/favorite/{id}', function ($id) {
        return view('favorite');
    })->name('favorite');
    Route::get('/riwayat', RiwayatController::class)->name('riwayat');
});

Route::middleware(['auth', 'checkRole:pembeli,penjual,admin'])->group(function () {
    Route::get('/riwayat', RiwayatController::class)->name('riwayat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    //crud-user
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin',[AdminController::class, 'search']);
    Route::get('/admin/create',[AdminController::class, 'create']);
    Route::post('/admin/store',[AdminController::class,'store']);
    Route::get('/admin/edit={id}',[AdminController::class,'edit']);
    Route::put('/admin/{id}',[AdminController::class,'update']);
    Route::delete('/admin/hapus={id}',[AdminController::class,'destroy']);
    //crud-kategori
    Route::get('/admin/kategori', [AdminController::class, 'indexK']);
    Route::get('/admin/kategori',[AdminController::class, 'searchK']);
    Route::get('/admin/kategori/create',[AdminController::class, 'createK']);
    Route::post('/admin/kategori/store',[AdminController::class,'storeK']);
    Route::get('/admin/kategori/edit={id_kategori}',[AdminController::class,'editK']);
    Route::put('/admin/kategori/{id_kategori}',[AdminController::class,'updateK']);
    Route::delete('/admin/kategori/hapus={id_kategori}',[AdminController::class,'destroyK']);
    //lihat & search produk
    Route::get('/admin/produk', [AdminController::class, 'indexP']);
    Route::get('/admin/produk',[AdminController::class, 'searchP']);
});

require __DIR__.'/auth.php';
