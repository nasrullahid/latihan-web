<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData; // sumber data produk

/**
 * DashboardController
 *
 * Menampilkan halaman dashboard admin (read-only) untuk memantau kondisi
 * toko: kartu statistik, peringatan stok, ringkasan per kategori, dan
 * tabel seluruh produk. Semua angka diambil dari class ProdukData.
 */
class DashboardController extends Controller
{
    // Halaman dashboard: mengumpulkan data ringkasan lalu mengirimnya ke view.
    public function index()
    {
        $statistik = ProdukData::statistik();          // angka ringkasan untuk kartu statistik
        $ringkasanKategori = ProdukData::ringkasanKategori(); // rekap jumlah & stok per kategori
        $stokMenipis = ProdukData::stokMenipis();       // produk yang habis / menipis
        $produk = ProdukData::semua();                  // daftar lengkap untuk tabel produk

        // Kirim semua data ke view resources/views/dashboard/index.blade.php
        return view('dashboard.index', compact(
            'statistik',
            'ringkasanKategori',
            'stokMenipis',
            'produk'
        ));
    }
}
