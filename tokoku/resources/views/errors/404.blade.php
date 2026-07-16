{{--
    errors/404.blade.php — Halaman error "Not Found".
    Otomatis ditampilkan Laravel saat terjadi abort(404), misalnya
    ketika produk yang diminta tidak ditemukan (lihat ProdukController@show).
--}}
@extends('layouts.app')
@section('judul', 'Halaman Tidak Ditemukan')
@section('konten')
    {{-- Pesan 404 di tengah layar + tombol kembali ke katalog produk --}}
    <section class="mx-auto flex min-h-[65vh] max-w-4xl flex-col items-center justify-center px-4 py-16 text-center sm:px-6 lg:px-8">
        <p class="text-sm font-black uppercase tracking-[0.18em] text-rose-700">404</p>
        <h1 class="mt-3 text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">
            Halaman tidak ditemukan.
        </h1>
        <p class="mt-5 max-w-xl text-base leading-8 text-slate-600">
            Produk atau halaman yang kamu buka belum tersedia di Tokoku.
        </p>
        <a href="{{ route('produk.index') }}"
            class="mt-8 rounded-lg bg-slate-950 px-6 py-3 text-sm font-black text-white transition hover:bg-slate-800">
            Kembali ke Produk
        </a>
    </section>
@endsection
