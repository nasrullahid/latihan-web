# PAKET SOAL — Mini Project OOP
## Sistem Toko dengan Namespace & Autoloading

> **Program:** Web Programmer Dasar (Laravel) — PT LPK Mentorbox Indonesia
> **Terkait materi:** Hari 5 — PHP OOP & Composer
> **Gaya soal:** studi kasus yang lazim muncul di **interview kerja**

| Item | Keterangan |
|---|---|
| **Tingkat** | Pemula–Menengah |
| **Sifat** | Individu (boleh diskusi, dilarang menyalin) |
| **Durasi** | 120 menit |
| **Prasyarat** | PHP 8.1+ terpasang (cek: `php -v`) |
| **Pengumpulan** | Folder project + hasil run `php index.php` (screenshot / rekaman terminal) |

---

## 🎬 Skenario

> Kamu melamar sebagai **Junior PHP Developer**. Pewawancara memberi tugas praktik:
>
> *"Buatkan program sederhana untuk mengelola produk sebuah toko. Saya tidak mau semua kode ditumpuk di satu file — saya mau melihat kamu paham **OOP** dan **namespace**. Tunjukkan pemahaman kamu soal encapsulation, inheritance, interface, dan autoloading."*
>
> Kerjakan bertahap dari Bagian A sampai C, lalu satukan di Mini-Project Challenge.

---

## 📁 Bagian 0 — Persiapan (WAJIB)

Buat struktur folder berikut. **Nama folder harus tepat** karena akan dipetakan ke namespace.

```
toko-oop/
├── composer.json
├── index.php
└── src/
    ├── Contracts/
    ├── Models/
    ├── Services/
    └── Exceptions/
```

**Soal 0.1** — Buat `composer.json` yang memetakan namespace root `App\` ke folder `src/` menggunakan **PSR-4**.

**Soal 0.2** — Jelaskan (tulis sebagai komentar di `composer.json` atau file `catatan.txt`): apa yang terjadi jika class `App\Models\Produk` dipanggil? Di file mana autoloader akan mencarinya?

---

## ⭐ Bagian A — Dasar (Class, Constructor, Encapsulation)

Fokus: membuat "cetakan" objek dan menjaga datanya.

**Soal A.1** — Di `src/Models/Produk.php`, buat class `Produk` dengan namespace yang benar. Ketentuan:
- Properti: `$nama`, `$harga`, `$stok`.
- Properti `$stok` **harus `private`** (tidak boleh diubah langsung dari luar).
- Constructor menerima `nama`, `harga`, dan `stok` (default `0`).

**Soal A.2** — Tambahkan **getter**: `getNama()`, `getHarga()`, `getStok()`.

**Soal A.3** — Tambahkan method `tambahStok(int $jumlah)` dan `kurangiStok(int $jumlah)` dengan aturan:
- Jumlah harus lebih dari 0 (jika tidak, program menolak).
- `kurangiStok` tidak boleh membuat stok jadi minus.

**Soal A.4** — Tambahkan method `info()` yang mengembalikan satu baris rapi berisi nama, harga, dan stok.

> **Pertanyaan lisan (dijawab ke instruktur):** Mengapa `$stok` dibuat `private`, bukan `public`? Apa risikonya kalau `public`?

---

## ⭐⭐ Bagian B — Menengah (Inheritance, Interface, Override)

Fokus: memperluas class tanpa menulis ulang, dan membuat "kontrak".

**Soal B.1** — Di `src/Contracts/Diskonable.php`, buat **interface** `Diskonable` yang mewajibkan dua method:
- `hitungDiskon(): float` — besar potongan dalam rupiah.
- `hargaSetelahDiskon(): float` — harga akhir setelah dipotong.

**Soal B.2** — Di `src/Models/ProdukElektronik.php`, buat class `ProdukElektronik` yang:
- **`extends Produk`** (mewarisi).
- **`implements Diskonable`** (memenuhi kontrak).
- Punya properti tambahan: `$garansiBulan` dan `$persenDiskon`.
- Constructor-nya memanggil constructor induk (`parent::__construct(...)`).

**Soal B.3** — Implementasikan `hitungDiskon()` dan `hargaSetelahDiskon()` sesuai `$persenDiskon`.

**Soal B.4** — **Override** method `info()` agar selain nama/harga/stok, juga menampilkan garansi dan persen diskon. Gunakan `parent::info()` supaya tidak menulis ulang bagian yang sama.

> **Pertanyaan lisan:** Apa beda `extends` dan `implements`? Bolehkah satu class `implements` lebih dari satu interface? Bagaimana dengan `extends`?

---

## ⭐⭐⭐ Bagian C — Tantangan (Service, Polymorphism, Custom Exception, Autoloading)

Fokus: menyatukan objek dan menangani error dengan elegan.

**Soal C.1** — Di `src/Exceptions/StokTidakCukupException.php`, buat **custom exception** `StokTidakCukupException` yang `extends \Exception`. Gunakan exception ini di dalam `kurangiStok()` ketika stok tidak mencukupi.

**Soal C.2** — Di `src/Services/Keranjang.php`, buat class `Keranjang` dengan:
- Method `tambah(Produk $produk, int $qty = 1)` — menambah item ke keranjang **dan** mengurangi stok produk.
- Method `total(): float` — menjumlahkan harga semua item.
- **Aturan polymorphism:** jika produk `instanceof Diskonable`, pakai `hargaSetelahDiskon()`; jika tidak, pakai `getHarga()`.

**Soal C.3** — Tambahkan method `cetakStruk(): string` di `Keranjang` yang menghasilkan struk belanja rapi (daftar item, subtotal per item, dan TOTAL).

**Soal C.4 (Autoloading)** — Pastikan `index.php` **tidak memakai satu pun `require` ke file class**. Pemuatan class harus lewat autoloader. Pilih salah satu:
- (a) `composer dump-autoload` lalu `require 'vendor/autoload.php'`, **atau**
- (b) tulis autoloader PSR-4 manual pakai `spl_autoload_register`.

> **Pertanyaan lisan:** Jelaskan langkah-langkah yang dilakukan autoloader saat menemukan `App\Services\Keranjang` — dari nama class sampai ke path file.

---

## 🏆 Mini-Project Challenge (Penyatuan)

Buat `index.php` yang **hanya memakai `use` + autoloader** (tanpa `require` class manual) dan melakukan urutan berikut:

1. Membuat minimal **3 produk**: 1 buah `Produk` biasa dan 2 buah `ProdukElektronik` (masing-masing punya diskon berbeda).
2. Menampilkan daftar produk memakai `info()`.
3. Memasukkan beberapa produk ke `Keranjang`, lalu mencetak struk lewat `cetakStruk()`.
4. Mencoba membeli produk **melebihi stok**, lalu **menangkap** `StokTidakCukupException` dengan `try/catch` dan menampilkan pesan yang ramah (program tidak boleh berhenti kasar/error fatal).
5. Menampilkan sisa stok produk tersebut di akhir.

**Target output** (nilai boleh berbeda, formatmu boleh lebih baik):

```
== DAFTAR PRODUK ==
Beras 5kg              | Rp 68.000 | stok: 20
Laptop Asus            | Rp 7.500.000 | stok: 5 | garansi: 24 bln | diskon: 10%
...

