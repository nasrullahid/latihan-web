# LATIHAN TAMBAHAN — HARI 5
## PHP OOP & Composer

> **Program:** Web Programmer Dasar (Laravel) — PT LPK Mentorbox Indonesia
> **Fase 2 — Jembatan Backend · Hari 5**
> **Fokus:** Class & object, constructor, encapsulation, inheritance, interface & abstract, namespace/autoloading, Composer

---

## PETUNJUK UNTUK PESERTA

- Kerjakan berurutan A → G. Tiap topik punya level **⭐ Mudah**, **⭐⭐ Menengah**, **⭐⭐⭐ Tantangan**.
- Semua file PHP simpan dalam satu folder proyek, mis. `latihan-oop/`. Jalankan lewat terminal: `php nama_file.php`.
- Uji sesering mungkin. OOP itu soal *pola*, bukan hafalan — kalau bingung, gambar dulu class-nya di kertas (nama class, property, method) sebelum menulis kode.
- Target minimal: tuntas semua level **Mudah + Menengah**. Level Tantangan adalah bonus.

> **Jembatan dari Hari 4 → Hari 5:** Di Hari 4 Anda menulis fungsi lepas dan array asosiatif. Hari ini kita **membungkus data + fungsi ke dalam satu class**. Array `['nama' => 'Kopi', 'harga' => 20000]` berubah jadi object `Produk` yang punya property `$nama`, `$harga`, dan method `tampilkan()`.

> **Jembatan ke Hari 7 (Laravel):** Setiap `Model` di Laravel (mis. `Produk extends Model`) adalah **class yang mewarisi** class lain — persis konsep *inheritance* yang Anda latih di topik D. Composer yang Anda pelajari di topik G adalah alat yang nanti dipakai untuk **menginstal Laravel itu sendiri**.

---

## A. CLASS & OBJECT

### ⭐ A1 — Class pertama
Buat class `Mobil` dengan property `$merek` dan `$warna`, serta method `info()` yang mencetak `"Mobil Toyota warna Merah"`. Buat 1 object dan panggil `info()`.

### ⭐ A2 — Banyak object
Dari class `Mobil` di A1, buat **3 object** berbeda (merek/warna berbeda) dan panggil `info()` masing-masing. Amati: satu class bisa mencetak banyak object.

### ⭐⭐ A3 — Class Produk
Buat class `Produk` dengan property `$nama`, `$harga`, `$stok`. Tambah method:
- `tampilkan()` → cetak `"Kopi Susu | Rp20.000 | Stok: 50"`
- `totalNilai()` → kembalikan `harga × stok`

Buat 1 object dan uji kedua method.

### ⭐⭐ A4 — Method dengan parameter
Tambahkan method pada class `Produk`:
- `tambahStok($jumlah)` → menambah `$stok`
- `kurangiStok($jumlah)` → mengurangi `$stok`

Uji: buat produk stok 50, tambah 10, kurangi 5, lalu tampilkan (hasil: 55).

### ⭐⭐⭐ A5 — Method saling memanggil
Pada class `Produk`, buat method `jual($jumlah)` yang:
1. Cek apakah `$stok` cukup.
2. Jika cukup → panggil `kurangiStok($jumlah)` dan cetak `"Berhasil menjual 5 Kopi Susu"`.
3. Jika tidak → cetak `"Stok tidak cukup!"`.

---

## B. CONSTRUCTOR

### ⭐ B1 — Constructor sederhana
Ubah class `Produk` agar `$nama`, `$harga`, `$stok` diisi lewat **constructor** (`__construct`). Buat object dengan `new Produk("Teh", 15000, 30)`.

### ⭐⭐ B2 — Constructor dengan nilai default
Buat constructor `Produk` di mana `$stok` **default = 0** jika tidak diisi. Buat 1 object tanpa argumen stok dan buktikan stoknya 0.

### ⭐⭐ B3 — Constructor property promotion (PHP 8)
Tulis ulang constructor `Produk` menggunakan **constructor property promotion** PHP 8:
```php
public function __construct(
    public string $nama,
    public int $harga,
    public int $stok = 0
) {}
```
Bandingkan dengan versi B1 — mana yang lebih ringkas?

### ⭐⭐⭐ B4 — Constructor Kategori berisi banyak Produk
Buat class `Kategori` dengan property `$nama` dan `$daftarProduk` (array, default kosong). Buat method `tambahProduk(Produk $p)` yang memasukkan object Produk ke dalam array. Buat method `jumlahProduk()`.

