<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalesGraphController extends Controller
{
  public function show()
  {
    $monthlySales = $this->getSalesDataByRange(1);
    $threeMonthsSales = $this->getSalesDataByRange(3);
    $oneYearSales = $this->getSalesDataByRange(12);

    return view('sales.graph', compact('monthlySales', 'threeMonthsSales', 'oneYearSales'));
  }

  private function getSalesDataByRange($months)
  {
    $startDate = now()->subMonths($months);
    $endDate = now();

    return Transaction::where('status', 'close')
      ->whereBetween('issue_date', [$startDate, $endDate])
      ->orderBy('issue_date')
      ->get(['issue_date', 'total_amount']);
  }

  public function getSalesDataCustom(Request $request)
    {
        $startDate = Carbon::parse($request->startDate);
        $endDate = Carbon::parse($request->endDate);

        $salesData = Transaction::where('status', 'close')
            ->whereBetween('issue_date', [$startDate, $endDate])
            ->orderBy('issue_date')
            ->get(['issue_date', 'total_amount']);

        $totalAmount = $salesData->sum('total_amount');
        return response()->json([
          'salesData' => $salesData,
          'totalAmount' => $totalAmount,
      ]);
    }

}