

@extends('layouts.app')

@section('content')
<div class="product-details-container">
    <h1 class="product-title">Product Details</h1>

    {{-- ✅ رسالة نجاح لو المنتج اتضاف للكارت --}}
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <div class="product-content">
        <div class="product-image">
            @if($product->image_url)
                <img src="{{  $product->image_url }}" alt="{{ $product->name }}" class="product-main-image">
            @else
                <div class="no-image-placeholder">No Image Available</div>
            @endif
        </div>

        <div class="product-info">
            <ul class="product-details-list">
                <li><strong>Name:</strong> {{ $product->name }}</li>
                <li><strong>Model:</strong> {{ $product->model }}</li>
                <li><strong>Category:</strong> {{ $product->category->name ?? '-' }}</li>
                <li><strong>Country:</strong> {{ $product->country->name ?? '-' }}</li>
               <li><strong>Price:</strong>
                        @if ($product->discount_percent)
                            <span style="text-decoration: line-through; color: red;">
                                {{ number_format($product->converted_old_price, 2) }} {{ $product->viewer_currency }}
                            </span>
                            <span style="color: green; font-weight: bold;">
                                {{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }} (SALE!)
                            </span>
                        @else
                            <span style="font-weight: bold;">
                                {{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }}
                            </span>
                        @endif
                    </li>

                <li><strong>Stock:</strong> {{ $product->stock }}</li>
              
           @if(auth()->check())
            <form method="POST" action="{{ route('cart.addToCart', $product->id) }}">
                @csrf
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" required>
                <br><br>
                <button type="submit" style="padding: 8px 16px; background-color: #28a745; color: white; border: none; border-radius: 4px;">
                    Add to Cart 🛒
                </button>
            </form>
            @else
                <a href="{{ route('login') }}" onclick="alert('يجب تسجيل الدخول أولًا لإضافة المنتجات إلى السلة'); return true;">
                     <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" required>
                    <br><br>
                <button type="submit" style="padding: 8px 16px; background-color: #28a745; color: white; border: none; border-radius: 4px;">
                        Add to Cart 🛒
                    </button>
                </a>
            @endif


            <br>

            <div class="product-actions">
                @auth
                         @if (auth()->user()->role === 'admin' && auth()->user()->country_id === $product->country_id)
                        <a href="{{ route('product.edit', $product->id) }}" class="btn-edit">Edit</a>
                    @endif
                    
                @endauth
                
                <a href="{{ route('product.index') }}" class="btn-back">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
