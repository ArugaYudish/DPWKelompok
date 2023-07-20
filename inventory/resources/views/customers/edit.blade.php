@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Customer</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $customer->phone_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" required>{{ $customer->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="customer_type">Customer Type</label>
                            <select name="customer_type" class="form-control" required>
                                <option value="personal" {{ $customer->customer_type === 'personal' ? 'selected' : '' }}>Personal</option>
                                <option value="company" {{ $customer->customer_type === 'company' ? 'selected' : '' }}>Company</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Customer</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
