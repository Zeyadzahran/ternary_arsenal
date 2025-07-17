@extends('layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')
<div class="product-form-container animate-slide-up">
    <div class="text-center">
        <h2 class="product-form-title gradient-text">Add New Product</h2>
    </div>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf

        <div class="form-group">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label class="form-label">Model</label>
            <input type="text" name="model" class="form-control" required placeholder="Enter model number">
        </div>

        <div class="form-group">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Country of Origin</label>
            <select name="country_id" class="form-select" required>
                <option value="" disabled selected>Select a country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Price ($)</label>
            <input type="number" name="price" class="form-control" step="0.01" required placeholder="0.00">
        </div>

        <div class="form-group">
            <label class="form-label">Stock Quantity</label>
            <input type="number" name="stock" class="form-control" value="0" placeholder="0">
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter detailed product description..."></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="form-submit-group">
            <button type="submit" class="btn-submit-product">
                Create Product
            </button>
        </div>
    </form>
</div>
@endif
@endsection