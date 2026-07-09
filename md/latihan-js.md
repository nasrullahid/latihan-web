# LATIHAN TAMBAHAN — HARI 3
## JavaScript Dasar

> **Program:** Web Programmer Dasar (Laravel) — PT LPK Mentorbox Indonesia
> **Fase 1 — Fondasi Web · Hari 3**
> **Fokus:** Variabel, operator, struktur kontrol, perulangan, fungsi, array/object, DOM, event

---

## PETUNJUK UNTUK PESERTA

- Kerjakan latihan **berurutan** dari topik A ke G. Setiap topik punya level **⭐ Mudah**, **⭐⭐ Menengah**, **⭐⭐⭐ Tantangan**.
- Tulis kode di file `.html` (untuk yang butuh DOM) atau langsung uji di **Console browser** (`F12` → tab *Console*) untuk latihan logika murni.
- Jangan lihat kunci jawaban sebelum mencoba minimal 10 menit per soal.
- Target minimal: selesaikan **semua level Mudah + Menengah**. Level Tantangan adalah bonus.

> **Jembatan ke Hari 4:** Semua logika yang Anda latih hari ini (variabel, if/else, loop, fungsi, array) akan Anda temui lagi persis di **PHP (Hari 4)** — hanya beda sintaks. Menguasai logika hari ini = setengah jalan menuju backend.

---

## A. VARIABEL, TIPE DATA & OPERATOR

### ⭐ A1 — Tukar nilai
Buat dua variabel `a = 5` dan `b = 10`. Tukar isinya sehingga `a` menjadi 10 dan `b` menjadi 5. Cetak keduanya dengan `console.log`.

### ⭐ A2 — Kalkulasi diskon
Sebuah barang harganya `120000`. Diskonnya `25%`. Hitung dan cetak **harga akhir** setelah diskon.

### ⭐⭐ A3 — Tebak tipe data
Untuk tiap nilai berikut, tebak dulu hasil `typeof`-nya, lalu buktikan di console:
`42`, `"42"`, `true`, `null`, `undefined`, `{nama: "Budi"}`, `[1,2,3]`.

### ⭐⭐ A4 — Perbedaan `==` dan `===`
Jelaskan (tulis komentar) dan buktikan hasil dari:
```js
console.log(5 == "5");
console.log(5 === "5");
console.log(0 == false);
console.log(0 === false);
```

### ⭐⭐⭐ A5 — Konversi suhu
Buat variabel `celsius = 30`. Konversikan ke Fahrenheit dengan rumus `(C × 9/5) + 32` dan cetak dengan format:
`"30°C = 86°F"` (gunakan template literal / backtick).

---

## B. STRUKTUR KONTROL (if/else & switch)

### ⭐ B1 — Ganjil atau genap
Buat variabel `angka`. Cetak `"Genap"` atau `"Ganjil"` menggunakan operator modulus (`%`).

### ⭐ B2 — Grade nilai
Diberikan variabel `nilai` (0–100), cetak grade:
`A` (≥85), `B` (70–84), `C` (55–69), `D` (<55). Gunakan `if/else if`.

### ⭐⭐ B3 — Hari dalam seminggu
Buat variabel `hari = 3`. Gunakan `switch` untuk mencetak nama hari (1 = Senin, ..., 7 = Minggu). Sertakan `default` untuk input tidak valid.

### ⭐⭐ B4 — Kategori umur
Diberikan `umur`, cetak kategori: `"Anak"` (<13), `"Remaja"` (13–17), `"Dewasa"` (18–59), `"Lansia"` (≥60).

### ⭐⭐⭐ B5 — Kalkulator ongkir
Buat variabel `berat` (kg) dan `zona` (`"dalam"` / `"luar"`). Tarif: dalam kota `10000/kg`, luar kota `18000/kg`. Jika total `> 100000`, beri diskon `10%`. Cetak ongkir akhir.

---

## C. PERULANGAN (for & while)

### ⭐ C1 — Hitung mundur
Cetak angka `10` sampai `1`, lalu cetak `"Selesai!"`.

### ⭐ C2 — Jumlah 1–100
Hitung total penjumlahan `1 + 2 + 3 + ... + 100` menggunakan `for`.

### ⭐⭐ C3 — Tabel perkalian
Cetak tabel perkalian angka `7` (dari `7×1` sampai `7×10`) dengan format `"7 x 1 = 7"`.

