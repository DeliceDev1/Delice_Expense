<?php

use App\Http\Controllers\CashOut\CashOutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Models\AddCashInCategory;
use App\Models\AddCashOutCategory;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route for cash-in
Route::get('/cash_in', function () {
    // $categories = AddCashInCategory::pluck('category')->unique();
    return view('admin.cash_in');
})->name('display');

// route for cash-out layout
Route::get('/cash_out', function () {
    $categories = AddCashOutCategory::pluck('category')->unique();
    return view('admin.cash_out', compact('categories'));
})->name('admin.cash_out');

// route for inserting post data
Route::post('/cash_out_form_data', [CashOutController::class, 'store_cash_out_data'])->name('form_out');

// route for displaying cash_out data
Route::get('/cash_out_details', [CashOutController::class, 'dispaly_cash_out'])->name('display_out');

//Route to edit cash out data
Route::get('/edit_cash_out/{id}', [CashOutController::class, 'edit_cash_out'])->name('edit_out');

//Route for updating cash_out data
Route::post('/update_cash_out/{id}', [CashOutController::class, 'update_cash_out'])->name('update_out');

//Route to delete
Route::get('/delete_cash_out/{id}', [CashOutController::class, 'delete_cash_out'])->name('delete_out');

//route to filter by data
Route::get('/filter', [CashOutController::class, 'filter'])->name('filter');

//Route for downloading pdf
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdf');

// Route to show all the records of cash-in detail
Route::get('/cash_in_details', [ClientController::class, 'dispaly_cash_in'])->name('display_in');

Route::get('/add_category_in', [CategoryController::class, 'show_category_in'])->name('category-in');

Route::get('/add_category_out', [CategoryController::class, 'show_category_out'])->name('category-out');

Route::post('/show_added_category_out', [CategoryController::class, 'add_category_cash_out'])->name('show_added_category');

Route::post('/add_cash_in_category', [CategoryController::class, 'add_cash_in_category'])->name('add_cash_in_category');

//Route to export cashoutdetail
Route::get('/export-cash-out', [CashOutController::class, 'export'])->name('export.cash.out');

//route to export clientDetail.
Route::get('/export-clients', [ClientController::class, 'exportClients'])->name('export.clients');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
