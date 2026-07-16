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
        
        return view('produk.show',compact('produk'));
    }
}
