@extends('layouts.app')

@section('content')
    <h1>Detail Produk Bricket - ID: {{ $product->id }}</h1>
    <p>Tanggal Produksi: {{ $product->date }}</p>
    <p>Jumlah Produk (kg): {{ $product->quantity }}</p>
    <h3>Bahan Baku</h3>
    <ul>
        @foreach ($product->rawMaterials as $rawMaterial)
            <li>{{ $rawMaterial->name }} ({{ $rawMaterial->pivot->quantity_raw_materials }} kg)</li>
        @endforeach
    </ul>
    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>

    <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produksi bricket ini?')">Hapus</button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
