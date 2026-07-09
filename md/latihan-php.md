# LATIHAN TAMBAHAN — HARI 4
## PHP Fundamental

> **Program:** Web Programmer Dasar (Laravel) — PT LPK Mentorbox Indonesia
> **Fase 2 — Jembatan Backend · Hari 4**
> **Fokus:** Sintaks dasar, operator & kontrol, perulangan, fungsi, array (indexed & associative), form ($_GET/$_POST), include & require

---

## PETUNJUK UNTUK PESERTA

- Kerjakan berurutan A → G. Tiap topik punya level **⭐ Mudah**, **⭐⭐ Menengah**, **⭐⭐⭐ Tantangan**.
- Simpan semua file di dalam folder `htdocs/` (XAMPP) atau `www/` (Laragon), mis. `latihan-php/`.
- Latihan logika murni (A–E) bisa dijalankan via terminal: `php nama_file.php`. Latihan form (F) **harus** lewat browser: `http://localhost/latihan-php/nama_file.php`.
- Target minimal: tuntas semua level **Mudah + Menengah**. Level Tantangan adalah bonus.

> **Jembatan dari Hari 3 → Hari 4:** Logika yang Anda kuasai di JavaScript **muncul lagi persis di sini** — *pola sama, sintaks beda*. `let x = 5` menjadi `$x = 5;`. `console.log()` menjadi `echo`. `if/for/function` bentuknya nyaris identik. Fokuskan energi pada **3 perbedaan utama PHP**: tanda `$` di depan variabel, tanda `;` wajib di akhir baris, dan kode dibungkus `<?php ... ?>` lalu diproses **di server** sebelum sampai ke browser.

> **Jembatan ke Hari 5 (OOP):** Array asosiatif yang Anda buat hari ini (mis. `['nama' => 'Kopi', 'harga' => 20000]`) besok akan "naik kelas" menjadi **object** dari class `Produk`. Perhatikan baik-baik topik E — itu benih dari OOP.

---

## A. SINTAKS DASAR & VARIABEL

### ⭐ A1 — Hello, server
Buat file `hello.php` yang mencetak `"Halo dari server PHP!"` menggunakan `echo`. Jalankan lewat browser dan lewat terminal — amati keduanya menghasilkan output yang sama.

### ⭐ A2 — Biodata
Buat variabel `$nama`, `$umur`, `$kota`. Cetak dalam satu kalimat rapi:
`"Nama saya Budi, umur 25 tahun, dari Makassar."` (gunakan interpolasi string dengan tanda kutip ganda).

### ⭐⭐ A3 — echo vs print & concatenation
Cetak kalimat yang sama menggunakan **tiga cara**: (1) interpolasi `"..."`, (2) concatenation dengan titik `.`, (3) `print`. Amati perbedaan kutip tunggal `'...'` vs kutip ganda `"..."`.

### ⭐⭐ A4 — Cek tipe data
Buat variabel berisi: `42`, `"42"`, `3.14`, `true`, `[1,2,3]`. Gunakan `var_dump()` pada masing-masing untuk melihat tipe dan nilainya. Catat perbedaan `var_dump()` vs `echo`.

### ⭐⭐⭐ A5 — Konversi tipe
Diberikan `$a = "10"` (string) dan `$b = 5` (integer). Cetak hasil `$a + $b`, `$a . $b`, dan `(int)$a + $b`. Jelaskan (komentar) kenapa hasilnya berbeda — ini konsep *type juggling* PHP.

---

## B. OPERATOR & STRUKTUR KONTROL

### ⭐ B1 — Ganjil / genap
Buat variabel `$angka`, cetak `"Genap"` atau `"Ganjil"` dengan modulus (`%`).

### ⭐ B2 — Grade nilai
Diberikan `$nilai` (0–100), cetak grade: `A` (≥85), `B` (70–84), `C` (55–69), `D` (<55) menggunakan `if/elseif`.

### ⭐⭐ B3 — switch hari
Buat `$hari = 3`, gunakan `switch` untuk mencetak nama hari (1=Senin … 7=Minggu), dengan `default` untuk input tidak valid.

### ⭐⭐ B4 — Kalkulator ongkir
Buat `$berat` (kg) dan `$zona` (`"dalam"`/`"luar"`). Tarif: dalam `10000/kg`, luar `18000/kg`. Jika total `> 100000`, diskon 10%. Cetak ongkir akhir. (Bandingkan dengan versi JavaScript Hari 3 — logikanya sama persis!)

