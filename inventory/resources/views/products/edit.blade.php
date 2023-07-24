@extends('layouts.app')

@section('content')
    <div class="w-100 bg-white p-4 mb-5" style="border-radius:10px;">
        <h3 class="border-bottom">Edit Produksi </h3>
        <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product">Bricket - ID</label>
                <input type="product" name="date" class="form-control" value="{{ $product->id }}" disabled>
            </div>
            <div class="form-group">
                <label for="date">Tanggal Produksi</label>
                <input type="date" name="date" class="form-control" value="{{ $product->date }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah Produk Bricket (kg)</label>
                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required
                    min="1">
            </div>
            <h5 class="border-bottom" >Bahan Baku</h5>
            @foreach ($rawMaterials as $rawMaterial)
                <div class="form-group">
                    <label for="raw_materials[{{ $rawMaterial->id }}]">{{ $rawMaterial->name }}</label>
                    @php
                        $quantity_raw_materials = $product->rawMaterials->where('id', $rawMaterial->id)->first()->pivot->quantity_raw_materials ?? 0;
                    @endphp
                    <input type="number" name="raw_materials[{{ $rawMaterial->id }}]" class="form-control"
                        value="{{ $quantity_raw_materials }}" required min="0">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </form>


    </div>
@endsection
