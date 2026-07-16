{{--
    kategori/show.blade.php — Menampilkan produk untuk satu kategori.
    Data $produk, $slug, dan $namaKategori dikirim dari KategoriController@show.
--}}
@extends('layouts.app')
@section('judul', 'Kategori ' . $namaKategori)
@section('konten')
    {{-- Judul kategori yang sedang dibuka --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-teal-700">Kategori</p>
            <h1 class="text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">
                {{ $namaKategori }}
            </h1>
            <p class="mt-4 max-w-2xl text-base leading-8 text-slate-600">
                Produk yang termasuk dalam kategori {{ $namaKategori }}.
            </p>
        </div>
    </section>

    {{-- Grid produk kategori. @forelse menampilkan pesan bila kategori kosong (@empty) --}}
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($produk as $p)
                <x-kartu-produk :produk="$p" />
            @empty
                {{-- Ditampilkan bila belum ada produk di kategori ini --}}
                <div class="rounded-lg border border-dashed border-slate-300 bg-white p-10 text-center sm:col-span-2 lg:col-span-3 xl:col-span-4">
                    <h2 class="text-2xl font-black text-slate-950">Belum ada produk di kategori ini</h2>
                    <p class="mt-2 text-sm text-slate-500">Coba pilih kategori lain dari navbar.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
