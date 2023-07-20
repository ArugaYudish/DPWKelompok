@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Customer</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="customer_type">Customer Type</label>
                            <select name="customer_type" class="form-control" required>
                                <option value="personal">Personal</option>
                                <option value="company">Company</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
