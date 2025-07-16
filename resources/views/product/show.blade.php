@extends('layouts.app')

@section('content')
<div class="product-detail-container">
    <div class="product-header">
        <a href="{{ route('product.index') }}" class="back-link">← Back to Products</a>
        <h1 class="product-title">{{ $product->name }}</h1>
    </div>

    @if(session('success'))
    <div class="alert-message success">
        {{ session('success') }}
    </div>
    @endif

    <div class="product-display">
        <div class="product-visual">
            @if($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="main-image">
            @else
                <div class="image-placeholder">
                    <span class="placeholder-icon">📷</span>
                    <span>No Image Available</span>
                </div>
            @endif
        </div>

        <div class="product-info">
            <div class="spec-grid">
                <div class="spec-item">
                    <span class="spec-label">Model:</span>
                    <span class="spec-value">{{ $product->model }}</span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Category:</span>
                    <span class="spec-value">{{ $product->category->name ?? '-' }}</span>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Country:</span>
                    <span class="spec-value">{{ $product->country->name ?? '-' }}</span>
                </div>
            </div>
            @if($product->description)
    <div class="product-description">
        <h2>Description</h2>
        <p>{{ $product->description }}</p>
    </div>
@endif


            <div class="price-display">
                <span class="price">{{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }}</span>
                @if($product->discount_percent)
                <span class="discount-tag">Save {{ $product->discount_percent }}%</span>
                @endif
            </div>
            

            <div class="availability {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                @if($product->stock > 0)
                <span class="stock-amount">({{ $product->stock }} available)</span>
                @endif
            </div>

            <div class="cart-actions">
                @if(auth()->check())
                <form method="POST" action="{{ route('cart.addToCart', $product->id) }}">
                    @csrf
                    <div class="quantity-control">
                        <label>Quantity:</label>
                        <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" required>
                    </div>
                    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
                @else
                <div class="quantity-control">
                    <label>Quantity:</label>
                    <input type="number" min="1" max="{{ $product->stock }}" value="1" disabled>
                </div>
                <a href="{{ route('login') }}" class="add-to-cart-btn" onclick="alert('Please login to add products to cart'); return true;">
                    Add to Cart
                </a>
                
                @endif
            </div>

            @auth
            @if(auth()->user()->role === 'admin' && auth()->user()->country_id === $product->country_id)
            <div class="admin-options">
                <a href="{{ route('product.edit', $product->id) }}" class="edit-link">Edit Product</a>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>
@endsection