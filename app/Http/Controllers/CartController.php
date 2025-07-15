<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id)
    {
        $user_id = Auth::id();
        $quantity = $request->input('quantity', 1); // default 1 لو مش متحدد

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



    public function showCart()
    {
        $orders = Order::with('product')
                    ->where('user_id', Auth::id())
                    ->where('status', 'pending')
                    ->get();

        $total = $orders->sum(fn($order) => $order->product->price * $order->quantity);

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

    public function checkout()
    {
        Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->update(['status' => 'done']);

        return redirect()->route('cart.show')->with('success', 'Checkout successful!');
    }
    public function checkoutSingle(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403); 
        }

        $order->status = 'completed';
        $order->save();

        return redirect()->back()->with('success', 'The Product successfully purchased');
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
