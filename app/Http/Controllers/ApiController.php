<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PDO;
use App\Models\User;

class ApiController extends Controller
{

    function testDBconnection(){
        phpinfo();
        if(DB::connection()->getPdo()){
            echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();
        }
    }

    public function customerCards(){
        $customers = DB::select('SELECT * FROM CustomerCard ORDER BY EntryDate DESC');
        return response()->json($customers);
    }

    public function transactions(){

        $records = array(
            array(
                'Id' => 1,
                'SaleId' => 1001,
                'SaleRId' => 2001,
                'PurId' => 3001,
                'PurRId' => 4001,
                'ProdId' => 5001,
                'TransId' => 6001,
                'EntryDate' => '2024-04-01',
                'Code' => 'ABC123',
                'ItemName' => 'Widget A',
                'Input' => 100.5,
                'InputR' => 50.2,
                'Output' => 80.3,
                'OutputR' => 40.1,
                'TransInput' => 200.7,
                'TransOutput' => 180.2,
                'Cost' => 50.0,
                'Price' => 80.0,
                'Total' => 8000.0,
                'Offer' => 10.0,
                'ItemId' => 7001,
                'InventoryId' => 8001,
                'InventoryName' => 'Warehouse A',
                'LaborPay' => 20.0,
                'TotalLaborPay' => 100.0,
                'LoadPay' => 15.0,
                'TotalLoadPay' => 75.0,
                'Expenses' => 1,
                'TVA' => 5.0,
                'TVAD' => 2.0,
                'TotalLira' => 6500.0,
                'Sarf' => 10.0,
                'Is_Deleted' => 0
            ),
            array(
                'Id' => 2,
                'SaleId' => 1002,
                'SaleRId' => 2002,
                'PurId' => 3002,
                'PurRId' => 4002,
                'ProdId' => 5002,
                'TransId' => 6002,
                'EntryDate' => '2024-04-02',
                'Code' => 'XYZ456',
                'ItemName' => 'Widget B',
                'Input' => 120.0,
                'InputR' => 60.0,
                'Output' => 90.0,
                'OutputR' => 45.0,
                'TransInput' => 210.0,
                'TransOutput' => 180.0,
                'Cost' => 45.0,
                'Price' => 70.0,
                'Total' => 9000.0,
                'Offer' => 12.0,
                'ItemId' => 7002,
                'InventoryId' => 8002,
                'InventoryName' => 'Warehouse B',
                'LaborPay' => 25.0,
                'TotalLaborPay' => 120.0,
                'LoadPay' => 18.0,
                'TotalLoadPay' => 90.0,
                'Expenses' => 0,
                'TVA' => 4.5,
                'TVAD' => 1.5,
                'TotalLira' => 7200.0,
                'Sarf' => 15.0,
                'Is_Deleted' => 0
            ),
            array(
                'Id' => 3,
                'SaleId' => 1003,
                'SaleRId' => 2003,
                'PurId' => 3003,
                'PurRId' => 4003,
                'ProdId' => 5003,
                'TransId' => 6003,
                'EntryDate' => '2024-04-03',
                'Code' => 'PQR789',
                'ItemName' => 'Widget C',
                'Input' => 150.0,
                'InputR' => 75.0,
                'Output' => 100.0,
                'OutputR' => 50.0,
                'TransInput' => 250.0,
                'TransOutput' => 200.0,
                'Cost' => 60.0,
                'Price' => 90.0,
                'Total' => 12000.0,
                'Offer' => 15.0,
                'ItemId' => 7003,
                'InventoryId' => 8003,
                'InventoryName' => 'Warehouse C',
                'LaborPay' => 30.0,
                'TotalLaborPay' => 150.0,
                'LoadPay' => 20.0,
                'TotalLoadPay' => 100.0,
                'Expenses' => 1,
                'TVA' => 6.0,
                'TVAD' => 2.5,
                'TotalLira' => 10000.0,
                'Sarf' => 20.0,
                'Is_Deleted' => 0
            ),
            array(
                'Id' => 4,
                'SaleId' => 1004,
                'SaleRId' => 2004,
                'PurId' => 3004,
                'PurRId' => 4004,
                'ProdId' => 5004,
                'TransId' => 6004,
                'EntryDate' => '2024-04-04',
                'Code' => 'LMN012',
                'ItemName' => 'Widget D',
                'Input' => 200.0,
                'InputR' => 100.0,
                'Output' => 120.0,
                'OutputR' => 60.0,
                'TransInput' => 300.0,
                'TransOutput' => 220.0,
                'Cost' => 70.0,
                'Price' => 100.0,
                'Total' => 16000.0,
                'Offer' => 20.0,
                'ItemId' => 7004,
                'InventoryId' => 8004,
                'InventoryName' => 'Warehouse D',
                'LaborPay' => 35.0,
                'TotalLaborPay' => 180.0,
                'LoadPay' => 25.0,
                'TotalLoadPay' => 120.0,
                'Expenses' => 0,
                'TVA' => 7.0,
                'TVAD' => 3.0,
                'TotalLira' => 13000.0,
                'Sarf' => 25.0,
                'Is_Deleted' => 0
            ),
            array(
                'Id' => 5,
                'SaleId' => 1005,
                'SaleRId' => 2005,
                'PurId' => 3005,
                'PurRId' => 4005,
                'ProdId' => 5005,
                'TransId' => 6005,
                'EntryDate' => '2024-04-05',
                'Code' => 'OPQ345',
                'ItemName' => 'Widget E',
                'Input' => 180.0,
                'InputR' => 90.0,
                'Output' => 110.0,
                'OutputR' => 55.0,
                'TransInput' => 280.0,
                'TransOutput' => 220.0,
                'Cost' => 65.0,
                'Price' => 95.0,
                'Total' => 14000.0,
                'Offer' => 18.0,
                'ItemId' => 7005,
                'InventoryId' => 8005,
                'InventoryName' => 'Warehouse E',
                'LaborPay' => 30.0,
                'TotalLaborPay' => 160.0,
                'LoadPay' => 22.0,
                'TotalLoadPay' => 110.0,
                'Expenses' => 0,
                'TVA' => 5.5,
                'TVAD' => 2.0,
                'TotalLira' => 11500.0,
                'Sarf' => 20.0,
                'Is_Deleted' =>0
            )
        );
        
        return response()->json($records);

    }

