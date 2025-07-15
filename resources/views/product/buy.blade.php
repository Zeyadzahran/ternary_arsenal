@extends('layouts.app')

@section('content')
    <h2>Your Cart</h2>

    @if($orders->isEmpty())
        <p>No items in your cart.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price ({{ $orders->first()->viewer_currency }})</th>
                    <th>Quantity</th>
                    <th>Total ({{ $orders->first()->viewer_currency }})</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->product->name }}</td>

                        <td>
                            {{ number_format($order->converted_price, 2) }}
                        </td>

                        <td>
                            <form action="{{ route('cart.update', $order->id) }}" method="POST" style="display:flex; align-items:center;">
                                @csrf
                                <input type="number" name="quantity" value="{{ $order->quantity }}" min="1" style="width: 60px; margin-right: 5px;">
                                <button type="submit">Update</button>
                            </form>
                        </td>

                        <td>
                            {{ number_format($order->converted_price * $order->quantity, 2) }}
                        </td>

                        <td>
                            <form action="{{ route('cart.remove', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>

                            <form action="{{ route('cart.checkoutSingle', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Checkout</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total ({{ $orders->first()->viewer_currency }}): {{ number_format($total, 2) }}</h4>

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit">Checkout All</button>
        </form>
    @endif
@endsection
