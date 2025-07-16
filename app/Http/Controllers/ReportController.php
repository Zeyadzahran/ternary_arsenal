<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\StockReportMail;
use App\Mail\WeaponRequestMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;


class ReportController extends Controller
{
    // ========== REPORT (Admins/Rulers) ==========

    public function showStockReportForm()
    {
        return view('report.sendReport');
    }

    public function sendStockReport(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $categories = Category::with('products')->get();
        $csv = "Category,Product,Stock\n";

        foreach ($categories as $cat) {
            foreach ($cat->products as $product) {
                $csv .= "{$cat->name},{$product->name},{$product->stock}\n";
            }
        }

        $filename = "stock_report_" . time() . ".csv";
        $path = storage_path("app/reports/{$filename}");
        file_put_contents($path, $csv);

        Mail::to($request->email)->send(new StockReportMail($path, $request->name));

        return back()->with('success', 'Stock report sent successfully.');
    }

    // ========== REQUEST (Generals) ==========

    public function showWeaponRequestForm()
    {
        return view('report.sendRequest');
    }

    public function handleWeaponRequest(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
            'email' => 'required|email',
        ]);

        $file = $request->file('csv_file');
        $filename = 'request_' . time() . '.csv';
        $path = storage_path("app/requests/{$filename}");

        // ✅ Move the uploaded file manually
        $file->move(storage_path('app/requests'), $filename);

        // ✅ Get recipient from .env
        $recipient = env('MAIL_FROM_ADDRESS');
        Mail::to($recipient)->send(new WeaponRequestMail($path, $request->email));

        return back()->with('success', 'Weapon request sent to HQ.');
    }
}
