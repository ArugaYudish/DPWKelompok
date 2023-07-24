@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 text-gray-800">Edit Data Customer</h1>
            <p class="mb-2">Jika ada perubahan, silakan edit data customer</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="name">Customer Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" value="{{ $customer->phone_number }}" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $customer->email }}" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" required rows="3">{{ $customer->address }}</textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="postalcode">Postalcode</label>
                        <input type="text" name="postalcode" class="form-control" value="{{ $customer->postalcode }}" required>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="customer_type">Customer Type</label>
                        <select name="customer_type" class="form-control" required>
                            <option value="personal" {{ $customer->customer_type === 'personal' ? 'selected' : '' }}>Personal</option>
                            <option value="company" {{ $customer->customer_type === 'company' ? 'selected' : '' }}>Company</option>
                        </select>
                    </div>

                    <!-- Button simpan -->
                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary" name="edit_customer">Update Data</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
