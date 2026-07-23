<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil/{nama}', function ($nama) {
    return view('profil', ['nama' => $nama]);
});

Route::get('/peserta',[PesertaController::class,'index']);
Route::get('/peserta/{id}',[PesertaController::class,'show']);

Route::resource('/produk',ProdukController::class);
