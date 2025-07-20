@extends('layouts.app')

@section('content')
<div class="products-container">
        <div class="page-header">
        <h1 class="page-title gradient-text">Weapon Arsenal Inventory</h1>
        @if(auth()->check() && auth()->user()->role !== 'general')
        <div class="admin-actions">
            <a href="{{ route('product.create') }}" class="btn-main">
                <span class="btn-icon">+</span> Add New Product
            </a>
            <a href="{{ route('discounts.index') }}" class="btn-main btn-purple">
                <span class="btn-icon">%</span> Manage Discounts
            </a>
        </div>
        @endif
    </div>

    @if ($products->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">⚠️</div>
            <p class="empty-text">No weapons found in inventory.</p>
        </div>
    @else
        <div class="products-grid">
            @foreach ($products as $product)
                <div class="product-card glow-on-hover">
                    <div class="product-image-container">
                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image" loading = "lazy">
                        @else
                            <div class="no-image-placeholder">
                                <span class="placeholder-icon">🔫</span>
                                <span>No Image Available</span>
                            </div>
                        @endif
                        
                        @if($product->discount_percent)
                        <div class="discount-badge">
                            -{{ $product->discount_percent }}%
                        </div>
                        @endif

                        @if($product->is_banned)
                        <div class="banned-badge" style="position: absolute; top: 10px; right: 10px; background: red; color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                            🚫 BANNED
                        </div>
                        @endif
                    </div>

                    <div class="product-details">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        
                        <div class="product-specs">
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

                        <div class="product-pricing">
                            @if ($product->discount_percent)
                                <div class="original-price">
                                    {{ number_format($product->converted_price / (1 - $product->discount_percent / 100), 2) }} {{ $product->viewer_currency }}
                                </div>
                                <div class="discounted-price">
                                    {{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }}
                                    <span class="sale-badge">SALE!</span>
                                </div>
                            @else
                                <div class="current-price">
                                    {{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }}
                                </div>
                            @endif
                        </div>

                        <div class="stock-status {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            <span class="stock-count">({{ $product->stock }})</span>
                        </div>

                        <div class="product-actions">
                            <a href="{{ route('product.show', $product->id) }}" class="btn-action btn-view">
                                <span class="btn-icon">👁️</span> Details
                            </a>
                            
                            @auth
                                @if ( auth()->user()->role === 'ruler' || auth()->user()->role === 'admin' && auth()->user()->country_id === $product->country_id)
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn-action btn-edit">
                                        <span class="btn-icon">✏️</span> Edit
                                    </a>
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}" class="action-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this product?')" class="btn-action btn-delete">
                                            <span class="btn-icon">🗑️</span> Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                            
                            @if($product->is_banned)
                                <div style="color: red; font-weight: bold;">🚫 Cannot purchase banned product</div>
                            @else
                                @auth
                                    <form action="{{ route('cart.addToCart', $product->id) }}" method="POST" class="action-form">
                                        @csrf
                                        <button type="submit" class="btn-action btn-cart" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                            <span class="btn-icon">🛒</span> Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" onclick="alert('Please login first to add products to cart'); return true;" class="btn-action btn-cart">
                                        <span class="btn-icon">🛒</span> Add to Cart
                                    </a>
                                @endauth
                            @endif

                            @auth
                                @if(auth()->user()->role === 'ruler')
                                    <form method="POST" action="{{ route('products.toggleBan', $product->id) }}" class="action-form" style="margin-top: 5px;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-action" style="background-color: {{ $product->is_banned ? '#28a745' : '#dc3545' }}; color: white;">
                                            {{ $product->is_banned ? 'Unban' : 'Ban' }}
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
