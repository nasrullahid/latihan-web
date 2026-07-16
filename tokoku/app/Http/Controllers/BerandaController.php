<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProdukData;

class BerandaController extends Controller
{
    public function index(){
        $produkUnggulan = ProdukData::unggulan();

        return view('beranda', compact('produkUnggulan'));
    }

    public function tentang(){
        return view('tentang');
    }
}
