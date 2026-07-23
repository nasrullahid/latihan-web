<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Nama tabel diset eksplisit karena migration membuat tabel "produk"
    // (bukan bentuk jamak "produks" yang jadi tebakan default Eloquent).
    protected $table = 'produk';

    // Kolom yang boleh diisi massal lewat create()/update().
    protected $fillable = ['nama_produk', 'harga', 'stok'];
}
