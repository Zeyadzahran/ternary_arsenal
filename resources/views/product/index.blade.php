@extends('layouts.app')

@section('content')

<div class="products-grid">
    <h1 class="page-title">Weapon Arsenal Inventory</h1>
        <div style="text-align: center; margin: 20px 0;">
             @if(auth()->check() && auth()->user()->role === 'admin')
             <a href="{{ route('product.create') }}" class="btn-edit">Add New Product</a>
              <a href="{{ route('discounts.index') }}" class="btn-edit" style="margin-left: 10px;">Manage Discounts</a>
             @endif
        </div>

        {{-- @dd($products) --}}

    @if ($products->isEmpty())
        <p>No weapons found in inventory.</p>
    @else
        <div class="card-wrapper">
            @foreach ($products as $product)
                <div class="product-card">
                    @if ($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <div class="no-image-placeholder">No Image</div>
                    @endif

                    <div class="card-content">
                        <h3>{{ $product->name }}</h3>
                        <p><strong>Model:</strong> {{ $product->model }}</p>
                        <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
                        <p><strong>Country:</strong> {{ $product->country->name ?? '-' }}</p>
                       <p><strong>Price:</strong> 
                            @if ($product->discount_percent)
                    <span style="text-decoration: line-through; color: red;">
                        {{ number_format($product->converted_price / (1 - $product->discount_percent / 100), 2) }} {{ $product->viewer_currency }}
                    </span>
                    <span style="color: green; font-weight: bold;"> 
                        {{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }} (SALE!)
                    </span>
                                @else
                    <span style="font-weight: bold;">
                        {{ number_format($product->converted_price, 2) }} {{ $product->viewer_currency }}
                    </span>
                                      @endif
                        </p>

                        <p><strong>Stock:</strong> <span class="{{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">{{ $product->stock }}</span></p>

                        <div class="card-actions">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-view">View</a>
                           @auth
                                @if (auth()->user()->role === 'admin' && auth()->user()->country_id === $product->country_id)
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this product?')" class="btn btn-delete">Delete</button>
                                    </form>
                                @endif
                            @endauth
                                    @if(auth()->check())
                                        <form action="{{ route('cart.addToCart', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-buy">Add to Cart</button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" 
                                        onclick="alert('يجب تسجيل الدخول أولًا لإضافة المنتجات إلى السلة'); return true;">
                                            <button class="btn btn-buy">Add to Cart</button>
                                        </a>
                                    @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
