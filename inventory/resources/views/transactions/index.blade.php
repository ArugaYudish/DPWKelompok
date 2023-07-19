@extends('layouts.app')

@section('content')
    <h1>Daftar Transaksi</h1>

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Tanggal Penerbitan</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Jatuh Tempo</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->customer->name }}</td>
                    <td>{{ $transaction->issue_date }}</td>
                    <td>{{ $transaction->total_amount }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->due_date }}</td>
                    <td>{{ $transaction->payment_method }}</td>
                    <td>
                        <a href="{{ route('transactions.show', ['transaction' => $transaction->id]) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('transactions.edit', ['transaction' => $transaction->id]) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('transactions.destroy', ['transaction' => $transaction->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
