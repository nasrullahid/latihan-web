<?php

namespace App\Data;

class ProdukData
{
    // Untuk menampilkan semua data produk
    public static function semua(): array
    {
        return [
            ['id' => 1, 'nama' => 'Laptop Vertex 14',   'kategori' => 'Elektronik', 'slug_kategori' => 'elektronik', 'harga' => 8750000, 'stok' => 6,  'unggulan' => true,  'gambar' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&w=900&q=80', 'aksen' => '#0f766e', 'deskripsi' => 'Laptop tipis 14 inci, RAM 16GB, cocok untuk coding dan kuliah.'],
            ['id' => 2, 'nama' => 'Mouse Nirkabel Zen', 'kategori' => 'Elektronik', 'slug_kategori' => 'elektronik', 'harga' => 185000,  'stok' => 40, 'unggulan' => false, 'gambar' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?auto=format&fit=crop&w=900&q=80', 'aksen' => '#2563eb', 'deskripsi' => 'Mouse senyap dengan baterai tahan 12 bulan.'],
            ['id' => 3, 'nama' => 'Keyboard Mekanik K2','kategori' => 'Elektronik', 'slug_kategori' => 'elektronik', 'harga' => 620000,  'stok' => 0,  'unggulan' => true,  'gambar' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=900&q=80', 'aksen' => '#7c3aed', 'deskripsi' => 'Switch biru, sangat memuaskan untuk mengetik kode.'],
            ['id' => 4, 'nama' => 'Kaos Polos Hitam',   'kategori' => 'Fashion',    'slug_kategori' => 'fashion',    'harga' => 79000,   'stok' => 120,'unggulan' => false, 'gambar' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=80', 'aksen' => '#111827', 'deskripsi' => 'Katun combed 30s, nyaman dipakai harian.'],
            ['id' => 5, 'nama' => 'Jaket Hoodie Abu',   'kategori' => 'Fashion',    'slug_kategori' => 'fashion',    'harga' => 245000,  'stok' => 18, 'unggulan' => true,  'gambar' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=900&q=80', 'aksen' => '#ea580c', 'deskripsi' => 'Fleece tebal, ada kantong depan dan tali serut.'],
            ['id' => 6, 'nama' => 'Kopi Arabika 250g',  'kategori' => 'Makanan',    'slug_kategori' => 'makanan',    'harga' => 95000,   'stok' => 30, 'unggulan' => false, 'gambar' => 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=900&q=80', 'aksen' => '#b45309', 'deskripsi' => 'Biji kopi single origin Toraja, roasting medium.'],
            ['id' => 7, 'nama' => 'Teh Hijau Premium',  'kategori' => 'Makanan',    'slug_kategori' => 'makanan',    'harga' => 48000,   'stok' => 0,  'unggulan' => false, 'gambar' => 'https://images.unsplash.com/photo-1564890369478-c89ca6d9cde9?auto=format&fit=crop&w=900&q=80', 'aksen' => '#16a34a', 'deskripsi' => 'Daun teh pilihan, 20 kantong per kotak.'],
            ['id' => 8, 'nama' => 'Tas Ransel Trek 25L','kategori' => 'Fashion',    'slug_kategori' => 'fashion',    'harga' => 310000,  'stok' => 9,  'unggulan' => false, 'gambar' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=900&q=80', 'aksen' => '#dc2626', 'deskripsi' => 'Ransel tahan air dengan slot laptop 15 inci.'],
        ];
    }

    // Filter produk by produk id dari params url
    public static function produkById(int $id): ?array
    {
        // looping array di dalam loopingnya baru di samakan 
        foreach (self::semua() as $produk) {
            if ($produk['id'] === $id) {
                return $produk;
            }
        }
        return null;
    }

    // Fungsi untuk mencari data produk berdasarkan keyword yang diinput
    // key yang di filter nama, kategori dan deskripsi
    // strtolower = membuat semua string menjadi huruf kecil
    // str_contains = membadingkan 2 parameter apakah terdapat kata yang sama
    public static function cari(string $keyword): array
    {
        $hasil = [];
        $keyword = strtolower($keyword);

        foreach (self::semua() as $produk) {
            $nama = strtolower($produk['nama']);
            $kategori = strtolower($produk['kategori']);
            $deskripsi = strtolower($produk['deskripsi']);

            if (
                str_contains($nama, $keyword) ||
                str_contains($kategori, $keyword) ||
                str_contains($deskripsi, $keyword)
            ) {
                $hasil[] = $produk;
            }
        }

        return $hasil;
    }

    // Menampilkan produk berdasarkan kategori dari params URL
    public static function perKategori(string $slugKategori): array
    {
        $hasil = [];

        foreach (self::semua() as $produk) {
            if ($produk['slug_kategori'] === $slugKategori) {
                $hasil[] = $produk;
            }
        }

        return $hasil;
    }

    // Filter data produk berdasarkan value unggulan = true
    public static function unggulan(): array
    {
        $hasil = [];

        foreach (self::semua() as $produk) {
            if ($produk['unggulan'] === true) {
                $hasil[] = $produk;
            }
        }

        return $hasil;
    }

    // Membuat daftar kategori berdasarkan slug_kategori pada data produk
    public static function daftarKategori(): array
    {
        $kategori = [];

        foreach (self::semua() as $produk) {
            $slug = $produk['slug_kategori'];

            if (!isset($kategori[$slug])) {
                $kategori[$slug] = [
                    'nama' => $produk['kategori'],
                    'slug' => $slug,
                ];
            }
        }

        return array_values($kategori);
    }
}
