<?php

namespace App\Http\Controllers\CashOut;

use App\Http\Controllers\Controller;
use App\Models\CashOutDetail;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'category' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            //'purpose' => 'required|string',
            'payment_mode' => 'required',
            'pbn' => 'required|string',
            'pbm' => 'required|numeric',
            //'tax' => 'required|numeric',
           // 'agent' => 'required|string',

        ]);

        // Create and save the CashOut model
        $cashOut = CashOutDetail::create($validatedData);
    }
}
