@extends('layouts.app')

@section('content')
    <h1>Data Produk Bricket</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Tambah Produksi Bricket</a>
    <p>Total Quantity: {{ $totalQuantity }}</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tanggal Produksi</th>
                <th scope="col">Jumlah Produk (kg)</th>
                <th scope="col">Bahan Baku</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->date }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <ul>
                            @foreach ($product->rawMaterials as $rawMaterial)
                                <li>{{ $rawMaterial->name }} ({{ $rawMaterial->pivot->quantity_raw_materials }} kg)</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>

                        <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produksi bricket ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
