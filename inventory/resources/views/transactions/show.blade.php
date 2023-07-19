@extends('layouts.app')

@section('content')
    <h1>Detail Transaksi</h1>

    <a href="{{ route('transactions.invoice', ['transaction' => $transaction->id]) }}" class="btn btn-primary">Generate Invoice PDF</a>
    
    <form action="{{ route('transactions.sendInvoiceEmail', ['transaction' => $transaction->id]) }}" method="post" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success">Kirim Invoice ke Email</button>
    </form>
    
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{ $transaction->id }}</td>
            </tr>
            <tr>
                <th scope="row">Pelanggan</th>
                <td>{{ $transaction->customer->name }}</td>
            </tr>
            <tr>
                <th scope="row">Tanggal Penerbitan</th>
                <td>{{ $transaction->issue_date }}</td>
            </tr>
            <tr>
                <th scope="row">Total Amount (Rupiah)</th>
                <td>{{ $transaction->total_amount }}</td>
            </tr>
            <tr>
                <th scope="row">Status</th>
                <td>{{ $transaction->status }}</td>
            </tr>
            <tr>
                <th scope="row">Tanggal Jatuh Tempo</th>
                <td>{{ $transaction->due_date }}</td>
            </tr>
            <tr>
                <th scope="row">Metode Pembayaran</th>
                <td>{{ $transaction->payment_method }}</td>
            </tr>
        </tbody>
    </table>
@endsection
