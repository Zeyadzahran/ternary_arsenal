@extends('layouts.app')

@section('content')
<div class="products-grid">
    <h1 class="page-title">Weapon Arsenal Inventory</h1>

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
                        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p><strong>Stock:</strong> <span class="{{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">{{ $product->stock }}</span></p>

                        <div class="card-actions">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-view">View</a>
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this product?')" class="btn btn-delete">Delete</button>
                                    </form>
                                @endif
                                <a href="{{ route('product.buy', $product->id) }}" class="btn btn-buy">Buy</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
