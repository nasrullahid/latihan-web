<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * UserController
 *
 * Controller sederhana yang hanya menampilkan view.
 * Catatan: saat ini route utama memakai BerandaController,
 * class ini disiapkan/dipakai sebagai contoh dasar.
 */
class UserController extends Controller
{
    // Menampilkan halaman beranda.
    public function index(){
        return view('beranda');
    }

    // Menampilkan halaman tentang.
    public function tentang(){
        return view('tentang');
    }
}
