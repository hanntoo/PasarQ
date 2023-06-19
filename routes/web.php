<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;

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
Route::get('/', [HomeController::class, 'search'])->name('home');

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
    Route::get('/keranjang', [KeranjangController::class, 'getKeranjang'])->name('keranjang');
    Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail');
});

Route::middleware(['auth', 'checkRole:pembeli,penjual,admin'])->group(function () {
    Route::get('/riwayat', RiwayatController::class)->name('riwayat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/favorite/postFavorite', [FavoriteController::class, 'addFavorite'])->name('favorite.add');
    Route::post('/favorite/removeFavorite', [FavoriteController::class, 'removeFavorite'])->name('favorite.remove');
    Route::get('/favorite', [FavoriteController::class, 'getFavorite'])->name('favorite');
    Route::post('/keranjang/addKeranjang', [KeranjangController::class, 'addKeranjang'])->name('keranjang.add');
    Route::post('/keranjang/removeKeranjang', [KeranjangController::class, 'removeKeranjang'])->name('keranjang.remove');
    Route::post('/chekcout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/{id}', [CheckoutController::class, 'getProductCheckout'])->name('checkout.get');
    Route::get('/riwayat', [CheckoutController::class, 'getCheckout'])->name('riwayat');
    Route::get('/riwayat/checkout/{id}', [CheckoutController::class, 'getCheckoutById'])->name('riwayat.detail');
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
