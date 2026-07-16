<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('judul')</title>

    @fonts
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-[#f7f8fb] text-slate-950 antialiased">
    @include('partials.navbar')
    <main class="w-full flex-1">
        @yield('konten')
    </main>
    @include('partials.footer')
</body>

</html>
