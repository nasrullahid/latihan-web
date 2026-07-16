{{--
    layouts/app.blade.php
    Kerangka (layout) utama halaman. View lain memakai @extends('layouts.app')
    lalu mengisi bagian @yield melalui @section. Jadi navbar, footer, dan
    struktur HTML tidak perlu ditulis ulang di setiap halaman.
--}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul tab browser diisi dari @section('judul') di masing-masing halaman --}}
    <title>@yield('judul')</title>

    @fonts {{-- Memuat font bawaan Laravel --}}
    <script src="https://cdn.tailwindcss.com"></script> {{-- Tailwind CSS via CDN --}}

    {{-- Styles / Scripts --}}
    {{-- Muat aset hasil build Vite hanya jika file build/hot tersedia --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-[#f7f8fb] text-slate-950 antialiased">
    @include('partials.navbar') {{-- Navigasi atas (dipakai di semua halaman) --}}
    <main class="w-full flex-1">
        @yield('konten') {{-- Isi utama tiap halaman disuntikkan di sini --}}
    </main>
    @include('partials.footer') {{-- Footer bawah (dipakai di semua halaman) --}}
</body>

</html>
