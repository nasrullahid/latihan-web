<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData; // sumber data produk

/**
 * BerandaController
 *
 * Mengatur halaman statis / halaman depan situs:
 * - index():   halaman beranda (menampilkan produk unggulan)
 * - tentang(): halaman "Tentang"
 */
class BerandaController extends Controller
{
    // Halaman beranda.
    public function index(){
        // Ambil hanya produk unggulan untuk ditonjolkan di beranda
        $produkUnggulan = ProdukData::unggulan();

        // Kirim data ke view resources/views/beranda.blade.php
        return view('beranda', compact('produkUnggulan'));
    }

    // Halaman "Tentang" — tidak butuh data, cukup tampilkan view-nya.
    public function tentang(){
        return view('tentang');
    }
}
