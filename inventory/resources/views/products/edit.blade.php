@extends('layouts.app')

@section('content')
    <h1>Edit Produksi Bricket - ID: {{ $product->id }}</h1>
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Tanggal Produksi</label>
            <input type="date" name="date" class="form-control" value="{{ $product->date }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Jumlah Produk Bricket (kg)</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required min="1">
        </div>
        <h3>Bahan Baku</h3>
        @foreach ($rawMaterials as $rawMaterial)
            <div class="form-group">
                <label for="raw_materials[{{ $rawMaterial->id }}]">{{ $rawMaterial->name }}</label>
                @php
                    $quantity_raw_materials = $product->rawMaterials->where('id', $rawMaterial->id)->first()->pivot->quantity_raw_materials ?? 0;
                @endphp
                <input type="number" name="raw_materials[{{ $rawMaterial->id }}]" class="form-control" value="{{ $quantity_raw_materials }}" required min="0">
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produksi bricket ini?')">Hapus Produksi</button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
@endsection