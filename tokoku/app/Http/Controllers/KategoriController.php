<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData; // sumber data produk

/**
 * KategoriController
 *
 * Menampilkan halaman produk yang difilter berdasarkan kategori.
 */
class KategoriController extends Controller
{
    // Halaman kategori: menampilkan produk untuk satu $slug kategori dari URL.
    public function show(string $slug)
    {
        // Ambil semua produk yang termasuk kategori ini
        $produk = ProdukData::perKategori($slug);

        // Cari data kategori (nama & slug) yang cocok dengan slug pada URL
        $kategori = collect(ProdukData::daftarKategori())->firstWhere('slug', $slug);

        // Tentukan nama kategori untuk judul halaman.
        // Jika slug tidak ada di daftar, ubah slug jadi teks rapi sebagai cadangan,
        // contoh: "alat-tulis" -> "Alat Tulis".
        $namaKategori = $kategori['nama'] ?? ucwords(str_replace('-', ' ', $slug));

        // Kirim data ke view resources/views/kategori/show.blade.php
        return view('kategori.show', compact('produk', 'slug', 'namaKategori'));
    }
}
