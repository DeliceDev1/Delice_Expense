<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CashOut\CashOutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\AddCashInCategory;
use App\Models\AddCashOutCategory;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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
Route::get('/cash_in/{branch_id}', function ($branch_id) {
    $categories = AddCashInCategory::pluck('category')->unique();
    $categories = AddCashOutCategory::where('branch_id', $branch_id)->get();

    return view('admin.cash_in', ['branch_id' => $branch_id, 'categories' => $categories]); // Pass an array with variable name and value
})->name('display');

// route for cash-out layout
Route::get('/cash_out/{branch_id}', function ($branch_id) {
    $categories = AddCashOutCategory::pluck('category')->unique();
    return view('admin.cash_out', compact(['categories', 'branch_id']));
})->name('admin.cash_out');

// route for inserting post data
Route::post('/cash_out_form_data/{branch_id}', [CashOutController::class, 'store_cash_out_data'])->name('form_out');

// route for displaying cash_out data
Route::get('/cash_out_details/{branch_id}', [CashOutController::class, 'dispaly_cash_out'])->name('display_out');

//Route to edit cash out data
Route::get('/edit_cash_out/{id}/{branch_id}', [CashOutController::class, 'edit_cash_out'])->name('edit_out');

//Route for updating cash_out data
Route::post('/update_cash_out/{id}/{branch_id}', [CashOutController::class, 'update_cash_out'])->name('update_out');

//Route to delete
Route::get('/delete_cash_out/{id}/{branch_id}', [CashOutController::class, 'delete_cash_out'])->name('delete_out');

//route to filter by data
Route::get('/filter/{branch_id}', [CashOutController::class, 'filter'])->name('filter');

//Route for downloading pdf
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdf');

// Route to show all the records of cash-in detail
Route::get('/cash_in_details/{branch_id}', [ClientController::class, 'dispaly_cash_in'])->name('display_in');

Route::get('/add_category_in/{branch_id}', [CategoryController::class, 'show_category_in'])->name('category-in');

Route::get('/edit.cashin.categories/{id}', [CategoryController::class, 'editCashInCategory'])->name('edit.cashin.categories');

Route::get('/add_category_out/{branch_id}', [CategoryController::class, 'show_category_out'])->name('category-out');

Route::post('/show_added_category_out/{branch_id}', [CategoryController::class, 'add_category_cash_out'])->name('show_added_category');

Route::post('/add_cash_in_category/{branch_id}', [CategoryController::class, 'add_cash_in_category'])->name('add_cash_in_category');

//Route to export cashoutdetail
Route::get('/export-cash-out/{branch_id}', [CashOutController::class, 'export'])->name('export.cash.out');

//route to export clientDetail.
Route::get('/export-clients', [ClientController::class, 'exportClients'])->name('export.clients');

//Route to show categories
Route::get('/cash-in-categories/{branch_id}', [CategoryController::class, 'showCategoryIn'])->name('cat-in-list');

Route::get('/cash-out-categories/{branch_id}', [CategoryController::class, 'showCategoryOut'])->name('cat-out-list');

Route::get('/edit_cashin_categories/{id}/{branch_id}', [CategoryController::class, 'editCashInCategory'])->name('edit.cashin.categories');

Route::post('/update_cashin_category/{id}/{branch_id}', [CategoryController::class, 'updateCashiInCategory'])->name('update.cashin.category');

Route::get('/edit_cashout_categories/{id}/{branch_id}', [CategoryController::class, 'editCashOutCategory'])->name('edit.cashout.category');

Route::post('/update_cashout_categories/{id}/{branch_id}', [CategoryController::class, 'updateCashOutCategory'])->name('update.cashout.category');




// route for custom invoice 
Route::get('/invoice-form/{branch_id}', [InvoiceController::class, 'showInvoiceForm'])->name('invoice.form');

Route::post('/store-invoice/{branch_id}', [InvoiceController::class, 'store'])->name('store.invoice');

Route::get('/invoice-list/{branch_id}', [InvoiceController::class, 'showInvoiceList'])->name('invoice.list');

Route::get('/delete-invoice/{id}/{branch_id}', [InvoiceController::class, 'deleteInvoiceItem'])->name('delete.invoice');

Route::get('/edit-invoice/{id}/{branch_id}', [InvoiceController::class, 'editInvoiceItem'])->name('edit.invoice');

Route::post('/update-invoice/{id}/{branch_id}', [InvoiceController::class, 'updateInvoiceItem'])->name('update.invoice');

Route::get('/download-invoice/{id}/{branch_id}', [InvoiceController::class, 'generateInvoice'])->name('download.invoice');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/branch', function () {
//     return view('branch');
// })->middleware(['auth', 'verified'])->name('branch');

Route::get('/branch', [BranchController::class, 'showBranchPage'])->middleware(['auth', 'verified'])->name('branch');

// Route::get('/dashboard/{branch_id}', function ($branch_id) {
//     return view('dashboard', ['branch_id' => $branch_id]);
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard/{branch_id}', [ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard/{b_id}',[BranchController::class,'selectBranch'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
