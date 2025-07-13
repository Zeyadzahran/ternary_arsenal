@extends('layouts.app')

@section('content')
<div class="product-details-container">
    <h1 class="product-title">Product Details</h1>

    <div class="product-content">
        <div class="product-image">
            @if($imageUrl)
            
                <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="product-main-image">
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
                    @if ($product->discount && ($product->is_same_country || $product->is_same_team))
                        <span style="text-decoration: line-through; color: red;">
                            ${{ number_format($product->price, 2) }}
                        </span>
                        <span style="color: green; font-weight: bold;">
                            ${{ number_format($product->final_price, 2) }} (SALE!)
                        </span>
                    @else
                        <span style="font-weight: bold;">
                            ${{ number_format($product->price, 2) }}
                        </span>
                    @endif
                </li>

                <li><strong>Stock:</strong> {{ $product->stock }}</li>
                <li class="description-item"><strong>Description:</strong> {{ $product->description }}</li>
            </ul>

            <div class="product-actions">
                @auth
                    @if(Auth::user()->role == 'admin') 
                        <a href="{{ route('product.edit', $product->id) }}" class="btn-edit">Edit</a>
                    @endif
                @endauth
                <a href="{{ route('product.index') }}" class="btn-back">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
