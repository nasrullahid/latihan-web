<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Menampilkan seluruh produk (halaman katalog).
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', ['produk' => $produk]);
    }

    /**
     * Menampilkan form tambah produk baru.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Produk::create($data);

        return redirect('/produk');
    }

    /**
     * Menampilkan detail satu produk.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', ['produk' => $produk]);
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', ['produk' => $produk]);
    }

    /**
     * Menyimpan perubahan produk ke database.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk->update($data);

        return redirect('/produk/' . $produk->id);
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect('/produk');
    }
}
