@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-2 text-gray-800">New Customer</h1>
        <p class="mb-2">Lengkapi data pelanggan terlebih dahulu</p>
    </div>
</div>

<!-- Form-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="name">Customer Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama customer" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" placeholder="Masukkan nomor telepon" class="form-control" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Masukkan email" class="form-control" required>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" placeholder="Masukkan alamat lengkap" required rows="3"></textarea>
                </div>
                <div class="col-md-12 mb-2">
                    <label for="postalcode">Postalcode</label>
                    <input type="text" name="postalcode" class="form-control" placeholder="Masukkan kode pos" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="customer_type">Customer Type</label>
                    <select name="customer_type" class="form-control" required>
                        <option value="personal">Personal</option>
                        <option value="company">Company</option>
                    </select>
                </div>

                <!-- Button simpan -->
                <div class="col-md-12 mb-2">
                    <button type="submit" class="btn btn-primary" name="add_customer">Save Data</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
