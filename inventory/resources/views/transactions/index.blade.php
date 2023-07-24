@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 text-gray-800">List Transactions</h1>
            <p class="mb-2">Daftar transaksi impor bricket dari pabrik</p>
        </div>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Transaction</span>
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Data Transactions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Quantity Product</th>
                            <th>Total Amount</th>
                            <th>Status</th> 
                            <th>Due Date</th>
                            <th>Payment Method</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</th>
                            <td>{{ $transaction->customer->name }}</td>
                            <td>{{ $transaction->issue_date }}</td>
                            <td>{{ $transaction->quantity_product }}</td>
                            <td>{{ $transaction->total_amount }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>{{ $transaction->due_date }}</td>
                            <td>{{ $transaction->payment_method }}</td>
                            <td class="action-column">
                                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?')">
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
