{{--
    dashboard/index.blade.php — Halaman dashboard admin (read-only).
    Data dikirim dari DashboardController@index:
    - $statistik          : angka ringkasan untuk kartu statistik
    - $stokMenipis        : produk yang habis / menipis (perlu perhatian)
    - $ringkasanKategori  : rekap jumlah & stok per kategori
    - $produk             : daftar lengkap semua produk untuk tabel
--}}
@extends('layouts.app')
@section('judul', 'Dashboard')
@section('konten')

    {{-- Hero: judul halaman --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">
            <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-teal-700">Kelola Tokoku</p>
            <h1 class="text-4xl font-black leading-tight tracking-normal text-slate-950 sm:text-5xl">Dashboard</h1>
            <p class="mt-4 max-w-2xl text-base leading-8 text-slate-600">
                Ringkasan kondisi toko: statistik produk, peringatan stok, dan rekap per kategori dalam satu tempat.
            </p>
        </div>
    </section>

    <div class="mx-auto max-w-7xl space-y-10 px-4 py-10 sm:px-6 lg:px-8">

        {{-- ============ 1) KARTU STATISTIK ============ --}}
        <section>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Total produk --}}
                <div class="rounded-lg border border-slate-200 bg-[#f6fbf9] p-6">
                    <p class="text-sm font-semibold text-slate-500">Total Produk</p>
                    <p class="mt-2 text-4xl font-black text-slate-950">{{ $statistik['total_produk'] }}</p>
                    <p class="mt-1 text-xs font-semibold text-slate-400">{{ $statistik['total_stok'] }} unit stok</p>
                </div>
                {{-- Total nilai persediaan (harga x stok, dijumlahkan) --}}
                <div class="rounded-lg border border-slate-200 bg-[#f8f7ff] p-6">
                    <p class="text-sm font-semibold text-slate-500">Total Nilai Stok</p>
                    <p class="mt-2 text-2xl font-black text-slate-950">Rp {{ number_format($statistik['nilai_stok'], 0, ',', '.') }}</p>
                    <p class="mt-1 text-xs font-semibold text-slate-400">Harga × stok seluruh produk</p>
                </div>
                {{-- Produk unggulan --}}
                <div class="rounded-lg border border-slate-200 bg-[#fff8ed] p-6">
                    <p class="text-sm font-semibold text-slate-500">Produk Unggulan</p>
                    <p class="mt-2 text-4xl font-black text-slate-950">{{ $statistik['total_unggulan'] }}</p>
                    <p class="mt-1 text-xs font-semibold text-slate-400">Ditonjolkan di beranda</p>
                </div>
                {{-- Stok habis --}}
                <div class="rounded-lg border border-slate-200 {{ $statistik['total_habis'] > 0 ? 'bg-rose-50' : 'bg-white' }} p-6">
                    <p class="text-sm font-semibold text-slate-500">Stok Habis</p>
                    <p class="mt-2 text-4xl font-black {{ $statistik['total_habis'] > 0 ? 'text-rose-600' : 'text-slate-950' }}">{{ $statistik['total_habis'] }}</p>
                    <p class="mt-1 text-xs font-semibold text-slate-400">Produk perlu restock</p>
                </div>
            </div>
        </section>

        {{-- ============ 2) PERINGATAN STOK ============ --}}
        <section>
            <div class="mb-4 flex items-end justify-between gap-3">
                <div>
                    <h2 class="text-2xl font-black tracking-normal text-slate-950">Peringatan Stok</h2>
                    <p class="mt-1 text-sm text-slate-500">Produk yang habis (0) atau menipis (≤ 5) dan perlu segera dicek.</p>
                </div>
                <span class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-sm font-bold text-slate-600">{{ count($stokMenipis) }} item</span>
            </div>

            @if (count($stokMenipis) > 0)
                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($stokMenipis as $item)
                        @php $habis = $item['status_stok'] === 'habis'; @endphp
                        <div class="flex items-center gap-4 rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                            <img src="{{ $item['gambar'] ?? '' }}" alt="{{ $item['nama'] }}"
                                class="h-14 w-14 shrink-0 rounded-md object-cover" loading="lazy">
                            <div class="min-w-0 flex-1">
                                <a href="{{ route('produk.show', $item['id']) }}" class="block truncate font-bold text-slate-950 hover:text-teal-700">{{ $item['nama'] }}</a>
                                <p class="truncate text-xs font-semibold text-slate-400">{{ $item['kategori'] }}</p>
                            </div>
                            {{-- Badge status: merah jika habis, kuning jika menipis --}}
                            <span class="shrink-0 rounded-md px-3 py-1 text-xs font-black {{ $habis ? 'bg-rose-600 text-white' : 'bg-amber-400 text-slate-950' }}">
                                {{ $habis ? 'Habis' : 'Sisa ' . $item['stok'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Tidak ada produk yang bermasalah --}}
                <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-bold text-emerald-700">
                    Semua stok aman — tidak ada produk yang habis atau menipis.
                </div>
            @endif
        </section>

        {{-- ============ 3) RINGKASAN PER KATEGORI ============ --}}
        <section>
            <div class="mb-4">
                <h2 class="text-2xl font-black tracking-normal text-slate-950">Ringkasan per Kategori</h2>
                <p class="mt-1 text-sm text-slate-500">Jumlah produk dan total stok pada tiap kategori.</p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($ringkasanKategori as $kategori)
                    <a href="{{ route('kategori.show', $kategori['slug']) }}"
                        class="group rounded-lg border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl">
                        <p class="text-lg font-black text-slate-950 group-hover:text-teal-700">{{ $kategori['nama'] }}</p>
                        <div class="mt-4 flex items-end justify-between">
                            <div>
                                <p class="text-3xl font-black text-slate-950">{{ $kategori['jumlah'] }}</p>
                                <p class="text-xs font-semibold text-slate-400">produk</p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-black text-slate-950">{{ $kategori['total_stok'] }}</p>
                                <p class="text-xs font-semibold text-slate-400">total stok</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ============ 4) TABEL SEMUA PRODUK ============ --}}
        <section>
            <div class="mb-4 flex items-end justify-between gap-3">
                <div>
                    <h2 class="text-2xl font-black tracking-normal text-slate-950">Semua Produk</h2>
                    <p class="mt-1 text-sm text-slate-500">Daftar lengkap produk beserta harga, stok, dan statusnya.</p>
                </div>
                <span class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-sm font-bold text-slate-600">{{ count($produk) }} produk</span>
            </div>

            <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50 text-left text-xs font-black uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-4 py-3">Produk</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3 text-right">Harga</th>
                                <th class="px-4 py-3 text-right">Stok</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($produk as $item)
                                @php
                                    // Tentukan status stok: habis (0), menipis (1..5), atau aman (>5).
                                    if ($item['stok'] === 0) {
                                        $status = ['label' => 'Habis',   'kelas' => 'bg-rose-100 text-rose-700'];
                                    } elseif ($item['stok'] <= 5) {
                                        $status = ['label' => 'Menipis', 'kelas' => 'bg-amber-100 text-amber-700'];
                                    } else {
                                        $status = ['label' => 'Aman',    'kelas' => 'bg-emerald-100 text-emerald-700'];
                                    }
                                @endphp
                                <tr class="transition hover:bg-slate-50">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $item['gambar'] ?? '' }}" alt="{{ $item['nama'] }}"
                                                class="h-10 w-10 shrink-0 rounded-md object-cover" loading="lazy">
                                            <div class="flex items-center gap-2">
                                                <span class="font-bold text-slate-950">{{ $item['nama'] }}</span>
                                                @if ($item['unggulan'])
                                                    <span class="rounded bg-amber-400 px-1.5 py-0.5 text-[10px] font-black text-slate-950">Unggulan</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-slate-600">{{ $item['kategori'] }}</td>
                                    <td class="px-4 py-3 text-right font-bold text-slate-950">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-right font-bold text-slate-950">{{ $item['stok'] }}</td>
                                    <td class="px-4 py-3">
                                        <span class="rounded-md px-2.5 py-1 text-xs font-black {{ $status['kelas'] }}">{{ $status['label'] }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('produk.show', $item['id']) }}"
                                            class="rounded-lg bg-slate-950 px-3 py-1.5 text-xs font-bold text-white transition hover:bg-teal-700">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
@endsection
