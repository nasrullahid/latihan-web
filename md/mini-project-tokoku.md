## 🎯 STUDI KASUS

Sebuah toko bernama **TokoKu** ingin punya website katalog produk. Belum ada admin panel, belum ada login, belum ada keranjang belanja — **cukup katalog yang bisa dilihat pengunjung**.

Kalian dipesan membuat website tersebut menggunakan Laravel.

---

## 📦 DELIVERABLE (Yang Harus Dikumpulkan)

1. Folder proyek Laravel bernama `tokoku` (kirim tanpa folder `vendor/` dan `node_modules/`)
2. **Repository Git** dengan **minimal 5 commit bermakna** (lihat bagian Git di bawah)
3. Screenshot 4 halaman yang berjalan di browser
4. File `CATATAN.md` berisi jawaban 3 pertanyaan refleksi (ada di bagian akhir)

---

## 🗺️ SPESIFIKASI HALAMAN

| No  | URL                | Nama Route      | Isi Halaman                                          |
| --- | ------------------ | --------------- | ---------------------------------------------------- |
| 1   | `/`                | `beranda`       | Hero/sambutan + **produk unggulan** saja             |
| 2   | `/produk`          | `produk.index`  | Semua produk dalam bentuk kartu (grid)               |
| 3   | `/produk/{id}`     | `produk.show`   | Detail 1 produk. Jika id tidak ada → halaman **404** |
| 4   | `/kategori/{slug}` | `kategori.show` | Produk yang difilter per kategori                    |
| 5   | `/tentang`         | `tentang`       | Profil toko (statis)                                 |

**Aturan wajib:**
- Semua link antar halaman **wajib memakai `route()`**, bukan URL manual (`href="/produk"` ❌ → `href="{{ route('produk.index') }}"` ✅)
- **Tidak boleh ada logika data di dalam Blade.** Blade hanya menampilkan. Semua pengambilan/penyaringan data dilakukan di Controller.
- Semua halaman **wajib mewarisi satu layout master** (`@extends`).

---

## 🧱 STRUKTUR FILE YANG DIHARAPKAN

```
tokoku/
├── app/
│   ├── Data/
│   │   └── ProdukData.php          ← disediakan instruktur (lihat lampiran)
│   └── Http/Controllers/
│       ├── BerandaController.php
│       ├── ProdukController.php
│       └── KategoriController.php
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php           ← layout master
│   ├── partials/
│   │   ├── navbar.blade.php
│   │   └── footer.blade.php
│   ├── components/
│   │   └── kartu-produk.blade.php  ← Blade component
│   ├── beranda.blade.php
│   ├── tentang.blade.php
│   ├── produk/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   └── kategori/
│       └── show.blade.php
├── public/css/tokoku.css
└── routes/web.php
```

---

## 📄 LAMPIRAN — File Data (Salin apa adanya)

Buat file `app/Data/ProdukData.php`:

```php
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
}
```

> ⚠️ **Hanya method `semua()` yang diberikan.** Method lain (`cari`, `perKategori`, `unggulan`, `daftarKategori`) **kalian yang buat sendiri** — ini bagian dari penilaian. Ingat pelajaran Hari 5: `static`, `namespace`, dan `array_filter`.

---

## ✅ TUGAS BERTINGKAT

### ⭐ LEVEL 1 — MUDAH

**L1-1.** Buat proyek Laravel baru bernama `tokoku` lewat Composer, jalankan `php artisan serve`, pastikan terbuka di browser.
**L1-2.** Inisialisasi Git (`git init`) dan buat commit pertama: `"init: proyek laravel tokoku"`.
**L1-3.** Buat 3 controller lewat **Artisan** (bukan bikin file manual):
```bash
php artisan make:controller BerandaController
```
**L1-4.** Daftarkan **5 route** sesuai tabel spesifikasi di `routes/web.php`, semuanya menggunakan `->name(...)`.
**L1-5.** Buat halaman `/tentang` yang menampilkan nama toko, alamat, dan **nama kalian sebagai developer**.

> ✔️ **Tanda selesai Level 1:** perintah `php artisan route:list` menampilkan 5 route kalian dengan nama yang benar.

---

### ⭐⭐ LEVEL 2 — MENENGAH

**L2-1.** Buat layout master `layouts/app.blade.php` yang berisi:
- `@yield('judul')` untuk judul halaman di `<title>`
- `@yield('konten')` untuk isi halaman
- `@include('partials.navbar')` dan `@include('partials.footer')`

**L2-2.** Buat **Blade component** `<x-kartu-produk :produk="$p" />` yang menampilkan: nama, kategori, harga (format Rupiah), status stok, dan tombol "Lihat Detail".

**L2-3.** Halaman `/produk` menampilkan **seluruh produk** menggunakan `@foreach` + component di atas.

**L2-4.** Halaman `/` menampilkan **hanya produk unggulan** (`unggulan => true`). Penyaringan dilakukan **di Controller**, bukan di Blade.

**L2-5.** Halaman `/produk/{id}` menampilkan detail satu produk. Jika `id` tidak ditemukan, tampilkan **404** dengan `abort(404)`.

**L2-6.** Harga wajib tampil sebagai `Rp 8.750.000` (gunakan `number_format`).

**L2-7.** Produk dengan `stok = 0` wajib ditandai **"Stok Habis"** (gunakan `@if` / `@else`) dan tombol detailnya dinonaktifkan/diberi warna berbeda.

---

### ⭐⭐⭐ LEVEL 3 — TANTANGAN

Kerjakan **minimal 2 dari 5** berikut:

**L3-1.** Halaman `/kategori/{slug}` berfungsi penuh, dan navbar menampilkan **daftar kategori yang dibuat otomatis dari data** (bukan diketik manual satu per satu).

**L3-2.** Buat halaman kosong yang ramah: jika sebuah kategori tidak punya produk, tampilkan pesan "Belum ada produk di kategori ini" (gunakan `@forelse ... @empty`).

**L3-3.** Menu navbar yang sedang aktif diberi highlight (petunjuk: `request()->routeIs('produk.*')`).

**L3-4.** Halaman detail produk menampilkan **3 produk lain dari kategori yang sama** ("Produk Terkait") — dan produk yang sedang dibuka **tidak boleh ikut muncul**.

**L3-5.** Buat file `resources/views/errors/404.blade.php` sendiri agar halaman 404 memakai layout TokoKu (bukan halaman 404 bawaan Laravel).

---

## 🔀 KEBIASAAN GIT (Wajib — dinilai)

Minimal **5 commit**, dibuat **bertahap**, bukan sekali di akhir. Contoh alur:

```bash
git commit -m "init: proyek laravel tokoku"
git commit -m "feat: routing dan controller dasar"
git commit -m "feat: layout master, navbar, footer"
git commit -m "feat: halaman katalog dan detail produk"
git commit -m "feat: filter kategori dan styling"
```

> ❌ Commit seperti `"update"`, `"fix"`, `"asdasd"` tidak dihitung.
> ✅ Pastikan `vendor/` dan `.env` **tidak** ikut ter-commit (cek `.gitignore` bawaan Laravel — sudah ada, jangan dihapus).
