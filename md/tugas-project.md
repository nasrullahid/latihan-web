# TUGAS PROYEK AKHIR — DAFTAR FITUR WAJIB
## Web Programmer Dasar (Laravel)

---

## PRINSIP KESETARAAN (Baca Dulu)

Peserta boleh **memilih salah satu** dari 4 tema project. Agar penilaian **adil** apa pun tema yang dipilih, keempat project dirancang dengan **struktur fitur yang identik**:

- **8 fitur wajib** — posisi/slotnya sama persis di semua project, hanya konteks domainnya berbeda.
- **2 fitur bonus** — untuk mengejar predikat *Sangat Kompeten*.
- **3 syarat melekat** (validasi input, tampilan responsif, deployment + Git) — berlaku di **semua** fitur, bukan slot terpisah.

> Artinya: beban kerja, jumlah tabel minimal, dan kompetensi yang diuji **sama rata**. Yang membedakan hanya "cerita" studi kasusnya. Tidak ada tema yang lebih ringan atau lebih berat.

---

## KERANGKA 8 SLOT FITUR WAJIB

| Slot | Fitur Wajib (sama di semua project) | Kompetensi Diuji | Hari |
|---|---|---|---|
| 1 | Autentikasi + minimal 2 role | Auth & otorisasi | 11 |
| 2 | CRUD Master A (entitas induk) | CRUD | 10 |
| 3 | CRUD Master B (entitas utama) | CRUD | 10 |
| 4 | Relasi antar entitas | Relasi Eloquent | 12 |
| 5 | Fitur inti transaksional (khas domain) | Logika bisnis | 10–12 |
| 6 | Upload gambar/file | Pengelolaan file | 12 |
| 7 | Pencarian + filter + pagination | Query lanjutan | 12 |
| 8 | Dashboard/laporan rekap sederhana | Agregasi data | 6 & 12 |

**Syarat melekat (wajib, tanpa dihitung slot):**
- Semua form punya **validasi input** (Form Request).
- Semua halaman **responsif** (HP & desktop).
- Aplikasi **ter-deploy online** dengan alur **Git**.

---

## MATRIKS PERBANDINGAN 4 PROJECT

| Slot | 🧾 POS/Kasir | 📰 CMS Blog/Berita | 🎓 LPK/LMS | 🛒 Ecommerce |
|---|---|---|---|---|
| **1. Auth + role** | Admin & Kasir | Admin & Penulis | Admin & Peserta | Admin & Pelanggan |
| **2. Master A** | Kategori | Kategori | Kategori Kursus | Kategori |
| **3. Master B** | Produk | Artikel/Berita | Kursus/Kelas | Produk |
| **4. Relasi** | Produk → Kategori (1‑N) | Artikel → Kategori & Penulis (1‑N) | Peserta ↔ Kursus (N‑N) | Produk → Kategori (1‑N) + Order ↔ Produk (N‑N) |
| **5. Fitur inti** | Transaksi jual + stok turun + struk | Publish artikel + halaman publik | Enrollment peserta ke kursus | Keranjang + checkout jadi order |
| **6. Upload** | Foto produk | Thumbnail artikel | Thumbnail/materi kursus | Foto produk |
| **7. Cari/filter/paginate** | Produk & riwayat transaksi | Artikel per kategori | Katalog kursus | Katalog produk |
| **8. Dashboard** | Rekap penjualan harian | Rekap artikel per kategori/penulis | Rekap peserta per kursus | Rekap order & produk terlaris |
| **★ Bonus 1** | REST API produk | REST API artikel | REST API kursus | REST API produk |
| **★ Bonus 2** | Grafik/export laporan | Komentar publik | Modul/materi per kursus | Status & tracking order |

---

## RINCIAN PER PROJECT

### 🧾 PROJECT A — APLIKASI KASIR (POS)

**Cerita:** Kasir toko mencatat transaksi penjualan; admin mengelola produk & melihat laporan.

1. **Auth + role** — Login/logout. Role **Admin** (kelola produk, lihat laporan) & **Kasir** (hanya transaksi).
2. **CRUD Kategori** — Tambah/ubah/hapus kategori produk (mis. Makanan, Minuman).
3. **CRUD Produk** — Nama, harga, stok, kategori, foto.
4. **Relasi** — Setiap Produk **milik satu** Kategori (One‑to‑Many).
5. **Fitur inti — Transaksi penjualan** — Pilih produk → keranjang → simpan transaksi → **stok otomatis berkurang** → tampilkan/cetak struk.
6. **Upload** — Foto produk.
7. **Cari/filter/paginate** — Cari produk by nama, filter by kategori; daftar riwayat transaksi ber-pagination.
8. **Dashboard** — Total transaksi & total pendapatan **hari ini**.

★ **Bonus:** (1) REST API daftar produk. (2) Grafik penjualan / export laporan PDF-CSV.

---

### 📰 PROJECT B — CMS BLOG / BERITA

**Cerita:** Penulis membuat artikel; admin mengelola & memublikasikan; pengunjung membaca.