---

## C. ENCAPSULATION & ACCESS MODIFIER

### ⭐ C1 — private property
Ubah property `$stok` pada class `Produk` menjadi `private`. Coba akses langsung dari luar (`$produk->stok`) — amati errornya. Lalu buat method `getStok()` untuk mengaksesnya.

### ⭐⭐ C2 — Getter & Setter
Untuk property `private $harga`, buat:
- `getHarga()` → mengembalikan harga
- `setHarga($nilai)` → hanya menyimpan jika `$nilai > 0`, jika tidak cetak `"Harga tidak valid"`.

### ⭐⭐ C3 — Validasi di dalam setter
Buat class `RekeningBank` dengan `private $saldo = 0`. Method:
- `setor($jumlah)` → hanya menambah jika `> 0`
- `tarik($jumlah)` → hanya jika `$jumlah <= saldo`
- `getSaldo()`

Uji skenario: setor 100.000, tarik 30.000, tarik 200.000 (harus ditolak).

### ⭐⭐⭐ C4 — Kenapa encapsulation penting?
Tulis komentar/penjelasan singkat (3–5 kalimat): apa yang bisa terjadi kalau `$saldo` bersifat `public`? Berikan contoh kode "berbahaya" yang bisa merusak data.

---

## D. INHERITANCE (PEWARISAN)

### ⭐ D1 — Class induk & anak
Buat class induk `Hewan` dengan method `bernapas()` yang cetak `"...bernapas"`. Buat class `Kucing extends Hewan` dengan method tambahan `mengeong()`. Buktikan object `Kucing` bisa memanggil **kedua** method.

### ⭐⭐ D2 — Override method
Buat class induk `Karyawan` dengan method `gaji()` yang mengembalikan `5000000`. Buat `Manager extends Karyawan` yang **meng-override** `gaji()` menjadi `10000000`. Uji keduanya.

### ⭐⭐ D3 — parent::__construct
Buat `Produk` (property `$nama`, `$harga`) dan `ProdukDigital extends Produk` yang menambah property `$ukuranFile`. Constructor `ProdukDigital` harus memanggil `parent::__construct()` untuk mengisi nama & harga.

### ⭐⭐⭐ D4 — Hierarki bertingkat
Buat rantai pewarisan: `Kendaraan` → `KendaraanBermotor` → `SepedaMotor`. Setiap level menambah 1 property & 1 method. Buat object `SepedaMotor` dan panggil method dari **ketiga** level.

---

## E. INTERFACE & ABSTRACT CLASS

### ⭐⭐ E1 — Abstract class
Buat abstract class `BangunDatar` dengan method abstract `luas()`. Buat `Persegi` dan `Lingkaran` yang meng-`extends`-nya dan mengimplementasikan `luas()` masing-masing. Uji keduanya.

### ⭐⭐ E2 — Interface
Buat interface `Diskon` dengan method `hitungDiskon($harga)`. Buat class `DiskonMember` dan `DiskonHariRaya` yang meng-`implements`-nya dengan aturan berbeda (mis. 10% vs 20%).

### ⭐⭐⭐ E3 — Interface vs Abstract
Tulis penjelasan singkat perbedaan **interface** dan **abstract class**, lalu buat contoh: class `Produk` yang **extends** abstract `Item` **sekaligus implements** interface `Diskon`. Buktikan keduanya bisa dipakai bersamaan.

---

## F. NAMESPACE & AUTOLOADING

### ⭐⭐ F1 — Pisah file & include
Pindahkan class `Produk` ke file `Produk.php` sendiri. Dari `index.php`, panggil `require 'Produk.php';` lalu buat object. Buktikan berjalan.

### ⭐⭐ F2 — Namespace
Beri namespace `App\Models` pada class `Produk`. Dari `index.php`, gunakan dengan `use App\Models\Produk;`. Amati bagaimana namespace mencegah bentrok nama.

### ⭐⭐⭐ F3 — PSR-4 autoloading manual
Buat struktur folder `src/Models/Produk.php` dan `src/Models/Kategori.php`. Tulis `spl_autoload_register()` sederhana yang otomatis me-load class berdasarkan namespace-nya (tanpa `require` manual per file).

---

## G. COMPOSER

### ⭐ G1 — Inisialisasi proyek
Jalankan `composer init` di folder baru. Isi nama paket, deskripsi, author. Amati file `composer.json` yang terbentuk.

