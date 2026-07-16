@extends('layouts.app')
@yield('title', 'Produk Detail')
@section('konten')
    <div class="">
        <h2>{{ $produk['nama'] }}</h2>
        <h3>Rp. {{ number_format($produk['harga'], 0, ',', '.') }}</h3>
        <p>{{ $produk['deskripsi'] }}</p>
    </div>
@endsection
