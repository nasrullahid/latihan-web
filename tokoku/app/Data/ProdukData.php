<?php

namespace App\Data;

class ProdukData
{
    public static function semua(): array
    {
        return [
            ['id' => 1, 'nama' => 'Laptop Vertex 14',   'kategori' => 'Elektronik', 'slug_kategori' => 'elektronik', 'harga' => 8750000, 'stok' => 6,  'unggulan' => true,  'deskripsi' => 'Laptop tipis 14 inci, RAM 16GB, cocok untuk coding dan kuliah.'],
            ['id' => 2, 'nama' => 'Mouse Nirkabel Zen', 'kategori' => 'Elektronik', 'slug_kategori' => 'elektronik', 'harga' => 185000,  'stok' => 40, 'unggulan' => false, 'deskripsi' => 'Mouse senyap dengan baterai tahan 12 bulan.'],
            ['id' => 3, 'nama' => 'Keyboard Mekanik K2','kategori' => 'Elektronik', 'slug_kategori' => 'elektronik', 'harga' => 620000,  'stok' => 0,  'unggulan' => true,  'deskripsi' => 'Switch biru, sangat memuaskan untuk mengetik kode.'],
            ['id' => 4, 'nama' => 'Kaos Polos Hitam',   'kategori' => 'Fashion',    'slug_kategori' => 'fashion',    'harga' => 79000,   'stok' => 120,'unggulan' => false, 'deskripsi' => 'Katun combed 30s, nyaman dipakai harian.'],
            ['id' => 5, 'nama' => 'Jaket Hoodie Abu',   'kategori' => 'Fashion',    'slug_kategori' => 'fashion',    'harga' => 245000,  'stok' => 18, 'unggulan' => true,  'deskripsi' => 'Fleece tebal, ada kantong depan dan tali serut.'],
            ['id' => 6, 'nama' => 'Kopi Arabika 250g',  'kategori' => 'Makanan',    'slug_kategori' => 'makanan',    'harga' => 95000,   'stok' => 30, 'unggulan' => false, 'deskripsi' => 'Biji kopi single origin Toraja, roasting medium.'],
            ['id' => 7, 'nama' => 'Teh Hijau Premium',  'kategori' => 'Makanan',    'slug_kategori' => 'makanan',    'harga' => 48000,   'stok' => 0,  'unggulan' => false, 'deskripsi' => 'Daun teh pilihan, 20 kantong per kotak.'],
            ['id' => 8, 'nama' => 'Tas Ransel Trek 25L','kategori' => 'Fashion',    'slug_kategori' => 'fashion',    'harga' => 310000,  'stok' => 9,  'unggulan' => false, 'deskripsi' => 'Ransel tahan air dengan slot laptop 15 inci.'],
        ];
    }

    public static function produkById(int $id): ? array
    {
        // looping array di dalam loopingnya baru di samakan 
        foreach (self::semua() as $produk) {
            if ($produk['id'] === $id) {
                return $produk;
            }
        }
        return null;
    }
}