@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 text-gray-800">Data Customers</h1>
            <p class="mb-2">Daftar pelanggan yang mengimpor bricket dari pabrik</p>
        </div>
        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Customer</span>
        </a>
    </div>

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Data Customers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Postalcode</th>
                            <th>Customer Type</th> 
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Postalcode</th>
                            <th>Customer Type</th> 
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->postalcode }}</td>
                            <td>{{ $customer->customer_type }}</td> 
                            <td class="action-column">
                                <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">
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
