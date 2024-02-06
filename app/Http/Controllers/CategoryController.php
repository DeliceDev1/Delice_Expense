<?php

namespace App\Http\Controllers;

use App\Models\AddCashInCategory;
use App\Models\AddCashOutCategory;
use App\Models\CashOutDetail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_category_in()
    {

        return view('admin.add_category_in');
    }

    public function show_category_out()
    {

        return view('admin.add_category_out');
    }

    public function add_cash_in_category(Request $request)
    {
        $request->validate([
            'newCategoryIn' => 'required|string|max:255|unique:add_cash_in_categories,category',
        ]);

        $newCategoryIn = $request->input('newCategoryIn');

        // The dd() line should be placed here if you want to check the input before proceeding.

        $category = AddCashInCategory::create([
            'category' => $newCategoryIn,
        ]);

        return redirect()->back();
    }

    public function add_category_cash_out(Request $request)
    {

        $newCategory = $request->input('newCategory');



        $request->validate([
            'newCategory' => 'required|string|max:255|unique:cash_out_details,category',
        ]);

        $category = AddCashOutCategory::create([
            'category' => $newCategory,
        ]);


        // Create a new category and save it to the database

        return redirect()->route('admin.cash_out');
    }

    public function getCategories()
    {

        $data = AddCashInCategory::all();

        return response()->json($data);

    }

}