### ⭐⭐ C4 — FizzBuzz
Cetak angka `1` sampai `30`. Tapi:
- kelipatan 3 → cetak `"Fizz"`
- kelipatan 5 → cetak `"Buzz"`
- kelipatan 3 **dan** 5 → cetak `"FizzBuzz"`

### ⭐⭐⭐ C5 — Piramida bintang
Cetak pola berikut menggunakan perulangan bersarang (nested loop):
```
*
**
***
****
*****
```

---

## D. FUNGSI

### ⭐ D1 — Fungsi luas persegi panjang
Buat fungsi `luasPersegiPanjang(panjang, lebar)` yang mengembalikan (`return`) hasil luas. Uji dengan `luasPersegiPanjang(8, 5)`.

### ⭐ D2 — Fungsi salam
Buat fungsi `salam(nama)` yang mengembalikan `"Halo, Budi! Selamat datang."` (nama menyesuaikan argumen).

### ⭐⭐ D3 — Cek bilangan prima
Buat fungsi `isPrima(n)` yang mengembalikan `true`/`false`. Uji dengan `7`, `10`, `13`.

### ⭐⭐ D4 — Konversi rupiah
Buat fungsi `formatRupiah(angka)` yang mengubah `1500000` menjadi string `"Rp1.500.000"`.
> Petunjuk: bisa pakai `.toLocaleString('id-ID')`.

### ⭐⭐⭐ D5 — Kalkulator fleksibel
Buat fungsi `hitung(a, b, operator)` di mana `operator` bisa `"+"`, `"-"`, `"*"`, `"/"`. Kembalikan hasilnya. Tangani pembagian dengan nol (kembalikan `"Error: bagi nol"`).

---

## E. ARRAY & OBJECT

### ⭐ E1 — Operasi array dasar
Buat array `buah = ["apel", "mangga", "jeruk"]`. Lalu:
1. Tambah `"pisang"` di akhir (`push`)
2. Hapus elemen pertama (`shift`)
3. Cetak jumlah elemen dan seluruh isi array

### ⭐ E2 — Object mahasiswa
Buat object `mahasiswa` dengan properti `nama`, `nim`, `jurusan`. Cetak kalimat:
`"Budi (NIM: 12345) dari jurusan Informatika."`

### ⭐⭐ E3 — Total & rata-rata nilai
Diberikan array `nilai = [80, 65, 90, 75, 88]`. Hitung **total** dan **rata-rata** menggunakan perulangan (atau `reduce`).

### ⭐⭐ E4 — Filter produk mahal
Diberikan array of object:
```js
const produk = [
  { nama: "Mouse", harga: 75000 },
  { nama: "Keyboard", harga: 150000 },
  { nama: "Monitor", harga: 1200000 },
  { nama: "Mousepad", harga: 40000 }
];
```
Cetak hanya nama produk yang harganya `> 100000`. (Gunakan `filter` + `forEach`, atau loop biasa.)

### ⭐⭐⭐ E5 — Cari produk termahal
Dari array `produk` di soal E4, buat fungsi yang mengembalikan **object produk dengan harga tertinggi**.

---

## F. MANIPULASI DOM

> Buat file `latihan-dom.html`. Sediakan elemen HTML yang dibutuhkan tiap soal.

### ⭐ F1 — Ubah teks
Buat sebuah `<h1 id="judul">Teks Lama</h1>` dan tombol. Saat tombol diklik, ubah teks judul menjadi `"Teks Baru"`.

### ⭐ F2 — Ubah warna
Buat sebuah `<div>` dan tombol. Saat tombol diklik, ubah warna latar div menjadi merah (`#EF3B2D`).

### ⭐⭐ F3 — Toggle tampil/sembunyi
Buat paragraf dan tombol "Tampilkan / Sembunyikan". Setiap klik, paragraf bergantian muncul dan hilang (`style.display`).

### ⭐⭐ F4 — Penghitung klik
Buat tombol dan sebuah `<span>`. Setiap tombol diklik, angka di `<span>` bertambah 1.

### ⭐⭐⭐ F5 — Daftar dinamis
Buat sebuah `<input>`, tombol "Tambah", dan sebuah `<ul>` kosong. Setiap tombol diklik, isi input ditambahkan sebagai `<li>` baru ke dalam list.

---

## G. EVENT HANDLING

### ⭐ G1 — Sapaan real-time
Buat `<input>` dan `<p>`. Saat pengguna mengetik (event `input`), tampilkan `"Halo, [isi input]"` secara langsung di paragraf.

