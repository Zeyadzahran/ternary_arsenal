@extends('layouts.app')

@section('title', 'Add New Discount')

@section('content')
<main class="auth-container">
  <div class="auth-card animate-slide-up">
    <div class="auth-header">
      <h1 class="gradient-text">Add New Discount</h1>
      <p>Specify product, target country, and discount percent</p>
    </div>

    <form action="{{ route('discounts.store') }}" method="POST" class="auth-form">
      @csrf

      <div class="form-group">
        <label for="product_id" class="form-label">
          Product
        </label>
        <select name="product_id" id="product_id" required class="form-input">
          <option disabled selected>Select a product</option>
          @foreach($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
              {{ $product->name }} ({{ $product->country->name }})
            </option>
          @endforeach
        </select>
        @error('product_id')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="to_country_id" class="form-label">
          Target Country
        </label>
        <select name="to_country_id" id="to_country_id" required class="form-input">
          <option disabled selected>Select a country</option>
          @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ old('to_country_id') == $country->id ? 'selected' : '' }}>
              {{ $country->name }}
            </option>
          @endforeach
        </select>
        @error('to_country_id')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="discount_percent" class="form-label">
          Discount (%)
        </label>
        <input
          type="number"
          name="discount_percent"
          id="discount_percent"
          min="0"
          max="100"
          required
          class="form-input"
          placeholder="Enter discount percentage"
          value="{{ old('discount_percent') }}"
        >
        @error('discount_percent')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn-main btn-block">
        Save Discount
      </button>
    </form>
  </div>
</main>
@endsection
