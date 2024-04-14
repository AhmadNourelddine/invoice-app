<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/testDB', [ApiController::class, 'testDBconnection']);
Route::get('/dummy-customer-cards', [ApiController::class, 'dummyCustomerCards']);
Route::get('/customer-catrds', [ApiController::class, 'customerCards']);
Route::get('/array-data', [ApiController::class, 'getArrayData']);
Route::get('/transactions', [ApiController::class, 'transactions']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
