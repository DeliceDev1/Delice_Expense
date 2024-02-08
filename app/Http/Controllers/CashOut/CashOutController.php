<?php

namespace App\Http\Controllers\CashOut;

use App\Exports\CashOutDetailExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\CashOutDetail;
use Illuminate\Http\Request;
use Session;
use File;

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
            'image_path' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
        ]);

        $imageName = "";
        // if ($image_path = $request->file('image_path')) {
        //     $imageName = time() . '-' . uniqid() . '.' . $image_path->getClientOriginalExtension();
        //     $image_path->move('images/', $imageName);
        // } 

        if ($image_path = $request->file('image_path')) {
            $imageName = time() . '-' . uniqid() . '.' . $image_path->getClientOriginalExtension();
            $image_path->move(public_path('images/'), $imageName);
        }


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
            'image_path' => $imageName,
        ]);


        $cashOutDetail->save();
        Session::flash('msg', 'Data Added Succesfuly');
        return redirect()->back();

    }

    public function dispaly_cash_out()
    {
        $data = CashOutDetail::all();

        return view('admin.cash_out_details', compact('data'));
    }

    public function edit_cash_out($id)
    {
        $edit_data = CashOutDetail::findOrFail($id);


        return view('admin.edit_cash_out', compact('edit_data'));
    }

    public function update_cash_out($id, Request $request)
    {

        $update_data = CashOutDetail::findOrFail($id);

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
            'image_path' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
        ]);

        // $imageName = "";

        // $deleteOldImage = 'images/' . $update_data->image_path;

        // if ($image_path = $request->file('image_path')) {
        //     if (File::exists($deleteOldImage)) {
        //         File::delete($deleteOldImage);
        //     }
        //     $imageName = time() . '-' . uniqid() . '.' . $image_path->getClientOriginalExtension();
        //     $image_path->move(public_path('images/'), $imageName);
        // } else {
        //     $imageName = $update_data->image_path;
        // }

        $imageName = "";

        $deleteOldImage = 'images/' . $update_data->image_path;

        if ($image_path = $request->file('image_path')) {
            // If a new image is provided in the request
            if (File::exists($deleteOldImage)) {
                // Delete the old image if it exists
                File::delete($deleteOldImage);
            }

            // Generate a unique name for the new image
            $imageName = time() . '-' . uniqid() . '.' . $image_path->getClientOriginalExtension();

            // Move the new image to the "images/" directory
            $image_path->move(public_path('images/'), $imageName);
        } else {
            // If no new image is provided, use the old image path
            $imageName = $update_data->image_path;
        }


        CashOutDetail::where('id', $id)->update([
            'category' => $request->category,
            'date' => $request->date,
            'amount' => $request->amount,
            'purpose' => $request->purpose,
            'payment_mode' => $request->payment_mode,
            'pbn' => $request->pbn,
            'pbm' => $request->pbm,
            'tax' => $request->tax,
            'agent' => $request->agent,
            'image_path' => $imageName,
        ]);



        Session::flash('msg', 'Data Updated Succesfuly');
        return redirect()->back();
        // return redirect()->route('display_out');
    }

    public function delete_cash_out($id)
    {
        $delete_cash_out_data = CashOutDetail::find($id);

        $deleteOldImage = 'images/' . $delete_cash_out_data->image_path;
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        $delete_cash_out_data->delete();
        Session::flash('msg', 'Data Deleted successfuly');
        return redirect()->route('display_out');

    }

    public function filter(Request $request)
    {
        //first catching the values from input field.
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $category = $request->input('category');
        $paymentMode = $request->input('payment_mode');
        $number = $request->input('pbm');
        $name = $request->input('pbn');
        $agent = $request->input('agent');

        // Query to filter data based on inputs
        $data = CashOutDetail::when($startDate, function ($query) use ($startDate) {
            $query->where('date', '>=', $startDate);
        })
            ->when($endDate, function ($query) use ($endDate) {
                $query->where('date', '<=', $endDate);
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->when($paymentMode, function ($query) use ($paymentMode) {
                $query->where('payment_mode', $paymentMode);
            })
            ->when($number, function ($query) use ($number) {
                $query->where('pbm', $number);
            })
            ->when($name, function ($query) use ($name) {
                $query->where('pbn', $name);
            })
            ->when($agent, function ($query) use ($agent) {
                $query->where('agent', $agent);
            })
            ->get();


        return view('admin.cash_out_details', compact('data'));



    }

    //code for adding category

    public function show_category_in()
    {

        return view('admin.add_category_in');
    }

    public function show_category_out()
    {

        return view('admin.add_category_out');
    }

    public function add_category_cash_out(Request $request)
    {

        $newCategory = $request->input('newCategory');



        $request->validate([
            'newCategory' => 'required|string|max:255|unique:cash_out_details,category',
        ]);

        $category = CashOutDetail::create([
            'category' => $newCategory,
        ]);


        // Create a new category and save it to the database
        $categories = CashOutDetail::pluck('category')->unique();

        return view('your.blade.view', compact('categories'));
    }



    public function export()
    {
        return Excel::download(new CashOutDetailExport, 'cash_out_details.xlsx');
    }

}
