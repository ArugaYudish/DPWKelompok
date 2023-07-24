@extends('layouts.app')

@section('content')
    <div class="w-100 bg-white p-4 mb-5" style="border-radius:10px;" >
        <h3 class="border-bottom">Input Produksi Bricket</h3>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="date">Tanggal Produksi</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah Produk Bricket (kg)</label>
                <input type="number" name="quantity" class="form-control" required min="1">
            </div>
            <h5 class="border-bottom" >Bahan Baku</h5>
            @foreach ($rawMaterials as $rawMaterial)
                <div class="form-group">
                    <label for="raw_materials[{{ $rawMaterial->id }}]">{{ $rawMaterial->name }}</label>
                    <input type="number" name="raw_materials[{{ $rawMaterial->id }}]" class="form-control" required
                        min="0">
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Simpan Produksi</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection
