<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData; // sumber data produk

/**
 * ProdukController
 *
 * Mengatur halaman yang berhubungan dengan produk:
 * - index(): daftar semua produk (katalog)
 * - show():  detail satu produk beserta produk terkait
 */
class ProdukController extends Controller
{
    // Halaman katalog: menampilkan seluruh produk.
    public function index(){
        // Ambil semua data produk dari class ProdukData
        $produk = ProdukData::semua();

        // Kirim data $produk ke view resources/views/produk/index.blade.php
        return view('produk.index',compact('produk'));
    }

    // Halaman detail: menampilkan satu produk berdasarkan $id dari URL.
    public function show(int $id){
        // Cari produk sesuai id
        $produk = ProdukData::produkById($id);

        // Jika produk tidak ditemukan, tampilkan halaman error 404
        if ($produk === null) {
            abort(404);
        }

        // Ambil produk lain di kategori yang sama sebagai "produk terkait",
        // lalu buang produk yang sedang dibuka (id-nya sama) dari daftar.
        $produkTerkait = array_filter(ProdukData::perKategori($produk['slug_kategori']), function ($item) use ($id) {
            return $item['id'] !== $id;
        });
        // Batasi produk terkait maksimal 3 item saja
        $produkTerkait = array_slice($produkTerkait, 0, 3);

        // Kirim data produk dan produk terkait ke view detail
        return view('produk.show', compact('produk', 'produkTerkait'));
    }
}
