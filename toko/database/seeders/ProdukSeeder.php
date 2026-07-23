<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'nama_produk' => 'Kopi Arabika',
            'harga' => 85000,
            'stok' => 40,
        ]);
        Produk::create([
            'nama_produk' => 'Teh Hijau',
            'harga' => 25000,
            'stok' => 120,
        ]);
        Produk::create([
            'nama_produk' => 'Gula Aren',
            'harga' => 18000,
            'stok' => 8,
        ]);
    }
}
