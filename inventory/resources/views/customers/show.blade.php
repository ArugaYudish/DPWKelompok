@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Detail Data Customer</h1>

<!-- Content Row -->
<div class="row mb-4">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4 h-100">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            {{-- <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.previousElementSibling.submit();">Delete</a> --}}
                        </form>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold text-gray-800">ID Customer</label><br>
                        <label class="font-weight-bold text-gray-800">Customer Name</label><br>
                        <label class="font-weight-bold text-gray-800">Phone Number</label><br>
                        <label class="font-weight-bold text-gray-800">Email</label><br>
                        <label class="font-weight-bold text-gray-800">Address</label><br>
                        <label class="font-weight-bold text-gray-800">Postal Code</label><br>
                        <label class="font-weight-bold text-gray-800">Customer Type</label><br>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="font-weight-bold text-gray-800">:</label><br>
                        <label class="font-weight-bold text-gray-800">:</label><br>
                        <label class="font-weight-bold text-gray-800">:</label><br>
                        <label class="font-weight-bold text-gray-800">:</label><br>
                        <label class="font-weight-bold text-gray-800">:</label><br>
                        <label class="font-weight-bold text-gray-800">:</label><br>
                        <label class="font-weight-bold text-gray-800">:</label><br>
                    </div>
                    <div class="col-md-8 mb-2">
                        <label class="">{{ $customer->id }}</label><br>
                        <label class="">{{ $customer->name }}</label><br>
                        <label class="">{{ $customer->phone_number }}</label><br>
                        <label class="">{{ $customer->email }}</label><br>
                        <label class="">{{ $customer->address }}</label><br>
                        <label class="">{{ $customer->postalcode }}</label><br>
                        <label class="">{{ $customer->customer_type }}</label><br>
                    </div>
                </div>
                <div class="mt-5 ml-2">
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Illustration -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4 h-100">
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="{{ asset('style/img/undraw_profile_details.svg') }}" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Details</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $customer->name }}</p>
                    <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
                    <p><strong>Email:</strong> {{ $customer->email }}</p>
                    <p><strong>Address:</strong> {{ $customer->address }}</p>
                    <p><strong>Postalcode:</strong> {{ $customer->postalcode }}</p>
                    <p><strong>Customer Type:</strong> {{ $customer->customer_type }}</p> 

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
</div> --}}
@endsection
