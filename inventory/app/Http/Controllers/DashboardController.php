<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $customerCount = Customer::count();

        $totalStock = Product::sum('quantity') - Transaction::where('status', 'close')->sum('quantity_product');

        $totalProductionThisMonth = Product::whereYear('date', Carbon::now()->year)
            ->whereMonth('date', Carbon::now()->month)
            ->sum('quantity');

        $soldProductsThisMonth = Transaction::where('status', 'close')
            ->whereYear('issue_date', Carbon::now()->year)
            ->whereMonth('issue_date', Carbon::now()->month)
            ->sum('quantity_product');

        $totalSalesThisMonth = Transaction::where('status', 'close')
            ->whereYear('issue_date', Carbon::now()->year)
            ->whereMonth('issue_date', Carbon::now()->month)
            ->sum('total_amount');

        if (Auth::check()) {
            return view('dashboard.dashboard', compact('customerCount', 'totalStock', 'soldProductsThisMonth', 'totalSalesThisMonth', 'totalProductionThisMonth'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
}
