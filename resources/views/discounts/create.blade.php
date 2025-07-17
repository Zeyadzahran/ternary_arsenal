@extends('layouts.app')

@section('title', 'Add New Discount')

@section('content')
<div class="discount-form-container animate-slide-up">
    <h1 class="discount-form-title">Add New Discount</h1>

    <form action="{{ route('discounts.store') }}" method="POST">
        @csrf

        <div class="discount-form-group">
            <label for="product_id" class="discount-form-label">
                <i class="fas fa-box"></i> Product
            </label>
            <select name="product_id" id="product_id" required class="discount-form-select">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} ({{ $product->country->name }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="discount-form-group">
            <label for="to_country_id" class="discount-form-label">
                <i class="fas fa-globe"></i> Target Country
            </label>
            <select name="to_country_id" id="to_country_id" required class="discount-form-select">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="discount-form-group">
            <label for="discount_percent" class="discount-form-label">
                <i class="fas fa-percentage"></i> Discount (%)
            </label>
            <input
                type="number"
                name="discount_percent"
                id="discount_percent"
                min="0"
                max="100"
                required
                class="discount-form-input"
                placeholder="Enter discount percentage"
            >
        </div>

        <button type="submit" class="discount-submit-btn">
            <i class="fas fa-save"></i> Save Discount
        </button>
    </form>
</div>
@endsection