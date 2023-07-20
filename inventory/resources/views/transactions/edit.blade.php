@extends('layouts.app')

@section('content')
    <h1>Edit Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_id" class="form-label">Pelanggan</label>
            <select name="customer_id" id="customer_id" class="form-control">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $transaction->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="issue_date" class="form-label">Tanggal Penerbitan</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ $transaction->issue_date }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity_product" class="form-label">Jumlah Produk</label>
            <input type="number" name="quantity_product" id="quantity_product" class="form-control" value="{{ $transaction->quantity_product }}" required>
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount (Rupiah)</label>
            <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ $transaction->total_amount }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="open" {{ $transaction->status === 'open' ? 'selected' : '' }}>Open</option>
                <option value="close" {{ $transaction->status === 'close' ? 'selected' : '' }}>Close</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $transaction->due_date }}" required>
        </div>
        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="kredit" {{ $transaction->payment_method === 'kredit' ? 'selected' : '' }}>Kredit</option>
                <option value="debit" {{ $transaction->payment_method === 'debit' ? 'selected' : '' }}>Debit</option>
                <option value="tunai" {{ $transaction->payment_method === 'tunai' ? 'selected' : '' }}>Tunai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
