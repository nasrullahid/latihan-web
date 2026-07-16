<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * AppServiceProvider
 *
 * Service provider utama aplikasi. Tempat mendaftarkan dan
 * menginisialisasi service/binding yang dibutuhkan aplikasi.
 * Dijalankan otomatis oleh Laravel saat aplikasi booting.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * register()
     * Dipakai untuk MENDAFTARKAN binding ke service container
     * (mis. bind interface ke class). Dipanggil paling awal,
     * sebelum semua provider selesai di-register.
     */
    public function register(): void
    {
        //
    }

    /**
     * boot()
     * Dijalankan SETELAH semua provider di-register. Cocok untuk
     * kode inisialisasi seperti View Composer, Blade directive,
     * event listener, atau konfigurasi lain saat startup.
     */
    public function boot(): void
    {
        //
    }
}
