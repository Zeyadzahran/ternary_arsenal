@extends('layouts.app')

@section('title', 'Add New Discount')

@section('content')
    <h1 class="text-xl font-bold mb-4">Add New Discount</h1>

    <form action="{{ route('discounts.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="product_id" class="block">Product</label>
            <select name="product_id" required class="form-select w-full">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->country->name }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="country_id" class="block">Country</label>
            <select name="country_id" required class="form-select w-full">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="discount_percent" class="block">Discount (%)</label>
            <input type="number" name="discount_percent" min="0" max="100" required class="form-input w-full">
        </div>

        <button type="submit" class="btn-edit">Save Discount</button>
    </form>
@endsection