### ⭐⭐ G2 — Autoload PSR-4 via Composer
Tambahkan blok `autoload` PSR-4 di `composer.json` yang memetakan `App\` ke folder `src/`. Jalankan `composer dump-autoload`, lalu cukup `require 'vendor/autoload.php';` untuk memakai semua class Anda tanpa `require` manual.

### ⭐⭐ G3 — Instal package pihak ketiga
Instal package `nesbot/carbon` (`composer require nesbot/carbon`). Buat file yang menggunakannya untuk mencetak tanggal hari ini dalam Bahasa Indonesia. Amati folder `vendor/` yang terbentuk.

### ⭐⭐⭐ G4 — Susun mini-library sendiri
Susun proyek rapi: folder `src/` berisi `Produk.php`, `Kategori.php`, `Diskon` (interface). `composer.json` mengatur autoload PSR-4. File `app.php` di root memakai semuanya lewat `vendor/autoload.php`. Ini adalah **pola struktur yang persis dipakai Laravel**.

---

# KUNCI JAWABAN (UNTUK INSTRUKTUR)

> Solusi berikut adalah **salah satu** cara yang benar. Terima variasi jawaban peserta selama konsep OOP-nya tepat.

### A. Class & Object
```php
<?php
// A3 & A4 & A5 (digabung)
class Produk {
    public $nama;
    public $harga;
    public $stok;

    public function tampilkan() {
        echo "{$this->nama} | Rp" . number_format($this->harga, 0, ',', '.') .
             " | Stok: {$this->stok}\n";
    }

    public function totalNilai() {
        return $this->harga * $this->stok;
    }

    public function tambahStok($jumlah) {
        $this->stok += $jumlah;
    }

    public function kurangiStok($jumlah) {
        $this->stok -= $jumlah;
    }

    public function jual($jumlah) {
        if ($this->stok >= $jumlah) {
            $this->kurangiStok($jumlah);
            echo "Berhasil menjual {$jumlah} {$this->nama}\n";
        } else {
            echo "Stok tidak cukup!\n";
        }
    }
}

$p = new Produk();
$p->nama = "Kopi Susu";
$p->harga = 20000;
$p->stok = 50;
$p->jual(5);        // Berhasil menjual 5 Kopi Susu
$p->tampilkan();    // Kopi Susu | Rp20.000 | Stok: 45
echo $p->totalNilai() . "\n"; // 900000
```

### B. Constructor
```php
<?php
// B3 — property promotion PHP 8
class Produk {
    public function __construct(
        public string $nama,
        public int $harga,
        public int $stok = 0   // B2: default 0
    ) {}
}
$teh = new Produk("Teh", 15000, 30);
$air = new Produk("Air", 5000);  // stok otomatis 0
echo $air->stok; // 0

// B4 — Kategori berisi banyak Produk
class Kategori {
    public array $daftarProduk = [];
    public function __construct(public string $nama) {}

    public function tambahProduk(Produk $p) {
        $this->daftarProduk[] = $p;
    }
    public function jumlahProduk() {
        return count($this->daftarProduk);
    }
}
$minuman = new Kategori("Minuman");
$minuman->tambahProduk($teh);
$minuman->tambahProduk($air);
echo $minuman->jumlahProduk(); // 2
```

### C. Encapsulation & Access Modifier
```php
<?php
// C3 — RekeningBank
class RekeningBank {
    private int $saldo = 0;

    public function setor($jumlah) {
        if ($jumlah > 0) $this->saldo += $jumlah;
    }
    public function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
        } else {
            echo "Saldo tidak cukup!\n";
        }
    }
    public function getSaldo() {
        return $this->saldo;
    }
}
$r = new RekeningBank();
$r->setor(100000);
$r->tarik(30000);
$r->tarik(200000);        // Saldo tidak cukup!
echo $r->getSaldo();      // 70000

// C4 — jika $saldo public, kode berbahaya seperti ini bisa lolos:
// $r->saldo = 999999999;  // langsung memanipulasi data tanpa aturan
// Encapsulation memaksa semua perubahan lewat method yang punya validasi.
```

### D. Inheritance
```php
<?php
// D3 — parent::__construct
class Produk {
    public function __construct(
        public string $nama,
        public int $harga
    ) {}
}
class ProdukDigital extends Produk {
    public function __construct(string $nama, int $harga, public int $ukuranFile) {
        parent::__construct($nama, $harga);
    }
    public function info() {
        echo "{$this->nama} (Rp{$this->harga}) - {$this->ukuranFile}MB\n";
    }
}
$ebook = new ProdukDigital("Ebook Laravel", 50000, 12);
$ebook->info(); // Ebook Laravel (Rp50000) - 12MB

