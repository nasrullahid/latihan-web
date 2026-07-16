<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
| Tempat mendefinisikan perintah Artisan berbasis Closure (CLI),
| bukan route web. Dijalankan lewat terminal, bukan lewat browser.
*/

// Perintah "php artisan inspire" -> menampilkan satu kutipan inspiratif.
// ->purpose() adalah deskripsi yang muncul di daftar "php artisan list".
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
