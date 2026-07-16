<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// #[Fillable] menentukan kolom yang boleh diisi massal (mass assignment)
// lewat create()/update(), mencegah pengisian kolom yang tidak diinginkan.
#[Fillable(['name', 'email', 'password'])]
// #[Hidden] menyembunyikan kolom sensitif saat model diubah ke array/JSON,
// sehingga password & remember_token tidak ikut terekspos ke response.
#[Hidden(['password', 'remember_token'])]
/**
 * User
 *
 * Model Eloquent untuk tabel "users". Extends Authenticatable
 * karena dipakai sebagai model autentikasi (login) bawaan Laravel.
 */
class User extends Authenticatable
{
    // HasFactory  = mempermudah pembuatan data dummy (factory) untuk testing/seeder
    // Notifiable  = memungkinkan user menerima notifikasi (email, dll)
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Menentukan tipe casting otomatis untuk atribut tertentu.
     * - email_verified_at di-cast ke objek datetime (Carbon)
     * - password otomatis di-hash saat di-set (tidak disimpan sebagai teks polos)
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
