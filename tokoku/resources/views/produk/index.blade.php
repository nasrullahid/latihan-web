{{--
    produk/index.blade.php — Halaman katalog (daftar semua produk).
    Data $produk dikirim dari ProdukController@index.
--}}
@extends('layouts.app')
@section('judul', 'Produk')
@section('konten')
    @php
        // Hitung angka ringkasan untuk ditampilkan di bagian statistik.
        // collect() mengubah array biasa jadi Collection agar bisa pakai helper Laravel.
        $totalProduk = count($produk);                                        // jumlah semua produk
        $produkUnggulan = collect($produk)->where('unggulan', true)->count(); // jumlah produk unggulan
        $stokTersedia = collect($produk)->where('stok', '>', 0)->count();     // jumlah produk yang stoknya ada
        $kategori = collect($produk)->pluck('kategori')->unique()->values();  // daftar kategori unik
    @endphp

    {{-- Bagian hero: judul katalog (kiri) + kotak statistik ringkas (kanan) --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-10 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:px-8 lg:py-14">
            <div class="flex flex-col justify-center">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-teal-700">Katalog Tokoku</p>
                <h1 class="max-w-3xl text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">
                    Pilihan produk harian dengan tampilan yang mudah dipilih.
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">
                    Temukan elektronik, fashion, dan makanan favorit dalam katalog ringkas yang menonjolkan harga,
                    stok, dan produk unggulan.
                </p>
                <div class="mt-7 flex flex-wrap gap-3">
                    @foreach ($kategori as $item)
                        <span class="rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-bold text-slate-700">
                            {{ $item }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="grid gap-3 sm:grid-cols-3 lg:self-end">
                <div class="rounded-lg border border-slate-200 bg-[#f6fbf9] p-5">
                    <p class="text-3xl font-black text-slate-950">{{ $totalProduk }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-500">Produk</p>
                </div>
                <div class="rounded-lg border border-slate-200 bg-[#fff8ed] p-5">
                    <p class="text-3xl font-black text-slate-950">{{ $produkUnggulan }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-500">Unggulan</p>
                </div>
                <div class="rounded-lg border border-slate-200 bg-[#f8f7ff] p-5">
                    <p class="text-3xl font-black text-slate-950">{{ $stokTersedia }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-500">Ready</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-normal text-slate-950">Semua Produk</h2>
                <p class="mt-1 text-sm text-slate-500">Klik detail untuk melihat informasi produk lebih lengkap.</p>
            </div>
            <p class="text-sm font-semibold text-slate-500">{{ $totalProduk }} item tersedia di katalog</p>
        </div>

        {{-- Grid semua produk: render tiap produk memakai komponen kartu-produk --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($produk as $item)
                <x-kartu-produk :produk="$item" />
            @endforeach
        </div>
    </section>
@endsection
