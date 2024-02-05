<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category_in()
    {

        return view('admin.add_category_in');
    }
}
