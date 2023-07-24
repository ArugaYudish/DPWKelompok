@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Detail Transaction</h1>

        <!-- Button generate & send invoice-->
        <a href="{{ route('transactions.invoice', ['transaction' => $transaction->id]) }}" target="_blank" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i>  Generate Invoice</a>

        <form action="{{ route('transactions.sendInvoiceEmail', ['transaction' => $transaction->id]) }}" method="post" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Send Invoice (Email)</button>
        </form>
    </div>
    
    <!-- Content Row -->
    <div class="row mb-4">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4 h-100">
                <!-- Card Header -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transaction</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="d-flex">
                        <table class="table-transaction">
                            <tbody>
                                <tr>
                                    <th scope="row">ID</th>
                                    <td>{{ $transaction->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Customer</th>
                                    <td>{{ $transaction->customer->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Issue Date</th>
                                    <td>{{ $transaction->issue_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Quantity Product</th>
                                    <td>{{ $transaction->quantity_product }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Amount (IDR)</th>
                                    <td>{{ $transaction->total_amount }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ $transaction->status }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Due Date</th>
                                    <td>{{ $transaction->due_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment Method</th>
                                    <td>{{ $transaction->payment_method }}</td>
                                </tr>
                            </tbody>
                        </table>
                    
                    </div>
                    <div class="mt-3 ml-2">
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
