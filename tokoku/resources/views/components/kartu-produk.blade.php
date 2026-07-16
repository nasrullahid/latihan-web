{{--
    components/kartu-produk.blade.php
    Komponen "kartu produk" yang dipakai berulang di banyak halaman
    (beranda, katalog, kategori, produk terkait).
    Cara pakai: <x-kartu-produk :produk="$p" />

    @props(['produk']) mendeklarasikan bahwa komponen ini menerima
    satu data bernama $produk (array berisi info satu produk).
--}}
@props(['produk'])
@php
    // Ambil stok, lalu tentukan apakah produk masih tersedia (stok > 0).
    // $tersedia dipakai untuk mengatur tombol & badge agar berbeda saat stok habis.
    $stok = $produk['stok'];
    $tersedia = $stok > 0;
@endphp
<article
    class="group overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl"
    style="--accent: {{ $produk['aksen'] ?? '#0f766e' }}"> {{-- warna aksen per produk --}}
    {{-- Jika stok ada, gambar bisa diklik menuju halaman detail.
         Jika habis, dibungkus <div> biasa (tidak bisa diklik). --}}
    @if ($tersedia)
        <a href="{{ route('produk.show', $produk['id']) }}" class="block">
    @else
        <div class="block">
    @endif
        <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
            <img src="{{ $produk['gambar'] ?? '' }}" alt="{{ $produk['nama'] }}"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-slate-950/55 to-transparent"></div>
            {{-- Badge kategori, dan badge "Unggulan" bila produk ditandai unggulan --}}
            <div class="absolute left-3 top-3 flex flex-wrap gap-2">
                <span class="rounded-md bg-white/95 px-3 py-1 text-xs font-bold text-slate-800 shadow-sm">
                    {{ $produk['kategori'] }}
                </span>
                @if ($produk['unggulan'])
                    <span class="rounded-md bg-amber-400 px-3 py-1 text-xs font-black text-slate-950 shadow-sm">
                        Unggulan
                    </span>
                @endif
            </div>
            {{-- Badge status stok: hijau jika ada, merah jika habis --}}
            <span
                class="absolute bottom-3 left-3 rounded-md px-3 py-1 text-xs font-bold text-white shadow-sm {{ $tersedia ? 'bg-emerald-600' : 'bg-rose-600' }}">
                {{ $tersedia ? 'Stok ' . $produk['stok'] : 'Stok Habis' }}
            </span>
        </div>
    @if ($tersedia)
        </a>
    @else
        </div>
    @endif

    {{-- Bagian isi kartu: nama, deskripsi singkat, harga, dan tombol --}}
    <div class="space-y-4 p-5">
        <div class="space-y-2">
            <h3 class="line-clamp-2 min-h-14 text-xl font-black leading-7 tracking-normal text-slate-950">
                {{ $produk['nama'] }}
            </h3>
            <p class="line-clamp-2 min-h-11 text-sm leading-6 text-slate-500">{{ $produk['deskripsi'] }}</p>
        </div>

        <div class="flex items-end justify-between gap-4 border-t border-slate-100 pt-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Harga</p>
                {{-- number_format(harga, 0, ',', '.') -> format ribuan gaya Indonesia, mis. 8.750.000 --}}
                <p class="text-lg font-black text-slate-950">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</p>
            </div>
            {{-- Tombol "Lihat Detail" aktif bila stok ada; jika habis dibuat non-aktif --}}
            @if ($tersedia)
                <a href="{{ route('produk.show', $produk['id']) }}"
                    class="rounded-lg bg-slate-950 px-4 py-2 text-sm font-bold text-white transition hover:bg-[color:var(--accent)]">
                    Lihat Detail
                </a>
            @else
                <span
                    class="cursor-not-allowed rounded-lg bg-slate-200 px-4 py-2 text-sm font-bold text-slate-500">
                    Lihat Detail
                </span>
            @endif
        </div>
    </div>
</article>