    public function dummyCustomerCards()
    {
        $customers = [
            [
                "Id" => 1,
                "CustomerName" => "حسن محسن",
                "Phone" => "+1234567890",
                "Email" => "john@example.com",
                "Address" => "بيروت - حارة حريك",
                "Balance" => 1000.50,
                "EntryDate" => "2024-04-11",
                "BalanceLira" => 2500.25,
                "Adds" => 50,
                "Sarf" => 100,
                "BalanceDollar" => 500.75
            ],
            [
                "Id" => 2,
                "CustomerName" => "سامي حسين",
                "Phone" => "+9876543210",
                "Email" => "jane@example.com",
                "Address" => "النبطية حي الزهور",
                "Balance" => 750.25,
                "EntryDate" => "2024-04-10",
                "BalanceLira" => 1875.75,
                "Adds" => 25,
                "Sarf" => 50,
                "BalanceDollar" => 375.25
            ],
            [
                "Id" => 3,
                "CustomerName" => "كمال العلي",
                "Phone" => "+1122334455",
                "Email" => "alice@example.com",
                "Address" => "بعلبك حي الصوان",
                "Balance" => 1200.75,
                "EntryDate" => "2024-04-09",
                "BalanceLira" => 3001.88,
                "Adds" => 75,
                "Sarf" => 150,
                "BalanceDollar" => 600.25
            ],
            [
                "Id" => 3,
                "CustomerName" => "كمال الحسن",
                "Phone" => "+1122334455",
                "Email" => "alice@example.com",
                "Address" => "جبيل شارع الاولي",
                "Balance" => 1200.75,
                "EntryDate" => "2024-04-09",
                "BalanceLira" => 3001.88,
                "Adds" => 75,
                "Sarf" => 150,
                "BalanceDollar" => 600.25
            ],
            [
                "Id" => 3,
                "CustomerName" => "كمال الحسن",
                "Phone" => "+1122334455",
                "Email" => "alice@example.com",
                "Address" => "جبيل شارع الاولي",
                "Balance" => 1200.75,
                "EntryDate" => "2024-04-09",
                "BalanceLira" => 3001.88,
                "Adds" => 75,
                "Sarf" => 150,
                "BalanceDollar" => 600.25
            ],
            [
                "Id" => 3,
                "CustomerName" => "كمال الحسن",
                "Phone" => "+1122334455",
                "Email" => "alice@example.com",
                "Address" => "جبيل شارع الاولي",
                "Balance" => 1200.75,
                "EntryDate" => "2024-04-09",
                "BalanceLira" => 3001.88,
                "Adds" => 75,
                "Sarf" => 150,
                "BalanceDollar" => 600.25
            ],
            [
                "Id" => 3,
                "CustomerName" => "كمال الحسن",
                "Phone" => "+1122334455",
                "Email" => "alice@example.com",
                "Address" => "جبيل شارع الاولي",
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

    public function dummySupplierCards()
    {
        $suppliers = [
            [
                'Id' => 1,
                'SupplierName' => 'Supplier A',
                'Phone' => '123-456-7890',
                'Email' => 'supplierA@example.com',
                'Address' => '123 Main St, City, Country',
                'Balance' => 1000.00,
            ],
            [
                'Id' => 2,
                'SupplierName' => 'Supplier B',
                'Phone' => '987-654-3210',
                'Email' => 'supplierB@example.com',
                'Address' => '456 Elm St, Town, Country',
                'Balance' => 500.50,
            ],
            [
                'Id' => 3,
                'SupplierName' => 'Supplier C',
                'Phone' => '555-555-5555',
                'Email' => 'supplierC@example.com',
                'Address' => '789 Oak St, Village, Country',
                'Balance' => 750.75,
            ],
            [
                'Id' => 4,
                'SupplierName' => 'Supplier D',
                'Phone' => '111-222-3333',
                'Email' => 'supplierD@example.com',
                'Address' => '321 Pine St, Hamlet, Country',
                'Balance' => 1200.25,
            ]
        ];
        

        return response()->json($suppliers);
    }

    public function register(Request $request)
    {
        \Log::info(json_encode($request->all()));
        // Validate incoming request
        $request->validate([
            'UserName' => 'required',
            'Password' => 'required',
        ]);
    
        // Check if username already exists
        $existingUser = User::where('UserName', $request->UserName)->first();
        \Log::info($existingUser); 
        if ($existingUser) {
            // Username already exists, return -1
            return -1;
        }
    
        // Create new user
        $user = new User();
        $user->UserName = $request->UserName;
        $user->Password = $request->Password;
        $user->save();
        \Log::info(json_encode($user));
        // Return user id on success
        return $user->id;
    }

    public function addCustomer(Request $request)
    {
        \Log::info(json_encode($request->all()));
        // Validate incoming request
        $customerName = $request->input('CustomerName');
        $phone = $request->input('Phone');
        $email = $request->input('Email');
        $address = $request->input('Address');
        $balance = $request->input('Balance');
        $entryDate = $request->input('EntryDate');
        $balanceLira = $request->input('BalanceLira');
        $sarf = $request->input('Sarf');
        $balanceDollar = $request->input('BalanceDollar');
    
        // Call the stored procedure
        try {
            DB::statement('EXEC SF_InsertCustomerCard ?, ?, ?, ?, ?, ?, ?, ?, ?', array(
                $customerName,
                $phone,
                $email,
                $address,
                $balance,
                $entryDate,
                $balanceLira,
                $sarf,
                $balanceDollar
            ));

            return 1;
        } catch (\Exception $e) {
            \Log::info($e);
            return -1;
        }
    }

    function sqlToPhpArray($sql) {
        // Remove "INSERT INTO YourTableName" part
        $sql = preg_replace('/INSERT INTO YourTableName/', '', $sql);
        
        // Remove parentheses and split values
        $values = explode(',', trim($sql, "();"));
        
        $result = [];
        foreach ($values as $value) {
            // Remove parentheses and split each value
            $fields = explode(',', trim($value, "()"));
            $entry = [];
            foreach ($fields as $field) {
                // Split field into key and value
                $pair = explode(',', $field);
                if (count($pair) === 2) {
                    $entry[trim($pair[0])] = trim($pair[1]);
                } else {
                    // Log or handle the case where the pair is not of length 2
                    // For now, we'll just ignore it
                }
            }
            $result[] = $entry;
        }
        return $result;
    }

    public function getArrayData(){
        $sql = "INSERT INTO YourTableName (Id, SaleId, SaleRId, PurId, PurRId, ProdId, TransId, EntryDate, Code, ItemName, Input, InputR, Output, OutputR, TransInput, TransOutput, Cost, Price, Total, Offer, ItemId, InventoryId, InventoryName, LaborPay, TotalLaborPay, LoadPay, TotalLoadPay, Expenses, TVA, TVAD, TotalLira, Sarf, Is_Deleted) VALUES (1, 101, 201, 301, 401, 501, 601, '2024-04-14', 'ABC001', 'Item 1', 10.5, 0, 0, 0, 0, 0, 5.5, 15.5, 100, 0, 1, 1001, 'Inventory 1', 20.5, 30.5, 40.5, 50.5, 1, 10.5, 20.5, 100.5, 0, 0), (2, 102, 202, 302, 402, 502, 602, '2024-04-14', 'ABC002', 'Item 2', 20.5, 0, 0, 0, 0, 0, 10.5, 25.5, 200, 0, 2, 1002, 'Inventory 2', 30.5, 40.5, 50.5, 60.5, 1, 20.5, 30.5, 200.5, 0, 0), (3, 103, 203, 303, 403, 503, 603, '2024-04-14', 'ABC003', 'Item 3', 30.5, 0, 0, 0, 0, 0, 15.5, 35.5, 300, 0, 3, 1003, 'Inventory 3', 40.5, 50.5, 60.5, 70.5, 1, 30.5, 40.5, 300.5, 0, 0), (4, 104, 204, 304, 404, 504, 604, '2024-04-14', 'ABC004', 'Item 4', 40.5, 0, 0, 0, 0, 0, 20.5, 45.5, 400, 0, 4, 1004, 'Inventory 4', 50.5, 60.5, 70.5, 80.5, 1, 40.5, 50.5, 400.5, 0, 0), (5, 105, 205, 305, 405, 505, 605, '2024-04-14', 'ABC005', 'Item 5', 50.5, 0, 0, 0, 0, 0, 25.5, 55.5, 500, 0, 5, 1005, 'Inventory 5', 60.5, 70.5, 80.5, 90.5, 1, 50.5, 60.5, 500.5, 0, 0);";
        $result = $this -> sqlToPhpArray($sql);
        print_r($result);
    }
}