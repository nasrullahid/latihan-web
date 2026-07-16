{{--
    partials/navbar.blade.php
    Navigasi atas. Menu kategori dibuat otomatis dari data produk,
    jadi bila ada kategori baru, menu ikut bertambah tanpa edit manual.
--}}
@php
    // Ambil daftar kategori unik untuk dijadikan menu navbar
    $kategoriNavbar = \App\Data\ProdukData::daftarKategori();
@endphp

<nav class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/90 backdrop-blur">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        {{-- Logo / nama toko, klik untuk kembali ke beranda --}}
        <a href="{{ route('beranda') }}" class="flex items-center gap-3">
            <span class="grid h-10 w-10 place-items-center rounded-lg bg-slate-950 text-sm font-black text-white">TK</span>
            <span class="text-xl font-black tracking-tight text-slate-950">Tokoku</span>
        </a>
        {{--
            Daftar menu. Pola class "request()->routeIs(...) ? '...aktif...' : ''"
            dipakai untuk menyorot (highlight) menu yang sedang dibuka.
        --}}
        <ul class="flex flex-wrap items-center gap-2 text-sm font-semibold text-slate-600">
            <li>
                <a href="{{ route('beranda') }}"
                    class="block rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('beranda') ? 'bg-slate-950 text-white hover:bg-slate-950 hover:text-white' : '' }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('tentang') }}"
                    class="block rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('tentang') ? 'bg-slate-950 text-white hover:bg-slate-950 hover:text-white' : '' }}">Tentang</a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}"
                    class="block rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('produk.*') ? 'bg-slate-950 text-white hover:bg-slate-950 hover:text-white' : '' }}">Produk</a>
            </li>
            {{-- Menu kategori dinamis: satu <li> untuk setiap kategori produk --}}
            @foreach ($kategoriNavbar as $kategori)
                <li>
                    <a href="{{ route('kategori.show', $kategori['slug']) }}"
                        class="block rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-950 {{ request()->routeIs('kategori.show') && request()->route('slug') === $kategori['slug'] ? 'bg-slate-950 text-white hover:bg-slate-950 hover:text-white' : '' }}">
                        {{ $kategori['nama'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
