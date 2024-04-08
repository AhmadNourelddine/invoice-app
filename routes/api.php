<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/test', [ApiController::class, 'testAPI']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
