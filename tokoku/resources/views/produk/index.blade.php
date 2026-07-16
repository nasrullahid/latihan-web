@extends('layouts.app')
@section('title', 'Produk')
@section('konten')
    <div class="grid grid-cols-3 gap-4">
        @foreach ($produk as $item)
            <x-kartu-produk :produk="$item" />
        @endforeach
    </div>
@endsection