1. **Auth + role** — Login/logout. Role **Admin** (kelola semua) & **Penulis** (kelola artikel sendiri).
2. **CRUD Kategori** — Kategori artikel (mis. Teknologi, Olahraga).
3. **CRUD Artikel** — Judul, isi, thumbnail, status **Draft/Publish**.
4. **Relasi** — Artikel **milik satu** Kategori **dan** **milik satu** Penulis (User) — dua relasi One‑to‑Many.
5. **Fitur inti — Publikasi & tampilan publik** — Hanya artikel *published* tampil di halaman depan; ada halaman detail artikel.
6. **Upload** — Thumbnail/gambar artikel.
7. **Cari/filter/paginate** — Cari artikel by judul, filter by kategori; daftar ber-pagination.
8. **Dashboard** — Jumlah artikel total, per kategori, dan per penulis.

★ **Bonus:** (1) REST API daftar artikel. (2) Kolom komentar pengunjung.

---

### 🎓 PROJECT C — WEBSITE LPK / LMS

**Cerita:** Peserta mendaftar kursus; admin mengelola kursus & melihat peminat.

1. **Auth + role** — Login/logout. Role **Admin** (kelola kursus) & **Peserta** (daftar & lihat kursusnya).
2. **CRUD Kategori Kursus** — Kategori (mis. Programming, Desain).
3. **CRUD Kursus** — Judul, deskripsi, thumbnail, kategori.
4. **Relasi** — Kursus **milik** Kategori (1‑N); Peserta **mengikuti banyak** Kursus & Kursus **punya banyak** Peserta (**Many‑to‑Many** via tabel pivot `enrollments`).
5. **Fitur inti — Enrollment** — Peserta klik "Daftar Kursus"; muncul di "Kursus Saya"; admin lihat daftar peminat tiap kursus.
6. **Upload** — Thumbnail kursus / file materi.
7. **Cari/filter/paginate** — Cari kursus by judul, filter by kategori; katalog ber-pagination.
8. **Dashboard** — Jumlah kursus, jumlah peserta terdaftar per kursus.

★ **Bonus:** (1) REST API daftar kursus. (2) Modul/materi bertingkat per kursus.

---

### 🛒 PROJECT D — ECOMMERCE

**Cerita:** Pelanggan belanja & checkout; admin mengelola produk & pesanan.

1. **Auth + role** — Login/logout. Role **Admin** (kelola produk & order) & **Pelanggan** (belanja).
2. **CRUD Kategori** — Kategori produk.
3. **CRUD Produk** — Nama, harga, stok, kategori, foto.
4. **Relasi** — Produk **milik** Kategori (1‑N); Order **berisi banyak** Produk & Produk **ada di banyak** Order (**Many‑to‑Many** via pivot `order_items`).
5. **Fitur inti — Keranjang & checkout** — Tambah produk ke keranjang → checkout → tercatat sebagai Order (+ ringkasan total).
6. **Upload** — Foto produk.
7. **Cari/filter/paginate** — Cari produk by nama, filter by kategori/harga; katalog ber-pagination.
8. **Dashboard** — Jumlah order, total penjualan, produk terlaris.

★ **Bonus:** (1) REST API daftar produk. (2) Status order (Baru → Diproses → Selesai) + tracking.

---

## CATATAN KESETARAAN UNTUK INSTRUKTUR

- **Jumlah tabel setara.** Semua project butuh **minimal 3 tabel** inti + tabel `users`. Project dengan relasi Many‑to‑Many (LMS, Ecommerce) menambah 1 tabel pivot, tetapi ini **diimbangi** oleh project 1‑N (POS, CMS) yang punya logika inti transaksional lebih padat (stok, status publish). Beban tetap sebanding.
- **Tingkat kesulitan relasi berbeda tapi setara nilainya.** Pada rubrik "Relasi database", **1‑N yang benar** dan **N‑N yang benar** sama-sama dinilai **Kompeten**. Jangan menghukum peserta 1‑N atau memberi nilai lebih ke N‑N — yang dinilai adalah *ketepatan implementasi*, bukan jenis relasinya.
- **Slot 1–8 dipetakan langsung ke rubrik Proyek Akhir** (lihat Modul bagian F). Setiap peserta dinilai dengan kriteria yang sama: Fungsionalitas CRUD, Autentikasi, Relasi, Validasi & error handling, Tampilan, Deployment.
- **Bonus = jalur ke "Sangat Kompeten".** Kedua bonus tiap project setara kadar kesulitannya (satu REST API + satu fitur lanjutan domain).

---

## RINGKASAN SYARAT MINIMAL (checklist peserta)

- [ ] Login/logout dengan minimal 2 role
- [ ] 2 modul CRUD (Master A & Master B)
- [ ] Minimal 1 relasi antar tabel yang benar
- [ ] Fitur inti transaksional khas project berjalan
- [ ] Upload gambar/file
- [ ] Pencarian + filter + pagination
- [ ] Dashboard/laporan rekap
- [ ] Validasi input di semua form
- [ ] Tampilan responsif (HP & desktop)
- [ ] Ter-deploy online + riwayat Git rapi