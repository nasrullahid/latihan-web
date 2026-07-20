<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Daftar semua URL (route) aplikasi beserta controller yang menanganinya.
| Pola: Route::get( '<url>', [Controller::class, '<method>'] )->name('<nama>');
| - ->name() memberi nama route agar bisa dipanggil via route('nama') di view.
| - {id} dan {slug} adalah parameter dinamis yang dikirim ke method controller.
*/

// Halaman beranda (URL: /)
Route::get('/', [BerandaController::class,'index'])->name('beranda');

// Halaman dashboard admin / kelola toko (URL: /dashboard)
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');

// Halaman tentang (URL: /tentang)
Route::get('/tentang', [BerandaController::class,'tentang'])->name('tentang');

// Halaman katalog / daftar semua produk (URL: /produk)
Route::get('/produk', [ProdukController::class,'index'])->name('produk.index');

// Halaman detail produk, {id} = id produk yang dibuka (URL: /produk/1)
Route::get('/produk/{id}', [ProdukController::class,'show'])->name('produk.show');

// Halaman produk per kategori, {slug} = slug kategori (URL: /kategori/elektronik)
Route::get('/kategori/{slug}', [KategoriController::class,'show'])->name('kategori.show');
