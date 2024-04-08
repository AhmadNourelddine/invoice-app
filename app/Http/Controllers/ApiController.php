<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    function testAPI(){ 
        \Log::info("reached...");
        return response()->json(['message' => 'This is a test API']);
    }
}