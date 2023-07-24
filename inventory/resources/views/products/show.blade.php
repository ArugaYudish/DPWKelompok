@extends('layouts.app')

@section('content')
    <div class="card w-100" style="">
        <div class="card-body">
            <h3 class="card-title font-weight-bold border-bottom">Detail Produk </h3>
            <h6 class="card-subtitle my-2 text-body-secondary">Bricket - ID: {{ $product->id }}</h6>
            <h6 class="card-subtitle my-2 text-body-secondary">Tanggal Produksi: {{ $product->date }}</h6>
            <h6 class="card-subtitle my-2 text-body-secondary">Jumlah Produk (kg): {{ $product->quantity }}</h6>
            <p class="card-text">
            <h4 class="card-title font-weight-bold"> Bahan Baku</h4>
            <ul>
                @foreach ($product->rawMaterials as $rawMaterial)
                    <li>{{ $rawMaterial->name }} ({{ $rawMaterial->pivot->quantity_raw_materials }} kg)</li>
                @endforeach
            </ul>
            </p>
            <a href="{{ route('products.index') }}" class="card-link btn btn-primary">Back</a>
        </div>
    </div>
   
@endsection