### ⭐⭐⭐ B5 — Ternary & null coalescing
Tulis ulang B1 menggunakan **operator ternary** (`? :`). Lalu buat variabel `$diskon` yang mengambil nilai dari `$_GET['diskon'] ?? 0` (null coalescing) — jika parameter tidak ada, pakai 0.

---

## C. PERULANGAN

### ⭐ C1 — Hitung mundur
Cetak `10` sampai `1`, lalu `"Selesai!"`.

### ⭐ C2 — Jumlah 1–100
Hitung total `1 + 2 + ... + 100` dengan `for`.

### ⭐⭐ C3 — Tabel perkalian
Cetak tabel perkalian `7` (dari `7×1` sampai `7×10`) format `"7 x 1 = 7"`.

### ⭐⭐ C4 — Tabel HTML dari perulangan
Buat file `.php` yang mencetak sebuah `<table>` HTML berisi angka 1–10 beserta kuadratnya, dihasilkan lewat `for`. (Latihan mencampur PHP + HTML — pola inti backend.)

### ⭐⭐⭐ C5 — foreach + nested
Diberikan array `$bulan = ["Jan", "Feb", "Mar"]`. Untuk tiap bulan, cetak nama bulan lalu angka 1–3 di bawahnya menggunakan `foreach` + `for` bersarang.

---

## D. FUNGSI

### ⭐ D1 — Fungsi luas
Buat fungsi `luasPersegiPanjang($p, $l)` yang me-`return` luas. Uji `luasPersegiPanjang(8, 5)`.

### ⭐ D2 — Fungsi salam
Buat fungsi `salam($nama)` yang mengembalikan `"Halo, Budi! Selamat datang."`.

### ⭐⭐ D3 — Fungsi bawaan string
Eksplorasi fungsi bawaan PHP: gunakan `strtoupper()`, `strlen()`, `ucwords()`, `str_replace()`, dan `substr()` pada kalimat `"belajar php itu seru"`. Cetak hasil masing-masing.

### ⭐⭐ D4 — Format rupiah
Buat fungsi `formatRupiah($angka)` yang mengubah `1500000` menjadi `"Rp1.500.000"` menggunakan `number_format()`.

### ⭐⭐⭐ D5 — Default parameter & return array
Buat fungsi `hitungTransaksi($harga, $qty, $pajak = 0.11)` yang mengembalikan **array asosiatif** berisi `subtotal`, `pajak`, dan `total`. Uji dan cetak hasilnya.

---

## E. ARRAY (INDEXED & ASSOCIATIVE) — awal aplikasi "toko"

### ⭐ E1 — Array indexed
Buat array `$buah = ["apel", "mangga", "jeruk"]`. Tambah `"pisang"` (`array_push` atau `[]`), cetak elemen ke-2, dan cetak jumlah elemen (`count`).

### ⭐ E2 — Array associative (satu produk)
Buat array `$produk = ["nama" => "Kopi Susu", "harga" => 20000, "stok" => 50]`. Cetak: `"Kopi Susu seharga Rp20.000, stok 50"`.

### ⭐⭐ E3 — Array of array (daftar produk toko)
Buat array berisi 3 produk (masing-masing array asosiatif `nama`, `harga`, `stok`). Gunakan `foreach` untuk mencetaknya sebagai daftar bernomor.

### ⭐⭐ E4 — Total nilai stok
Dari daftar produk di E3, hitung **total nilai seluruh stok** (`Σ harga × stok`) menggunakan `foreach`. Cetak dengan format rupiah.

### ⭐⭐⭐ E5 — Filter & cari
Dari daftar produk E3: (1) cetak hanya produk yang `harga > 15000`; (2) buat fungsi `cariProduk($daftar, $nama)` yang mengembalikan produk dengan nama tertentu, atau `null` jika tidak ada.

---

## F. MENANGANI FORM ($_GET, $_POST, SUPERGLOBALS)

> File di topik ini **harus** dibuka lewat browser (`http://localhost/...`).

### ⭐ F1 — Form GET sederhana
Buat `form.php` dengan sebuah input `nama` (`method="get"`). Saat disubmit ke `proses.php`, tampilkan `"Halo, [nama]"` dari `$_GET['nama']`.

### ⭐⭐ F2 — Form POST satu file
Buat satu file `daftar.php` yang menampilkan form **dan** memproses hasilnya (cek `$_SERVER['REQUEST_METHOD'] === 'POST'`). Tampilkan kembali data yang dikirim.

### ⭐⭐ F3 — Kalkulator via form
Buat form dengan 2 input angka + pilihan operator (`select`). Saat submit (POST), hitung dan tampilkan hasilnya di halaman yang sama.