### ⭐⭐ G2 — Validasi form sederhana
Buat form dengan input `email` dan tombol submit. Saat submit (`event.preventDefault()`), cek apakah input mengandung karakter `@`. Jika tidak, tampilkan pesan `"Email tidak valid"`.

### ⭐⭐⭐ G3 — Penghitung karakter
Buat `<textarea maxlength="100">` dan `<p>`. Saat mengetik, tampilkan sisa karakter: `"85 karakter tersisa"`. Ubah warna teks menjadi merah jika sisa `< 10`.

---

## 🏆 MINI-PROJECT TANTANGAN (GABUNGAN)

Gabungkan semua materi Hari 3 menjadi satu aplikasi kecil. **Pilih salah satu:**

### Opsi 1 — Kalkulator BMI
- Input: berat (kg) & tinggi (cm)
- Tombol "Hitung" → hitung BMI = `berat / (tinggi_meter)²`
- Tampilkan hasil + kategori (Kurus / Normal / Gemuk / Obesitas)
- Warna hasil berbeda sesuai kategori

### Opsi 2 — Daftar Belanja Interaktif
- Input nama barang + tombol "Tambah" → masuk ke daftar (`<ul>`)
- Setiap item punya tombol "Hapus"
- Tampilkan total jumlah item di bagian bawah
- Bonus: simpan jumlah item pakai variabel counter

### Opsi 3 — Kuis Pilihan Ganda
- Tampilkan 3 soal + pilihan jawaban
- Tombol "Cek Jawaban" → hitung skor benar
- Tampilkan hasil: `"Skor kamu: 2/3"`

> **Kriteria penilaian mini-project:** menggunakan minimal 1 fungsi, 1 struktur kontrol, 1 perulangan atau array, manipulasi DOM, dan 1 event handler.

---

# KUNCI JAWABAN (UNTUK INSTRUKTUR)

> Solusi berikut adalah **salah satu** cara yang benar. Terima variasi jawaban peserta selama logikanya tepat dan output sesuai.

### A. Variabel, Tipe Data & Operator
```js
// A1
let a = 5, b = 10;
let temp = a; a = b; b = temp;
console.log(a, b); // 10 5

// A2
let harga = 120000;
let hargaAkhir = harga - (harga * 25 / 100);
console.log(hargaAkhir); // 90000

// A3 -> number, string, boolean, object, undefined, object, object
// (catatan: typeof null === "object" adalah "bug historis" JS)

// A4
console.log(5 == "5");   // true  (nilai sama, tipe diabaikan)
console.log(5 === "5");  // false (tipe beda: number vs string)
console.log(0 == false); // true
console.log(0 === false);// false

// A5
let celsius = 30;
let f = (celsius * 9/5) + 32;
console.log(`${celsius}°C = ${f}°F`); // 30°C = 86°F
```

### B. Struktur Kontrol
```js
// B1
let angka = 7;
console.log(angka % 2 === 0 ? "Genap" : "Ganjil");

// B2
let nilai = 78;
if (nilai >= 85) console.log("A");
else if (nilai >= 70) console.log("B");
else if (nilai >= 55) console.log("C");
else console.log("D");

// B3
let hari = 3;
switch (hari) {
  case 1: console.log("Senin"); break;
  case 2: console.log("Selasa"); break;
  case 3: console.log("Rabu"); break;
  case 4: console.log("Kamis"); break;
  case 5: console.log("Jumat"); break;
  case 6: console.log("Sabtu"); break;
  case 7: console.log("Minggu"); break;
  default: console.log("Hari tidak valid");
}

// B5
let berat = 8, zona = "luar";
let tarif = zona === "dalam" ? 10000 : 18000;
let total = berat * tarif;
if (total > 100000) total = total - (total * 0.10);
console.log(total); // 129600
```

### C. Perulangan
```js
// C2
let total = 0;
for (let i = 1; i <= 100; i++) total += i;
console.log(total); // 5050

// C4 (FizzBuzz)
for (let i = 1; i <= 30; i++) {
  if (i % 15 === 0) console.log("FizzBuzz");
  else if (i % 3 === 0) console.log("Fizz");
  else if (i % 5 === 0) console.log("Buzz");
  else console.log(i);
}

// C5 (Piramida)
for (let i = 1; i <= 5; i++) {
  let baris = "";
  for (let j = 1; j <= i; j++) baris += "*";
  console.log(baris);
}
```

