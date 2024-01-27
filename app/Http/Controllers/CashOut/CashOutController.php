<?php

namespace App\Http\Controllers\CashOut;

use App\Http\Controllers\Controller;
use App\Models\CashOutDetail;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    public function store_cash_out_data(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'purpose' => 'nullable|string',
            'payment_mode' => 'required',
            'pbn' => 'nullable|string',
            'pbm' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'agent' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:2048',
        ]);

        $cashOutDetail = new CashOutDetail([

            'category' => $request->category,
            'date' => $request->date,
            'amount' => $request->amount,
            'purpose' => $request->purpose,
            'payment_mode' => $request->payment_mode,
            'pbn' => $request->pbn,
            'pbm' => $request->pbm,
            'tax' => $request->tax,
            'agent' => $request->agent,
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $imageName = 'custom_image_name.' . $image->getClientOriginalExtension();
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            // $imagePath = $image->storeAs('images', $imageName, 'public');
            $imagePath = $image->move('images', $imageName);
            $cashOutDetail->image_path = $imagePath;
        }

        $cashOutDetail->save();

        return response()->json(['message' => ' data stored successfully'], 201);

    }

    public function dispaly_cash_out()
    {
        return view('admin.cash_out_details');
    }
}
