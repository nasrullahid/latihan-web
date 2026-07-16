@props(['produk'])
@php
    $stok = $produk['stok'];
@endphp
<div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
    <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">{{ $produk['nama'] }}</h5>

    @if ($stok <= 0)
        <span class="bg-red-500 p-2">Stok Habis</span>
    @else
        <span class="bg-green-500 p-2">Sisa Stok : {{ $produk['stok'] }}</span>
    @endif
    <h3>Rp. {{ number_format($produk['harga'], 0, ',', '.') }}</h3>
    <a href="{{ route('produk.show', $produk['id']) }}" class="px-2 py-1 bg-blue-400">
        Detail Produk
    </a>
</div>
