<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/testDB', [ApiController::class, 'testDBconnection']);
Route::get('/dummy-customer-cards', [ApiController::class, 'dummyCustomerCards']);
Route::get('/dummy-supplier-cards', [ApiController::class, 'dummySupplierCards']);
Route::get('/customer-cards', [ApiController::class, 'customerCards']);
Route::get('/array-data', [ApiController::class, 'getArrayData']);
Route::get('/transactions', [ApiController::class, 'transactions']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/add-customer', [ApiController::class, 'addCustomer']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
