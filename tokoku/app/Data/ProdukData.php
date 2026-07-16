<?php

namespace App\Data;

/**
 * ProdukData
 *
 * Class sumber data produk (data dummy / hardcoded).
 * Berperan sebagai "pengganti database" sederhana untuk latihan:
 * seluruh data produk disimpan di sini, lalu diambil oleh controller & view.
 *
 * Semua method dibuat static supaya bisa dipanggil langsung tanpa
 * membuat object terlebih dahulu, contoh: ProdukData::semua().
 */
class ProdukData
{
    // Mengembalikan seluruh data produk sebagai array asosiatif.
    // Tiap produk punya key: id, nama, kategori, slug_kategori, harga,
    // stok, unggulan (bool), gambar (URL), aksen (warna), dan deskripsi.
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

    // Mencari satu produk berdasarkan id (biasanya dari parameter URL).
    // Return array produk jika ketemu, atau null (?array) jika tidak ada.
    public static function produkById(int $id): ?array
    {
        // Loop semua produk, lalu cocokkan id-nya satu per satu.
        foreach (self::semua() as $produk) {
            if ($produk['id'] === $id) {
                return $produk; // ketemu -> langsung kembalikan produknya
            }
        }
        return null; // tidak ada yang cocok
    }

    // Mencari produk berdasarkan keyword yang diinput user.
    // Field yang dicek: nama, kategori, dan deskripsi.
    // strtolower  = mengubah semua huruf jadi kecil (agar pencarian tidak case-sensitive)
    // str_contains = mengecek apakah keyword terdapat di dalam sebuah string
    public static function cari(string $keyword): array
    {
        $hasil = [];                       // menampung produk yang cocok
        $keyword = strtolower($keyword);   // samakan huruf keyword jadi lowercase

        foreach (self::semua() as $produk) {
            // Ubah tiap field ke lowercase supaya bisa dibandingkan dengan keyword
            $nama = strtolower($produk['nama']);
            $kategori = strtolower($produk['kategori']);
            $deskripsi = strtolower($produk['deskripsi']);

            // Masukkan produk ke hasil jika keyword ada di salah satu field
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

    // Mengambil semua produk yang termasuk dalam satu kategori.
    // $slugKategori diambil dari parameter URL, contoh: "elektronik".
    public static function perKategori(string $slugKategori): array
    {
        $hasil = [];

        foreach (self::semua() as $produk) {
            // Kumpulkan produk yang slug kategorinya sama dengan yang dicari
            if ($produk['slug_kategori'] === $slugKategori) {
                $hasil[] = $produk;
            }
        }

        return $hasil;
    }

    // Mengambil hanya produk yang ditandai sebagai unggulan (unggulan === true).
    // Dipakai di halaman beranda untuk menampilkan produk pilihan.
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

    // Membuat daftar kategori unik dari seluruh produk.
    // Dipakai antara lain untuk membuat menu kategori di navbar.
    public static function daftarKategori(): array
    {
        $kategori = [];

        foreach (self::semua() as $produk) {
            $slug = $produk['slug_kategori'];

            // Simpan kategori hanya sekali (skip kalau slug sudah pernah dicatat),
            // sehingga tidak ada kategori yang tampil ganda.
            if (!isset($kategori[$slug])) {
                $kategori[$slug] = [
                    'nama' => $produk['kategori'],
                    'slug' => $slug,
                ];
            }
        }

        // array_values() untuk membuang key slug dan mengubahnya jadi array biasa (0,1,2,...)
        return array_values($kategori);
    }
}
