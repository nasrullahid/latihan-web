<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil/{id}', );

// Route::get('/profil/{nama}', function ($nama) {
//     $data = ['nama'=>$nama];
//     return view('profil',$data);
// });