### ⭐⭐⭐ F4 — Form pendaftaran + validasi server-side
Buat form pendaftaran (`nama`, `email`, `umur`). Saat submit, validasi di server:
- semua field wajib diisi,
- `email` harus valid (`filter_var(..., FILTER_VALIDATE_EMAIL)`),
- `umur` harus angka ≥ 17.

Tampilkan pesan error per field jika tidak valid, atau ringkasan data jika lolos. **Selalu** gunakan `htmlspecialchars()` saat menampilkan input pengguna (pengenalan keamanan dasar).

---

## G. INCLUDE & REQUIRE

### ⭐ G1 — Pisahkan header & footer
Buat `header.php` dan `footer.php`. Buat `index.php` yang menyusun halaman dengan `include 'header.php';` … isi … `include 'footer.php';`.

### ⭐⭐ G2 — File fungsi bersama
Pindahkan fungsi `formatRupiah()` (dari D4) ke file `helpers.php`. Panggil dengan `require 'helpers.php';` dari file lain dan gunakan fungsinya.

### ⭐⭐ G3 — include vs require
Coba `include 'file_tidak_ada.php';` lalu `require 'file_tidak_ada.php';`. Amati perbedaan perilaku (warning vs fatal error) dan tulis kesimpulannya sebagai komentar.

### ⭐⭐⭐ G4 — Susun mini-aplikasi toko
Susun struktur rapi: `data/produk.php` (mengembalikan array daftar produk), `helpers.php` (fungsi format & hitung), `index.php` (meng-`require` keduanya lalu menampilkan katalog toko lengkap dengan total nilai stok). Ini **kerangka berpikir yang sama** dengan struktur aplikasi Laravel nanti.

---

# KUNCI JAWABAN (UNTUK INSTRUKTUR)

> Solusi berikut adalah **salah satu** cara yang benar. Terima variasi jawaban peserta selama output & logikanya tepat.

### A. Sintaks Dasar & Variabel
```php
<?php
// A2
$nama = "Budi"; $umur = 25; $kota = "Makassar";
echo "Nama saya $nama, umur $umur tahun, dari $kota.";

// A5 — type juggling
$a = "10"; $b = 5;
echo $a + $b;        // 15  (string "10" dijadikan angka)
echo $a . $b;        // "105" (operator . = penggabungan string)
echo (int)$a + $b;   // 15  (dipaksa jadi integer secara eksplisit)
```

### B. Operator & Struktur Kontrol
```php
<?php
// B4 — kalkulator ongkir (bandingkan dgn versi JS Hari 3: identik!)
$berat = 8; $zona = "luar";
$tarif = ($zona === "dalam") ? 10000 : 18000;
$total = $berat * $tarif;
if ($total > 100000) $total -= $total * 0.10;
echo $total; // 129600

// B5 — ternary + null coalescing
$angka = 7;
echo ($angka % 2 === 0) ? "Genap" : "Ganjil";
$diskon = $_GET['diskon'] ?? 0; // aman walau parameter tidak ada
```

### C. Perulangan
```php
<?php
// C2
$total = 0;
for ($i = 1; $i <= 100; $i++) $total += $i;
echo $total; // 5050

// C4 — tabel HTML dari loop
echo "<table border='1'>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr><td>$i</td><td>" . ($i * $i) . "</td></tr>";
}
echo "</table>";
```

### D. Fungsi
```php
<?php
// D4
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
echo formatRupiah(1500000); // Rp1.500.000

// D5 — default param + return array
function hitungTransaksi($harga, $qty, $pajak = 0.11) {
    $subtotal = $harga * $qty;
    $nilaiPajak = $subtotal * $pajak;
    return [
        'subtotal' => $subtotal,
        'pajak'    => $nilaiPajak,
        'total'    => $subtotal + $nilaiPajak,
    ];
}
$hasil = hitungTransaksi(20000, 3);
print_r($hasil); // subtotal 60000, pajak 6600, total 66600
```

