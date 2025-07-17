<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductSold;
use App\Mail\GeneralReport;


class MailController extends Controller
{
//This controller not important I'll remove it
//   public function testEmail()
//     {
//         $product = ['name' => 'Test Product', 'price' => 999];
//         $buyer = ['name' => 'Test Buyer', 'email' => 'buyer@example.com'];

//         Mail::to('your@mail.com')->send(new ProductSold($product, $buyer));

//         return "Email sent successfully (check Mailtrap)";
//     }

 
//     public function sendReportToGeneral(User $general)
//     {
//         $data = [
//             ['Name' => 'AK-47', 'Country' => 'Russia', 'Stock' => 12],
//             ['Name' => 'M4A1', 'Country' => 'USA', 'Stock' => 7],
//         ];

//         // توليد CSV في ملف مؤقت
//         $csvPath = storage_path('app/report.csv');
//         $file = fopen($csvPath, 'w');
//         fputcsv($file, array_keys($data[0]));
//         foreach ($data as $row) {
//             fputcsv($file, $row);
//         }
//         fclose($file);

//         Mail::to($general->email)->send(new GeneralReport($csvPath));

//         return back()->with('success', 'Report sent!');
//     }


//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
} 
