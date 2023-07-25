@extends('layouts.app')

@section('content')
    <div class="row w-100">
        <h1 class="col-md-9 col-sm-6 h3 mb-2 text-gray-800">Data Produk Bricket</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-2 float-right col-sm-6 col-md-3">Tambah Produksi
            Bricket</a>
    </div>
    <p>Total Quantity: {{ $totalQuantity }}</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk Bricket</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            <li>{{ $rawMaterial->name }} ({{ $rawMaterial->pivot->quantity_raw_materials }}
                                                kg)</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="d-flex justify-content-around">

                                    <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                        class="btn btn-info">
                                        <i class="fas fa-eye"></i>

                                    </a>
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                        class="btn btn-success">
                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <form method="POST"
                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produksi bricket ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
