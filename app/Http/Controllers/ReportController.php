<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralReport;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;



class ReportController extends Controller
{
    public function showForm()
    {
        return view('report.form');
    }

public function sendReport(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email'
    ]);

    $user = Auth::user();
    $role = $user->role;
    $country = $user->country;
    $name = $request->input('name');
    $recipientEmail = $request->input('email');

    $safeName = str_replace(' ', '_', strtolower($name));
    $filename = 'report_' . $safeName . '.csv';
    $csvPath = storage_path("app/reports/{$filename}");

    $csvContent = '';

    if ($role === 'user') {
        $orders = Order::where('user_id', $user->id)->with('product')->get();

        if ($orders->isEmpty()) {
            return back()->with('error', 'You have no orders to include in the report.');
        }

        $csvContent .= "Product,Quantity\n";
        foreach ($orders as $order) {
            $csvContent .= $order->product->name . "," . $order->quantity . "\n";
        }

    } else {
        $products = Product::where('country_id', auth()->user()->country_id)->with('category')->get();

        if ($products->isEmpty()) {
            return back()->with('error', 'No products found in your country.');
        }

        $csvContent .= "Category,Product,Quantity\n";
        foreach ($products->groupBy('category.name') as $categoryName => $groupedProducts) {
            foreach ($groupedProducts as $product) {
                $csvContent .= $categoryName . "," . $product->name . "," . $product->quantity . "\n";
            }
        }
    }

    file_put_contents($csvPath, $csvContent);

    Mail::to($recipientEmail)->send(new \App\Mail\GeneralReport($csvPath, $name));

    return back()->with('success', 'Report sent successfully to ' . $recipientEmail);
}




}
