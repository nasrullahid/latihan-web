<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaContoller;
use App\Http\Controllers\ProdukContoller;
use App\Http\Controllers\KategoriContoller;

Route::get('/', [BerandaContoller::class,'index'])->name('beranda');
Route::get('/tentang', [BerandaContoller::class,'tentang'])->name('tentang');
Route::get('/produk', [ProdukContoller::class,'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukContoller::class,'show'])->name('produk.show');
Route::get('/kategori/{slug}', [KategoriContoller::class,'show'])->name('kategori.show');