### E. Array (awal aplikasi "toko")
```php
<?php
// E3, E4, E5 (digabung)
$daftar = [
    ["nama" => "Kopi Susu", "harga" => 20000, "stok" => 50],
    ["nama" => "Teh Manis", "harga" => 12000, "stok" => 30],
    ["nama" => "Air Mineral", "harga" => 5000, "stok" => 100],
];

// E3 — cetak bernomor
$no = 1;
foreach ($daftar as $p) {
    echo "$no. {$p['nama']} - Rp" . number_format($p['harga'], 0, ',', '.') .
         " (stok {$p['stok']})\n";
    $no++;
}

// E4 — total nilai stok
$totalNilai = 0;
foreach ($daftar as $p) {
    $totalNilai += $p['harga'] * $p['stok'];
}
echo "Total nilai stok: Rp" . number_format($totalNilai, 0, ',', '.') . "\n";
// = Rp1.860.000

// E5 — cari produk
function cariProduk($daftar, $nama) {
    foreach ($daftar as $p) {
        if ($p['nama'] === $nama) return $p;
    }
    return null;
}
print_r(cariProduk($daftar, "Teh Manis"));
```

### F. Menangani Form (contoh F4 — form + validasi server-side)
```php
<?php
$errors = [];
$sukses = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $umur  = $_POST['umur'] ?? '';

    if ($nama === '')  $errors['nama'] = "Nama wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Email tidak valid.";
    if (!is_numeric($umur) || $umur < 17) $errors['umur'] = "Umur minimal 17.";

    if (empty($errors)) $sukses = true;
}
?>
<form method="post">
    Nama:  <input name="nama"><br>
    Email: <input name="email"><br>
    Umur:  <input name="umur"><br>
    <button type="submit">Daftar</button>
</form>

<?php if (!empty($errors)): ?>
    <ul style="color:#EF3B2D">
        <?php foreach ($errors as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php elseif ($sukses): ?>
    <p>Pendaftaran berhasil: <?= htmlspecialchars($nama) ?> (<?= htmlspecialchars($email) ?>)</p>
<?php endif; ?>
```
> **Catatan keamanan (jelaskan ke peserta):** `htmlspecialchars()` mencegah kode HTML/JavaScript yang diketik pengguna ikut dijalankan (dasar mitigasi XSS). Biasakan sejak Hari 4 — di Laravel nanti Blade `{{ }}` melakukan ini otomatis.

### G. Include & Require (contoh G4 — mini-aplikasi toko)
```php
<?php
// data/produk.php
return [
    ["nama" => "Kopi Susu", "harga" => 20000, "stok" => 50],
    ["nama" => "Teh Manis", "harga" => 12000, "stok" => 30],
];
```
```php
<?php
// helpers.php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
function totalNilaiStok($daftar) {
    $total = 0;
    foreach ($daftar as $p) $total += $p['harga'] * $p['stok'];
    return $total;
}
```
```php
<?php
// index.php
require 'helpers.php';
$daftar = require 'data/produk.php';

echo "<h1>Katalog Toko</h1><ul>";
foreach ($daftar as $p) {
    echo "<li>{$p['nama']} - " . formatRupiah($p['harga']) .
         " (stok {$p['stok']})</li>";
}
echo "</ul>";
echo "<p><b>Total nilai stok:</b> " . formatRupiah(totalNilaiStok($daftar)) . "</p>";
```
> **G3 — kesimpulan:** `include` hanya memberi **warning** dan skrip **lanjut** jika file tidak ada; `require` memberi **fatal error** dan skrip **berhenti**. Gunakan `require` untuk file yang wajib ada (fungsi inti, config); `include` untuk yang opsional.

---

## PANDUAN WAKTU (SARAN INSTRUKTUR)

| Segmen      | Aktivitas                          | Durasi   |
| ----------- | ---------------------------------- | -------- |
| Lab mandiri | Topik A–C (sintaks, kontrol, loop) | 60 menit |
| Lab mandiri | Topik D–E (fungsi & array toko)    | 60 menit |
| Demo + lab  | Topik F (form & superglobals)      | 60 menit |
| Demo + lab  | Topik G (include/require)          | 30 menit |
| Review      | Bahas kunci jawaban + tanya jawab  | 30 menit |

> **Tips diferensiasi:** Manfaatkan bahwa peserta **baru saja** mengerjakan logika yang sama di JavaScript kemarin — minta mereka membuka file JS Hari 3 dan menaruh versi PHP-nya berdampingan (mis. soal ongkir B4). Melihat "kembar" dua bahasa ini sangat mempercepat pemahaman dan mengurangi rasa takut peserta nol.

> **Penegasan jembatan (tutup sesi):** Tekankan bahwa array asosiatif produk hari ini adalah **cikal-bakal object** besok. Kalimat kunci untuk peserta: *"Besok, `['nama' => 'Kopi']` ini akan kita bungkus jadi sebuah object `Produk` — datanya sama, tapi caranya lebih rapi dan aman."* Ini menyiapkan mental peserta untuk lompatan ke OOP di Hari 5.