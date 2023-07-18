@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-2 text-gray-800">Edit Data Customer</h1>
        <p class="mb-2">Jika ada perubahan, silakan edit data customer</p>
    </div>
</div>

<!-- Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control" required>
                </div>
                {{-- <div class="col-md-12 mb-2">
                    <label for="">Jenis Pelanggan</label>
                    <div class="jenis-pelanggan-container">
                        <div class="radio-wrapper">
                            <input type="radio" name="alamat" id="jenis_pelanggan1" value="Pelanggan 1">
                            <label for="jenis_pelanggan1">Perseorangan</label>
                        </div>
                        <div class="radio-wrapper">
                            <input type="radio" name="alamat" id="jenis_pelanggan 2" value="Pelanggan 2">
                            <label for="jenis_pelanggan 2">Perusahaan</label>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12 mb-2">
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="phone_number" value="{{ $customer->phone_number }}" class="form-control" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $customer->email }}" class="form-control" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="">Alamat</label>
                    <textarea type="text" name="address" class="form-control" required>{{ $customer->address }}</textarea>
                </div>

                <!-- Button simpan -->
                <div class="col-md-12 mb-2">
                    <button type="submit" class="btn btn-primary" name="edit_customer">Simpan Perubahan</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection