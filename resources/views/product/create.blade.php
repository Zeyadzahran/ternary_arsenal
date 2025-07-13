@extends('layouts.app')

@section('content') 
@if(auth()->check() && auth()->user()->role === 'admin')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Add New Product</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Model:</label>
            <input type="text" name="model" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category:</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Country:</label>
            <select name="country_id" class="form-select" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price:</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock:</label>
            <input type="number" name="stock" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter product details..."></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image:</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Discounted Price (optional):</label>
            <input type="number" name="discounted_price" class="form-control" step="0.01">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Create</button>
        </div>
    </form>
</div>
@endif
@endsection
