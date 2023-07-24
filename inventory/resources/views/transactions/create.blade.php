@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 text-gray-800">Entri Transactions</h1>
            <p class="mb-2">Lengkapi form transaksi terlebih dahulu</p>
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

    <!-- Form-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="customer_id" class="form-label">Customer</label>
                        <select name="customer_id" id="customer_id" class="form-control">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="issue_date" class="form-label">Issue Date</label>
                        <input type="date" name="issue_date" id="issue_date" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="quantity_product" class="form-label">Quantity Product</label>
                        <input type="number" name="quantity_product" id="quantity_product" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="total_amount" class="form-label">Total Amount (IDR)</label>
                        <input type="number" name="total_amount" id="total_amount" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="kredit">Kredit</option>
                            <option value="debit">Debit</option>
                            <option value="tunai">Tunai</option>
                        </select>
                    </div>
                    <!-- Button simpan -->
                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary" name="add_transaction">Save Data</button>
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
