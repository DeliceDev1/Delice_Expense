<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ClientDetail;
use App\Models\ClientFile;
use Illuminate\Http\Request;
use Session;

class ClientController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'category' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'tax' => 'required|numeric',
            'cpn' => 'nullable|string',
            'cpm' => 'required|numeric',
            'received' => 'required|string',
            'agent' => 'nullable|string',
            'currency' => 'string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',

            'clientsFile.*.name' => 'required|string',
            'clientsFile.*.passport' => 'required|string',
            'clientsFile.*.nationality' => 'required|string',
            'clientsFile.*.appliedCountry' => 'required|string',

        ]);

        // Handle image upload for ClientDetail
        $imagePath = $request->file('image')->store('images'); // 'images' is the storage folder; adjust as needed

        // Create a new client detail record in the database
        $clientDetail = new ClientDetail([
            'category' => $request->input('category'),
            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
            'tax' => $request->input('tax'),
            'cpn' => $request->input('cpn'),
            'cpm' => $request->input('cpm'),
            'received' => $request->input('received'),
            'agent' => $request->input('agent'),
            'currency' => $request->input('currency'),
            'image_path' => $imagePath, // store the image path in the database


        ]);

        $clientDetail->save();



        // Handle client files
        foreach ($request->input('clientFile') as $clientFileData) {
            $clientFile = new ClientFile($clientFileData);
            $clientDetail->clientFiles()->save($clientFile);
        }

        Session::flash('msg', 'Data Added Succesfully');
        // return a response indicating success
        return redirect()->back();



    }

    public function dispaly_cash_in()
    {
        $data = ClientDetail::all();
        return view('admin.cash_in_details', compact('data'));
    }

    public function getClient()
    {
        $data = ClientDetail::with('clientFiles')->get();
        // $data = ClientDetail::all();
        return response($data);
    }
}
