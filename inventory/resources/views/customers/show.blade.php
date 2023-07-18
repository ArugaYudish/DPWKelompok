@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Details</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $customer->name }}</p>
                    <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
                    <p><strong>Email:</strong> {{ $customer->email }}</p>
                    <p><strong>Address:</strong> {{ $customer->address }}</p>

                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                    </form>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection