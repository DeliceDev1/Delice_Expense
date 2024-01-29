<?php

use App\Http\Controllers\CashOut\CashOutController;
use App\Http\Controllers\ProfileController;
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
    return view('admin.cash_in');
});

// route for cash-out layout
Route::get('/cash_out', function () {
    return view('admin.cash_out');
});

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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
