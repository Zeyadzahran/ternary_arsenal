@extends('layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role !== 'general')
<main class="auth-container">
  <div class="auth-card animate-slide-up">
    <div class="auth-header">
      <h1 class="gradient-text">Add New Product</h1>
      <p>Enter all the details below</p>
    </div>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="auth-form">
      @csrf

      <div class="form-group">
        <label class="form-label">
          Product Name
        </label>
        <input type="text" name="name" class="form-input" required placeholder="Enter product name" value="{{ old('name') }}">
        @error('name')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Model
        </label>
        <input type="text" name="model" class="form-input" required placeholder="Enter model number" value="{{ old('model') }}">
        @error('model')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Category
        </label>
        <select name="category_id" class="form-input" required>
          <option value="" disabled selected>Select a category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
        @error('category_id')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Country of Origin
        </label>
        <select name="country_id" class="form-input" required>
          <option value="" disabled selected>Select a country</option>
          @foreach ($countries as $country)
            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
              {{ $country->name }}
            </option>
          @endforeach
        </select>
        @error('country_id')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Price ($)
        </label>
        <input type="number" name="price" step="0.01" class="form-input" required placeholder="0.00" value="{{ old('price') }}">
        @error('price')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Stock Quantity
        </label>
        <input type="number" name="stock" class="form-input" placeholder="0" value="{{ old('stock', 0) }}">
        @error('stock')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Description
        </label>
        <textarea name="description" class="form-input" rows="3" placeholder="Enter product description...">{{ old('description') }}</textarea>
        @error('description')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label class="form-label">
          Product Image
        </label>
        <input type="file" name="image" class="form-input" accept="image/*" required>
        @error('image')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn-main btn-block">Create Product</button>
    </form>
  </div>
</main>
@endif
@endsection
