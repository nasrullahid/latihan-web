{{--
    produk/show.blade.php — Halaman detail satu produk.
    Data $produk & $produkTerkait dikirim dari ProdukController@show.
    Judul tab otomatis mengikuti nama produk.
--}}
@extends('layouts.app')
@section('judul', $produk['nama'])
@section('konten')
    @php
        // Status ketersediaan produk, dipakai untuk mengubah label tombol & warna status
        $tersedia = $produk['stok'] > 0;
    @endphp

    {{-- Bagian utama: gambar produk (kiri) + info detail produk (kanan) --}}
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        {{-- Tombol kembali ke daftar produk --}}
        <a href="{{ route('produk.index') }}"
            class="mb-6 inline-flex rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-slate-300 hover:text-slate-950">
            Kembali ke Produk
        </a>

        <div class="grid gap-8 lg:grid-cols-[1.05fr_.95fr]">
            <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
                <div class="relative aspect-[4/3] bg-slate-100">
                    <img src="{{ $produk['gambar'] ?? '' }}" alt="{{ $produk['nama'] }}"
                        class="h-full w-full object-cover">
                    <div class="absolute left-4 top-4 flex flex-wrap gap-2">
                        <span class="rounded-md bg-white/95 px-3 py-1 text-sm font-bold text-slate-800 shadow-sm">
                            {{ $produk['kategori'] }}
                        </span>
                        @if ($produk['unggulan'])
                            <span class="rounded-md bg-amber-400 px-3 py-1 text-sm font-black text-slate-950 shadow-sm">
                                Produk unggulan
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-center">
                <div class="mb-4 h-1.5 w-20 rounded-full" style="background-color: {{ $produk['aksen'] ?? '#0f766e' }}"></div>
                <h1 class="text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">
                    {{ $produk['nama'] }}
                </h1>
                <p class="mt-5 text-lg leading-8 text-slate-600">{{ $produk['deskripsi'] }}</p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Harga</p>
                        <p class="mt-2 text-3xl font-black text-slate-950">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status</p>
                        <p class="mt-2 text-2xl font-black {{ $tersedia ? 'text-emerald-700' : 'text-rose-700' }}">
                            {{ $tersedia ? 'Stok ' . $produk['stok'] : 'Stok Habis' }}
                        </p>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('produk.index') }}"
                        class="rounded-lg bg-slate-950 px-6 py-3 text-center text-sm font-black text-white transition hover:bg-slate-800">
                        Lihat Produk Lain
                    </a>
                    <button type="button"
                        class="rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-black text-slate-800 transition hover:border-slate-400">
                        {{ $tersedia ? 'Tambah ke Keranjang' : 'Kabari Saat Tersedia' }}
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian produk terkait: produk lain dari kategori yang sama --}}
    <section class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-black tracking-normal text-slate-950">Produk Terkait</h2>
            <p class="mt-1 text-sm text-slate-500">Produk lain dari kategori {{ $produk['kategori'] }}.</p>
        </div>

        {{-- @forelse = @foreach + penanganan saat data kosong (@empty) --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($produkTerkait as $p)
                <x-kartu-produk :produk="$p" />
            @empty
                {{-- Ditampilkan bila tidak ada produk terkait --}}
                <div class="rounded-lg border border-dashed border-slate-300 bg-white p-8 text-center text-slate-500">
                    Belum ada produk terkait.
                </div>
            @endforelse
        </div>
    </section>
@endsection
