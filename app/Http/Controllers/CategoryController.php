<?php

namespace App\Http\Controllers;

use App\Models\AddCashInCategory;
use App\Models\AddCashOutCategory;
use App\Models\CashOutDetail;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function show_category_in($branch_id)
    {

        return view('admin.add_category_in', compact('branch_id'));
    }

    public function show_category_out($branch_id)
    {

        return view('admin.category.add_category_out', compact('branch_id'));
    }

    public function add_cash_in_category(Request $request, $branch_id)
    {
        $request->validate([
            'newCategoryIn' => 'required|string|max:255',
        ]);

        $newCategoryIn = $request->input('newCategoryIn');

        $category = AddCashInCategory::create([
            'category' => $newCategoryIn,
            'branch_id' => $branch_id,
        ]);

        Session::flash('msg', 'Category Added successfuly');
        return redirect()->back();
    }

    public function add_category_cash_out(Request $request, $branch_id)
    {

        $newCategory = $request->input('newCategory');



        $request->validate([
            'newCategory' => 'required|string|max:255',

        ]);

        $category = AddCashOutCategory::create([
            'category' => $newCategory,
            'branch_id' => $branch_id,
        ]);


        // Create a new category and save it to the database
        Session::flash('msg', 'Category Added successfuly');
        return redirect()->back();
    }

    public function getCategories($branch_id)
    {

        // $data = AddCashInCategory::all(); 
        $data = AddCashInCategory::where('branch_id', $branch_id)->get();

        // dd($data);

        return response()->json($data);

    }

    public function showCategoryIn($branch_id)
    {

        // $data = AddCashInCategory::all();

        $data = AddCashInCategory::where('branch_id', $branch_id)->get();
        // dd($data);
        return view('admin.cash_in_categories', compact('data'));

    }
    public function showCategoryOut($branch_id)
    {
        // $data = AddCashOutCategory::all();
        $data = AddCashOutCategory::where('branch_id', $branch_id)->get();

        return view('admin.category.cash_out_categories', compact('data'));

    }

    public function editCashInCategory($id, $branch_id)
    {
        $data = AddCashInCategory::where('branch_id', $branch_id)->findOrFail($id);

        return view('admin.category.edit_cash_in', compact('data'));

    }

    public function updateCashiInCategory(Request $request, $id, $branch_id)
    {
        $data = AddCashInCategory::where('branch_id', $branch_id)->findOrFail($id);

        $request->validate([
            'newCategoryIn' => 'required|string|max:255',
        ]);

        $newCategoryIn = $request->input('newCategoryIn');

        // Update the category using the retrieved instance
        $data->update([
            'category' => $newCategoryIn,
        ]);

        Session::flash('msg', 'Category updated successfully');
        return redirect()->back();
    }

    public function editCashOutCategory($id, $branch_id)
    {
        $data = AddCashOutCategory::where('branch_id', $branch_id)->findOrFail($id);

        return view('admin.category.edit_cash_out_category', compact('data'));
    }

    public function updateCashOutCategory(Request $request, $id, $branch_id)
    {
        $data = AddCashOutCategory::where('branch_id', $branch_id)->findOrFail($id);

        $request->validate([
            'newCategory' => 'required|string|max:255',
        ]);

        $newCategory = $request->input('newCategory');

        // Update the category using the retrieved instance
        $data->update([
            'category' => $newCategory,
        ]);

        Session::flash('msg', 'Category updated successfully');
        return redirect()->back();
    }

    public function deleteCategory()
    {
    }



}


