<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/store-client-data', [ClientController::class, 'store']);

Route::get('/get-client-data', [ClientController::class, 'getClient']);

Route::post('/update-client-data', [ClientController::class, 'updateClient']);

Route::delete('/delete-client/{id}', [ClientController::class, 'deleteClient']);

Route::post('/search-data', [ClientController::class, 'searchData']);

Route::get('/get-category-data', [CategoryController::class, 'getCategories']);

Route::post('/get-pdf/{id}', [PDFController::class, 'getPdf']);