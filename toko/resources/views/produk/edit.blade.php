<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Produk</title>
</head>

<body>
    <h1>Edit Produk</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/produk/{{ $produk->id }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Nama Produk</label><br>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
        </p>
        <p>
            <label>Harga</label><br>
            <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}">
        </p>
        <p>
            <label>Stok</label><br>
            <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}">
        </p>
        <button type="submit">Update</button>
        <a href="/produk">Batal</a>
    </form>
</body>

</html>