// D2 — Override
class Karyawan {
    public function gaji() { return 5000000; }
}
class Manager extends Karyawan {
    public function gaji() { return 10000000; }
}
echo (new Karyawan)->gaji(); // 5000000
echo (new Manager)->gaji();  // 10000000
```

### E. Interface & Abstract Class
```php
<?php
// E1 — Abstract
abstract class BangunDatar {
    abstract public function luas(): float;
}
class Persegi extends BangunDatar {
    public function __construct(public float $sisi) {}
    public function luas(): float { return $this->sisi ** 2; }
}
class Lingkaran extends BangunDatar {
    public function __construct(public float $jari) {}
    public function luas(): float { return 3.14159 * $this->jari ** 2; }
}
echo (new Persegi(5))->luas();    // 25
echo (new Lingkaran(7))->luas();  // 153.93...

// E2 — Interface
interface Diskon {
    public function hitungDiskon(int $harga): int;
}
class DiskonMember implements Diskon {
    public function hitungDiskon(int $harga): int { return (int)($harga * 0.10); }
}
class DiskonHariRaya implements Diskon {
    public function hitungDiskon(int $harga): int { return (int)($harga * 0.20); }
}
echo (new DiskonMember)->hitungDiskon(100000);   // 10000
echo (new DiskonHariRaya)->hitungDiskon(100000); // 20000
```
> **Ringkasan E3 (untuk dijelaskan ke peserta):** *Abstract class* dipakai saat class-class anak berbagi **kode/logika yang sama** dan hubungannya "adalah sejenis" (Persegi *adalah* BangunDatar). *Interface* dipakai untuk **kontrak kemampuan** yang bisa dimiliki class apa pun tanpa berbagi kode (apa saja bisa "bisa-didiskon"). Sebuah class hanya bisa `extends` **satu** class, tapi bisa `implements` **banyak** interface.

### F. Namespace & Autoloading
```php
<?php
// F3 — autoload manual PSR-4 (src/Models/Produk.php dst.)
spl_autoload_register(function ($class) {
    // App\Models\Produk  ->  src/Models/Produk.php
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';
    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) require $file;
    }
});

use App\Models\Produk;
$p = new Produk("Kopi", 20000, 50); // ter-load otomatis, tanpa require manual
```

### G. Composer
```json
// G2 & G4 — composer.json (blok autoload PSR-4)
{
    "name": "mentorbox/latihan-oop",
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "require": {
        "nesbot/carbon": "^3.0"
    }
}
```
```php
<?php
// app.php (root) — G3 & G4
require 'vendor/autoload.php';   // memuat SEMUA class + package sekaligus

use App\Models\Produk;
use Carbon\Carbon;

$p = new Produk("Kopi", 20000, 50);
Carbon::setLocale('id');
echo Carbon::now()->translatedFormat('l, d F Y'); // mis. Kamis, 09 Juli 2026
```
> **Alur perintah:** `composer init` → edit `composer.json` → `composer require nesbot/carbon` → `composer dump-autoload` → jalankan `php app.php`.

---

## PANDUAN WAKTU (SARAN INSTRUKTUR)

| Segmen      | Aktivitas                                     | Durasi   |
| ----------- | --------------------------------------------- | -------- |
| Lab mandiri | Topik A–C (class, constructor, encapsulation) | 70 menit |
| Lab mandiri | Topik D–E (inheritance, interface/abstract)   | 60 menit |
| Demo + lab  | Topik F–G (namespace, autoload, Composer)     | 60 menit |
| Review      | Bahas kunci jawaban + tanya jawab             | 30 menit |

> **Tips diferensiasi:** Topik F–G (namespace/Composer) adalah titik rawan bagi peserta nol — **demonstrasikan langsung di layar** sebelum lepas ke lab. Peserta cepat → arahkan ke G4 (menyusun mini-library sendiri), karena itu miniatur struktur proyek Laravel yang akan mereka temui Hari 7.

> **Penegasan jembatan (tutup sesi):** Ingatkan peserta — semua yang mereka buat hari ini (class, inheritance, interface, namespace, Composer autoload) **bukan latihan yang dibuang**. Itu semua muncul lagi dalam bentuk yang lebih rapi begitu masuk Laravel: `Model`, `Controller`, dan `composer create-project` semuanya berdiri di atas fondasi hari ini.