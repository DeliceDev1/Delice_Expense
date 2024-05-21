<?php

namespace App\Http\Controllers\Client;


use App\Exports\CashOutDetailExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\ClientDetail;

use App\Models\ClientFile;
use Illuminate\Http\Request;
use App\Exports\ClientExport;
use Session;
use File;
use IllUminate\Support\Facades\Auth;



class ClientController extends Controller
{


    public function store(Request $request, $branch_id)
    {
        // dd($request->all());
        // dd($branch_id);

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
            // 'branch' => 'required|string',

            'image' => 'sometimes|nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:10240',

            'clientsFile.*.name' => 'required|string',
            'clientsFile.*.passport' => 'required|string',
            'clientsFile.*.nationality' => 'required|string',
            'clientsFile.*.appliedCountry' => 'required|string',

        ]);

        // Handle image upload for ClientDetail
        $imagePath = '';


        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalExtension(); // Generate unique name with 
            $image->move('images/', $imageName);
            $imagePath = 'images/' . $imageName;
        }

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
            'branch_id' => $branch_id,
            'image_path' => $imagePath, // store the image path in the database
        ]);

        // dd($clientDetail);

        $clientDetail->save();


        if (isset($request->clientFile)) {
            // Handle client files
            foreach ($request->input('clientFile') as $clientFileData) {
                $clientFile = new ClientFile($clientFileData);
                $clientDetail->clientFiles()->save($clientFile);
            }
        }

        // return a response indicating success
        return response(['msg' => 'success'], 200);



    }

    public function updateClient(Request $request, $branch_id)
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
            // 'branch' => 'required|string',

            'currency' => 'string',

            'clientsFile.*.name' => 'required|string',
            'clientsFile.*.passport' => 'required|string',
            'clientsFile.*.nationality' => 'required|string',
            'clientsFile.*.appliedCountry' => 'required|string',

        ]);

        $clientDetail = ClientDetail::findOrFail($request->id);

        // Update client detail record in the database
        $clientDetail->category = $request->input('category');
        $clientDetail->date = $request->input('date');
        $clientDetail->amount = $request->input('amount');
        $clientDetail->tax = $request->input('tax');
        $clientDetail->cpn = $request->input('cpn');
        $clientDetail->cpm = $request->input('cpm');
        $clientDetail->received = $request->input('received');
        $clientDetail->agent = $request->input('agent');
        $clientDetail->branch_id = $branch_id;
        $clientDetail->currency = $request->input('currency');
        // $clientDetail->branch = $request->input('branch');
        if (isset($request->image)) {
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '_' . $image->getClientOriginalExtension(); // Generate unique name with 
                $image->move('images/', $imageName);
                $imagePath = 'images/' . $imageName;

                if (File::exists($clientDetail->image_path)) {
                    // Delete the old image if it exists
                    File::delete($clientDetail->image_path);
                }
                $clientDetail->image_path = $imagePath;
            }
        }
        $clientDetail->save();

        $oldFiles = ClientFile::where('client_detail_id', $clientDetail->id)->delete();

        if (isset($request->clientFile)) {
            // Handle client files
            foreach ($request->input('clientFile') as $clientFileData) {
                $clientFile = new ClientFile($clientFileData);
                $clientDetail->clientFiles()->save($clientFile);
            }
        }

        return response(['msg' => 'succ'], 200);

    }


    public function dispaly_cash_in($branch_id)
    {
        // $data = ClientDetail::all();
        $data = ClientDetail::where('branch_id', $branch_id)->get();
     
        return view('admin.cash_in_details', compact('data'));
    }

    public function getClient($branch_id)
    {
        // $data = ClientDetail::with('clientFiles')->get();
        $data = ClientDetail::where('branch_id', $branch_id)->with('clientFiles')->get();
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

        // return redirect()->back();

        return response()->json(['message' => 'Client deleted successfully']);
    }




    public function searchData(Request $request, $branch_id)
    {
        // dd($branch_id);
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
            ->where('branch_id', $branch_id)
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
                $query->where('cpn', 'like', '%' . $name . '%');
            })
            ->when($agent, function ($query) use ($agent) {
                $query->where('agent', 'like', '%' . $agent . '%');
            })
            ->with('clientFiles')
            ->get();



        return response($data);
    }




    public function exportClients()
    {
        return Excel::download(new ClientExport, 'clients.xlsx');
    }



}
