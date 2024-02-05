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

    public function updateClient(Request $request)
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

            'clientsFile.*.name' => 'required|string',
            'clientsFile.*.passport' => 'required|string',
            'clientsFile.*.nationality' => 'required|string',
            'clientsFile.*.appliedCountry' => 'required|string',

        ]);

        $clientDetail = ClientDetail::findOrFail($request->id);

        // Handle image upload for ClientDetail
        // $imagePath = $request->file('image')->store('images'); // 'images' is the storage folder; adjust as needed

        // Update client detail record in the database
        $clientDetail->category = $request->input('category');
        $clientDetail->date = $request->input('date');
        $clientDetail->amount = $request->input('amount');
        $clientDetail->tax = $request->input('tax');
        $clientDetail->cpn = $request->input('cpn');
        $clientDetail->cpm = $request->input('cpm');
        $clientDetail->received = $request->input('received');
        $clientDetail->agent = $request->input('agent');
        $clientDetail->currency = $request->input('currency');
        $clientDetail->save();

        $oldFiles = ClientFile::where('client_detail_id', $clientDetail->id)->delete();


        // Handle client files
        foreach ($request->input('clientFile') as $clientFileData) {
            $clientFile = new ClientFile($clientFileData);
            $clientDetail->clientFiles()->save($clientFile);
        }

        Session::flash('msg', 'Data Added Succesfully');
        // return a response indicating success
        return response(['msg' => 'succ'], 200);

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


    public function deleteClient($id)
    {
        $clientDetail = ClientDetail::find($id);

        if (!$clientDetail) {
            // Handle case where client detail is not found
            return response()->json(['message' => 'Client not found'], 404);
        }

        // Delete associated client files
        $clientDetail->clientFiles()->delete();

        // Delete client detail
        $clientDetail->delete();

        return response()->json(['message' => 'Client deleted successfully']);
    }


  

    public function searchData(Request $request)
    {
        // Get values from input fields
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $category = $request->input('category');
        $received = $request->input('received');
        $number = $request->input('cpm');
        $name = $request->input('cpn');
        $agent = $request->input('agent');

        //Query to filter data based on inputs
        $data = ClientDetail::query()
            ->when($startDate, function ($query) use ($startDate) {
                $query->where('date', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->where('date', '<=', $endDate);
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->when($received, function ($query) use ($received) {
                $query->where('received', $received);
            })
            ->when($number, function ($query) use ($number) {
                $query->where('cpm', $number);
            })
            ->when($name, function ($query) use ($name) {
                $query->where('cpn', $name);
            })
            ->when($agent, function ($query) use ($agent) {
                $query->where('agent', $agent);
            })
            ->get();



        return response($data);
    }

}
