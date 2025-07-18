<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Services\CurrencyService;
use App\Mail\CheckoutEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class CartController extends Controller
{
    public function addToCart(Request $request, $product_id)
    {
        $user_id = Auth::id();
        $quantity = $request->input('quantity', 1);

        $existingOrder = Order::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->where('status', 'pending')
            ->first();

        if ($existingOrder) {
            $existingOrder->quantity += $quantity;
            $existingOrder->save();
        } else {
            Order::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'status' => 'pending',
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function showCart(CurrencyService $currencyService)
    {
        $user = Auth::user();
        $userCurrency = $user?->country?->currency ?? 'USD';

        $orders = Order::with('product.country')
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->get();

        $total = 0;

        foreach ($orders as $order) {
            $product = $order->product;
            $productCurrency = $product->country?->currency ?? 'USD';
            $price = $product->price;

            // Convert price to user currency
            $convertedPrice = $currencyService->convert($price, $productCurrency, $userCurrency);
            $order->converted_price = $convertedPrice;
            $order->viewer_currency = $userCurrency;

            $total += $convertedPrice * $order->quantity;
        }

        return view('product.buy', compact('orders', 'total'));
    }

    public function removeFromCart($order_id)
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->findOrFail($order_id);

        $order->delete();

        return redirect()->route('cart.show')->with('success', 'Item removed!');
    }

    // public function checkout()
    // {
    //     Order::where('user_id', Auth::id())
    //         ->where('status', 'pending')
    //         ->update(['status' => 'done']);

    //     return redirect()->route('cart.show')->with('success', 'Checkout successful!');
    // }

    // public function checkoutSingle(Order $order)
    // {
    //     if ($order->user_id !== Auth::id()) {
    //         abort(403);
    //     }

    //     $order->status = 'completed';
    //     $order->save();

    //     return redirect()->back()->with('success', 'The Product successfully purchased');
    // }
    public function sendCheckoutEmail()
    {
        $user = Auth::user();

        $checkoutUrl = URL::signedRoute('checkout.from.email', ['user' => $user->id]);

        $qrPath = storage_path('app/public/qr-code.png');

        QrCode::format('png')
            ->size(300)
            ->generate('https://drive.google.com/file/d/1XAKO3K2y87teARaNiZTAyGAI-j_J5qhg/view?usp=drivesdk', $qrPath);

        Mail::mailer('general')->to(env('GENERAL_MAIL_USERNAME'))
            ->send(new CheckoutEmail($checkoutUrl, $qrPath));

        return redirect()->route('cart.show')->with('success', 'Checkout email sent to Gmail!');
    }
    public function checkoutFromEmail(Request $request)
    {
        $userId = $request->query('user');

        Order::where('user_id', $userId)
            ->where('status', 'pending')
            ->update(['status' => 'done']);

        return redirect()->route('cart.show')->with('success', 'Checkout completed via email!');
    }


    public function updateQuantity(Request $request, $order_id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::where('id', $order_id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $order->quantity = $request->quantity;
        $order->save();

        return redirect()->route('cart.show')->with('success', 'Quantity updated!');
    }
}
