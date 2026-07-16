<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData;

class KategoriController extends Controller
{
    public function show(string $slug)
    {
        $produk = ProdukData::perKategori($slug);
        $kategori = collect(ProdukData::daftarKategori())->firstWhere('slug', $slug);
        $namaKategori = $kategori['nama'] ?? ucwords(str_replace('-', ' ', $slug));

        return view('kategori.show', compact('produk', 'slug', 'namaKategori'));
    }
}
