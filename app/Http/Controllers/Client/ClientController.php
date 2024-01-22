<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'clientDetails.category' => 'required|string|max:255',
            'clientDetails.date' => 'required|date',
            'clientDetails.amount' => 'required|numeric',
            'clientDetails.tax' => 'required|numeric',
            'clientDetails.cpn' => 'required|string|max:255',
            'clientDetails.cpm' => 'required|numeric',
            'clientDetails.received' => 'required|string',
        ]);

 

    }
}
