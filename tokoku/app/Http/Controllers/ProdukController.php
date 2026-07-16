<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData;

class ProdukController extends Controller
{
    public function index(){
        $produk = ProdukData::semua();

        return view('produk.index',compact('produk'));
    }

    public function show(int $id){
        $produk = ProdukData::produkById($id);

        if ($produk === null) {
            abort(404);
        }

        $produkTerkait = array_filter(ProdukData::perKategori($produk['slug_kategori']), function ($item) use ($id) {
            return $item['id'] !== $id;
        });
        $produkTerkait = array_slice($produkTerkait, 0, 3);

        return view('produk.show', compact('produk', 'produkTerkait'));
    }
}