== STRUK ==
...
TOTAL   Rp 7.619.000

== UJI STOK ==
Gagal: Stok 'Laptop Asus' tidak cukup. ...
```

---

## ✅ Checklist Penilaian

Centang saat sudah terpenuhi. (Instruktur memakai daftar yang sama untuk menilai.)

- [ ] `composer.json` PSR-4 benar (`App\` → `src/`)
- [ ] Setiap file punya `namespace` sesuai lokasi foldernya
- [ ] `Produk`: `$stok` `private`, hanya diubah lewat method
- [ ] Validasi stok bekerja (tidak bisa minus, tidak bisa jumlah ≤ 0)
- [ ] `ProdukElektronik` `extends Produk` **dan** `implements Diskonable`
- [ ] `parent::` dipakai di constructor & di `info()`
- [ ] `Keranjang` memakai `instanceof` (polymorphism) untuk harga
- [ ] `StokTidakCukupException` dibuat & ditangkap dengan `try/catch`
- [ ] `index.php` **tanpa `require` class manual** (murni autoloading)
- [ ] `php index.php` berjalan tanpa error fatal

---

## ⏱️ Panduan Alokasi Waktu (120 menit)

| Menit | Kegiatan |
|---|---|
| 0–10 | Bagian 0: setup folder & `composer.json` |
| 10–35 | ⭐ Bagian A: class `Produk` + encapsulation |
| 35–65 | ⭐⭐ Bagian B: interface, inheritance, override |
| 65–95 | ⭐⭐⭐ Bagian C: exception, service, autoloading |
| 95–115 | 🏆 Mini-Project Challenge: satukan di `index.php` |
| 115–120 | Cek checklist |

---