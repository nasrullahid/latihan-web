<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
</head>

<body>
    <h1>{{ $produk->nama_produk }}</h1>
    <p>Harga: {{ $produk->harga }}</p>
    <p>Stok: {{ $produk->stok }}</p>

    <a href="/produk/{{ $produk->id }}/edit">Edit</a>
    <a href="/produk">Kembali</a>
</body>

</html>
