<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/testDB', [ApiController::class, 'testDBconnection']);
Route::get('/dummy-customer-cards', [ApiController::class, 'dummyCustomerCards']);
Route::get('/dummy-supplier-cards', [ApiController::class, 'dummySupplierCards']);
Route::get('/dummy-sale-statements', [ApiController::class, 'dummySaleStatements']);
Route::get('/dummy-purchase-statements', [ApiController::class, 'dummyPurchaseStatements']);
Route::get('/supplier-cards', [ApiController::class, 'supplierCards']);
Route::get('/customer-cards', [ApiController::class, 'customerCards']);
Route::get('/sale-cards', [ApiController::class, 'saleCards']);
Route::get('/sale-card-details', [ApiController::class, 'saleCardDetails']);
Route::get('/sale-details', [ApiController::class, 'saleDetails']);
Route::get('/array-data', [ApiController::class, 'getArrayData']);
Route::get('/transactions', [ApiController::class, 'transactions']);
Route::get('/sale-statements', [ApiController::class, 'saleStatements']);
Route::get('/purchase-statements', [ApiController::class, 'purchaseStatements']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/add-customer', [ApiController::class, 'addCustomer']);
Route::post('/add-supplier', [ApiController::class, 'addSupplier']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
