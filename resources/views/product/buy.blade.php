@extends('layouts.app')

@section('content')
<div class="cart-container">
    <h2 class="cart-title gradient-text">Your Cart</h2>

    @if($orders->isEmpty())
        <div class="empty-cart">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="var(--electric-purple)" width="48" height="48">
                <path d="M4.004 6.417l-.924-2.415h-1.08v1h1.212l1.82 4.659 1.385-1.385-1.413-3.864h14.961v1h-14.16l.771 2h15.389l-2.4 8h-14.4l-2.04-5.21-1.537 1.537.887 2.263-1.832 1.832-1.414-1.414 1.832-1.833-.842-2.15zm16.996 12.583c0 .828-.672 1.5-1.5 1.5s-1.5-.672-1.5-1.5.672-1.5 1.5-1.5 1.5.672 1.5 1.5zm-13 0c0 .828-.672 1.5-1.5 1.5s-1.5-.672-1.5-1.5.672-1.5 1.5-1.5 1.5.672 1.5 1.5z"/>
            </svg>
            <p>Your cart is currently empty</p>
            <a href="{{ route('product.index') }}" class="btn-main btn-shop">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Continue Shopping
            </a>
        </div>
    @else
        <div class="cart-table-container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price ({{ $orders->first()->viewer_currency }})</th>
                        <th>Quantity</th>
                        <th>Total ({{ $orders->first()->viewer_currency }})</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="cart-item animate-slide-up">
                        <td class="product-info">
                            <div class="product-name">{{ $order->product->name }}</div>
                        </td>

                        <td class="product-price">
                            {{ number_format($order->converted_price, 2) }}
                        </td>

                        <td class="product-quantity">
                            <form action="{{ route('cart.update', $order->id) }}" method="POST" class="quantity-form">
                                @csrf
                                <input type="number" name="quantity" value="{{ $order->quantity }}" min="1" class="quantity-input">
                                <button type="submit" class="btn-update">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </td>

                        <td class="product-total">
                            {{ number_format($order->converted_price * $order->quantity, 2) }}
                        </td>

                        <td class="product-actions">
                            <form action="{{ route('cart.remove', $order->id) }}" method="POST" class="action-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" title="Remove item">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-summary">
                <div class="total-amount">
                    <span>Total ({{ $orders->first()->viewer_currency }}):</span>
                    <span class="amount">{{ number_format($total, 2) }}</span>
                </div>

               <form action="{{ route('cart.email.checkout') }}" method="POST" class="checkout-form">
                    @csrf
                    <button type="submit" class="btn-main btn-checkout-all">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        Send Checkout Email
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection