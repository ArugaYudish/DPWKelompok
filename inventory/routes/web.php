<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('auth/login');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    // Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// Rute untuk autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
    Route::get('/transactions/{transaction}/invoice', [TransactionController::class, 'generateInvoicePdf'])->name('transactions.invoice');
    Route::post('/transactions/{transaction}/send-invoice-email', [TransactionController::class, 'sendInvoiceEmail'])->name('transactions.sendInvoiceEmail');
});

Route::get('/invoices/pdf', [PDFController::class, 'generateInvoicePDF'])->name('invoices.pdf');