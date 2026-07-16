@extends('layouts.app')
@section('judul', 'Beranda')
@section('konten')
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-teal-700">Produk Unggulan</p>
            <h1 class="max-w-3xl text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">
                Selamat datang di Tokoku.
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">
                Ini pilihan produk unggulan yang disaring langsung dari controller.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($produkUnggulan as $p)
                <x-kartu-produk :produk="$p" />
            @endforeach
        </div>
    </section>
@endsection
