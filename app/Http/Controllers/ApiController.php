<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PDO;

class ApiController extends Controller
{
    function testAPI(){ 
        \Log::info("reached...");
        return response()->json(['message' => 'This is a test API']);
    }

    function testcustomerCards(){
         phpinfo();
        // try {
        //     $conn = new PDO("sqlsrv:server = tcp:stream-server.database.windows.net,1433; Database = YasirDB", "admin-server", "Asd1234*");
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // }
        // catch (PDOException $e) {
        //     print("Error connecting to SQL Server.");
        //     die(print_r($e));
        // }
        
        // // SQL Server Extension Sample Code:
        // $connectionInfo = array("UID" => "admin-server", "pwd" => "Asd1234*", "Database" => "YasirDB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
        // $serverName = "tcp:stream-server.database.windows.net,1433";
        // $conn = sqlsrv_connect($serverName, $connectionInfo);
        if(DB::connection()->getPdo()){
            echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();
        }
        $customers = DB::select('SELECT * FROM CustomerCard');
        return response()->json($customers);
    }

    public function customerCards()
    {
        $customers = [
            [
                "Id" => 1,
                "CustomerName" => "John Doe",
                "Phone" => "+1234567890",
                "Email" => "john@example.com",
                "Address" => "123 Main St, Anytown, USA",
                "Balance" => 1000.50,
                "EntryDate" => "2024-04-11",
                "BalanceLira" => 2500.25,
                "Adds" => 50,
                "Sarf" => 100,
                "BalanceDollar" => 500.75
            ],
            [
                "Id" => 2,
                "CustomerName" => "Jane Smith",
                "Phone" => "+9876543210",
                "Email" => "jane@example.com",
                "Address" => "456 Elm St, Othertown, USA",
                "Balance" => 750.25,
                "EntryDate" => "2024-04-10",
                "BalanceLira" => 1875.75,
                "Adds" => 25,
                "Sarf" => 50,
                "BalanceDollar" => 375.25
            ],
            [
                "Id" => 3,
                "CustomerName" => "Alice Johnson",
                "Phone" => "+1122334455",
                "Email" => "alice@example.com",
                "Address" => "789 Oak St, Anothertown, USA",
                "Balance" => 1200.75,
                "EntryDate" => "2024-04-09",
                "BalanceLira" => 3001.88,
                "Adds" => 75,
                "Sarf" => 150,
                "BalanceDollar" => 600.25
            ]
        ];

        return response()->json($customers);
    }
}