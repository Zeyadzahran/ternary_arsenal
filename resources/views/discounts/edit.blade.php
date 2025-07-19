@extends('layouts.app')

@section('content')
<div class="product-form-container animate-slide-up">
    <div class="text-center">
        <h1 class="product-form-title gradient-text">Edit Discount</h1>
    </div>

    <form action="{{ route('discounts.update', $discount->id) }}" method="POST" class="product-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Product:</label>
            <select name="product_id" class="form-select" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $discount->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">To Country:</label>
            <select name="to_country_id" class="form-select" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $discount->to_country_id == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Discount %:</label>
            <input type="number" name="discount_percent" value="{{ $discount->discount_percent }}" min="0" max="100" class="form-input">
        </div>

        <button type="submit" class="btn-update">
            Update Discount
        </button>
    </form>
</div>
@endsection
