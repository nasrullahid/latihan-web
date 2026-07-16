<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col justify-center items-center">
    @include('partials.navbar')
    <main class="bg-white p-8 rounded-2xl shadow-lg ">
        @yield('konten')
    </main>
    @include('partials.footer')
</body>

</html>
