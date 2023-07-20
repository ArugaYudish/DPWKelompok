<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('transactions.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:open,close',
            'quantity_product' => 'required|integer|min:1',
            'due_date' => 'required|date',
            'payment_method' => 'required|in:kredit,debit,tunai',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function edit(Transaction $transaction)
    {
        $customers = Customer::all();
        return view('transactions.edit', compact('transaction', 'customers'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:open,close',
            'quantity_product' => 'required|integer|min:1',
            'due_date' => 'required|date',
            'payment_method' => 'required|in:kredit,debit,tunai',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function generateInvoicePdf(Transaction $transaction)
    {
        $pdf = PDF::loadView('transactions.invoice', compact('transaction'));
        return $pdf->stream('invoice_' . $transaction->id . '.pdf');
    }

    public function sendInvoiceEmail(Transaction $transaction)
    {
        $pdf = PDF::loadView('transactions.invoice', compact('transaction'));
        $filePath = storage_path('app/public/invoices/invoice_' . $transaction->id . '.pdf');
        $pdf->save($filePath);

        // Kirim email dengan invoice ke pelanggan
        Mail::to($transaction->customer->email)->send(new InvoiceEmail($transaction, $filePath));

        return redirect()->route('transactions.index')->with('success', 'Invoice berhasil dikirim melalui email.');
    }
}

#test
