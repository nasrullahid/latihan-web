# latihan-web

Kumpulan latihan belajar web dasar: HTML, CSS, dan JavaScript.

## Struktur Proyek

```
latihan-web/
├── html/
│   ├── index.html      # Halaman utama (HTML dasar)
│   ├── profil.html     # Halaman profil (Tailwind CSS via CDN)
│   ├── css/style.css   # Styling untuk index.html
│   ├── js/script.js    # Latihan JavaScript
│   └── img/foto.jpg    # Gambar profil
└── md/
    └── latihan-js.md   # Daftar soal latihan JavaScript
```

## Cara Menjalankan

### Halaman HTML
Buka file HTML langsung di browser:

```sh
open html/index.html      # macOS
```

Atau jalankan lewat server statis agar path aset lebih rapi:

```sh
cd html
python3 -m http.server 8000
# lalu buka http://localhost:8000
```

### Latihan JavaScript
Jalankan lewat Node.js untuk melihat output di terminal:

```sh
node html/js/script.js
```

Atau buka `html/index.html` di browser dan lihat hasilnya di Console (F12).

## Isi Latihan

- **`index.html`** — dasar HTML: heading, paragraf, list, link, dan gambar.
- **`profil.html`** — halaman profil responsif menggunakan Tailwind CSS (biodata, tabel keahlian, dan form kontak).
- **`js/script.js`** — penyelesaian soal di `md/latihan-js.md` (diskon, grade nilai, penjumlahan, nested loop, ongkir, kalkulator, cek bilangan prima).

Soal lengkap ada di [`md/latihan-js.md`](md/latihan-js.md).
