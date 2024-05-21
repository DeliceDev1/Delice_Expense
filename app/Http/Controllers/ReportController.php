<?php

namespace App\Http\Controllers;

use App\Models\CashOutDetail;
use App\Models\ClientDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    //

    public function index($branch_id)
    {
        $today = Carbon::today();

        $totalCashOutAmountForToday = CashOutDetail::where('branch_id', $branch_id)
            ->whereDate('date', $today)
            ->sum('amount');


        $totalCashInAmountForToday = ClientDetail::where('branch_id', $branch_id)
            ->whereDate('date', $today)
            ->sum('amount');

        $totalCashOutAmountForThisMonth = CashOutDetail::where('branch_id', $branch_id)
            ->whereYear('date', $today->year)
            ->whereMonth('date', $today->month)
            ->sum('amount');

        $totalCashInAmountForThisMonth = ClientDetail::where('branch_id', $branch_id)
            ->whereYear('date', $today->year)
            ->whereMonth('date', $today->month)
            ->sum('amount');


        $totalCashOutAmount = CashOutDetail::where('branch_id', $branch_id)->sum('amount');


        $totalCashInAmount = ClientDetail::where('branch_id', $branch_id)->sum('amount');

   
        $netAmountForThisMonth = $totalCashInAmountForThisMonth - $totalCashOutAmountForThisMonth;


        $totalNetAmount =  $totalCashInAmount - $totalCashOutAmount;
       

        return view('dashboard', [
            'branch_id' => $branch_id,
            'totalCashOutAmountForToday' => $totalCashOutAmountForToday,
            'totalCashInAmountForToday' => $totalCashInAmountForToday,
            'totalCashOutAmountForThisMonth' => $totalCashOutAmountForThisMonth,
            'totalCashInAmountForThisMonth' => $totalCashInAmountForThisMonth,
            'netAmountForThisMonth' => $netAmountForThisMonth,
            'totalNetAmount' => $totalNetAmount,
        ]);
    }
}
