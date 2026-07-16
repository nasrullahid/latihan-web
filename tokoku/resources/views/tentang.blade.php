@extends('layouts.app')
@section('judul', 'Tentang')
@section('konten')
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:px-8 lg:py-16">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-teal-700">Tentang Tokoku</p>
                <h1 class="max-w-3xl text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">
                    Toko sederhana untuk belajar menampilkan produk dengan rapi.
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">
                    Tokoku adalah project latihan Laravel yang menampilkan katalog produk, kategori, detail produk,
                    stok, dan produk unggulan menggunakan Blade, component, route, dan controller.
                </p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-[#f6fbf9] p-6">
                <p class="text-sm font-black uppercase tracking-[0.18em] text-slate-500">Info Toko</p>
                <dl class="mt-5 space-y-4">
                    <div>
                        <dt class="text-sm font-bold text-slate-500">Nama</dt>
                        <dd class="mt-1 text-xl font-black text-slate-950">Tokoku</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-bold text-slate-500">Alamat</dt>
                        <dd class="mt-1 text-xl font-black text-slate-950">Jl. Jalan Tidak Jajan</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-bold text-slate-500">Dibuat oleh</dt>
                        <dd class="mt-1 text-xl font-black text-slate-950">Nasrullah</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-3">
            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-teal-700">01</p>
                <h2 class="mt-4 text-xl font-black text-slate-950">Data Produk</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Produk disimpan di class data sehingga mudah dipakai ulang oleh controller dan view.
                </p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-amber-600">02</p>
                <h2 class="mt-4 text-xl font-black text-slate-950">Blade Component</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Kartu produk dibuat sebagai component agar tampilan katalog lebih konsisten.
                </p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-rose-600">03</p>
                <h2 class="mt-4 text-xl font-black text-slate-950">Kategori Otomatis</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Navbar membaca daftar kategori dari data, jadi menu mengikuti isi produk.
                </p>
            </div>
        </div>

        <div class="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-slate-950">Lihat katalog Tokoku</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Buka halaman produk untuk melihat semua item, stok, harga, dan detail produk.
                    </p>
                </div>
                <a href="{{ route('produk.index') }}"
                    class="rounded-lg bg-slate-950 px-6 py-3 text-center text-sm font-black text-white transition hover:bg-slate-800">
                    Buka Produk
                </a>
            </div>
        </div>
    </section>
@endsection