### D. Fungsi
```js
// D3
function isPrima(n) {
  if (n < 2) return false;
  for (let i = 2; i < n; i++) {
    if (n % i === 0) return false;
  }
  return true;
}

// D4
function formatRupiah(angka) {
  return "Rp" + angka.toLocaleString('id-ID');
}
console.log(formatRupiah(1500000)); // Rp1.500.000

// D5
function hitung(a, b, operator) {
  switch (operator) {
    case "+": return a + b;
    case "-": return a - b;
    case "*": return a * b;
    case "/": return b === 0 ? "Error: bagi nol" : a / b;
    default: return "Operator tidak dikenal";
  }
}
```

### E. Array & Object
```js
// E3
const nilai = [80, 65, 90, 75, 88];
let total = 0;
for (let n of nilai) total += n;
console.log("Total:", total);              // 398
console.log("Rata-rata:", total / nilai.length); // 79.6

// E4
const produk = [
  { nama: "Mouse", harga: 75000 },
  { nama: "Keyboard", harga: 150000 },
  { nama: "Monitor", harga: 1200000 },
  { nama: "Mousepad", harga: 40000 }
];
produk.filter(p => p.harga > 100000)
      .forEach(p => console.log(p.nama)); // Keyboard, Monitor

// E5
function produkTermahal(list) {
  let termahal = list[0];
  for (let p of list) {
    if (p.harga > termahal.harga) termahal = p;
  }
  return termahal;
}
console.log(produkTermahal(produk)); // { nama: "Monitor", harga: 1200000 }
```

### F. Manipulasi DOM (contoh F5 — Daftar dinamis)
```html
<input id="inputTeks" type="text">
<button id="btnTambah">Tambah</button>
<ul id="daftar"></ul>

<script>
  const btn = document.getElementById("btnTambah");
  const input = document.getElementById("inputTeks");
  const daftar = document.getElementById("daftar");

  btn.addEventListener("click", function () {
    if (input.value.trim() === "") return;
    const li = document.createElement("li");
    li.textContent = input.value;
    daftar.appendChild(li);
    input.value = "";
  });
</script>
```

### G. Event Handling (contoh G3 — Penghitung karakter)
```html
<textarea id="teks" maxlength="100"></textarea>
<p id="info">100 karakter tersisa</p>

<script>
  const teks = document.getElementById("teks");
  const info = document.getElementById("info");

  teks.addEventListener("input", function () {
    const sisa = 100 - teks.value.length;
    info.textContent = sisa + " karakter tersisa";
    info.style.color = sisa < 10 ? "#EF3B2D" : "#18181B";
  });
</script>
```

### 🏆 Mini-Project — Contoh Solusi Opsi 1 (Kalkulator BMI)
```html
<input id="berat" type="number" placeholder="Berat (kg)">
<input id="tinggi" type="number" placeholder="Tinggi (cm)">
<button id="hitung">Hitung BMI</button>
<p id="hasil"></p>

<script>
  document.getElementById("hitung").addEventListener("click", function () {
    const berat = parseFloat(document.getElementById("berat").value);
    const tinggiM = parseFloat(document.getElementById("tinggi").value) / 100;
    const bmi = berat / (tinggiM * tinggiM);

    let kategori, warna;
    if (bmi < 18.5)      { kategori = "Kurus";     warna = "#38BDF8"; }
    else if (bmi < 25)   { kategori = "Normal";    warna = "green";   }
    else if (bmi < 30)   { kategori = "Gemuk";     warna = "orange";  }
    else                 { kategori = "Obesitas";  warna = "#EF3B2D"; }

    const hasil = document.getElementById("hasil");
    hasil.textContent = `BMI: ${bmi.toFixed(1)} — ${kategori}`;
    hasil.style.color = warna;
  });
</script>
```

---

## PANDUAN WAKTU (SARAN INSTRUKTUR)

| Segmen       | Aktivitas                         | Durasi   |
| ------------ | --------------------------------- | -------- |
| Lab mandiri  | Topik A–E (logika)                | 60 menit |
| Lab mandiri  | Topik F–G (DOM & event)           | 45 menit |
| Mini-project | Pilih 1 opsi + bimbingan          | 60 menit |
| Review       | Bahas kunci jawaban + tanya jawab | 30 menit |

> **Tips diferensiasi:** Peserta cepat → dorong ke level Tantangan & mini-project Opsi 3 (Kuis). Peserta yang tertinggal → fokuskan tuntas di level Mudah–Menengah topik A–D dulu, DOM bisa menyusul.