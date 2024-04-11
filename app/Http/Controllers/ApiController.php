<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    function testAPI(){ 
        \Log::info("reached...");
        return response()->json(['message' => 'This is a test API']);
    }

    function customerCards(){
        $customers = DB::select('SELECT * FROM CustomerCard');
        return response()->json($customers);
    }
}