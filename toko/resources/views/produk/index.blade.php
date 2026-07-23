<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Produk</title>
</head>

<body>
    <h1>Data Produk</h1>
    <a href="/produk/create">+ Tambah Produk</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach ($produk as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <a href="/produk/{{ $item->id }}">Show</a>
                    <a href="/produk/{{ $item->id }}/edit">Edit</a>
                    <form action="/produk/{{ $item->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</body>

</html>
