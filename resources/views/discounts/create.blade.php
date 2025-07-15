@extends('layouts.app')

@section('title', 'Add New Discount')

@section('content')
    <h1 class="text-xl font-bold mb-4">Add New Discount</h1>

    <form action="{{ route('discounts.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="product_id" class="block font-semibold">Product</label>
            <select name="product_id" id="product_id" required class="form-select w-full mt-1">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} ({{ $product->country->name }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="to_country_id" class="block font-semibold">Target Country</label>
            <select name="to_country_id" id="to_country_id" required class="form-select w-full mt-1">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="discount_percent" class="block font-semibold">Discount (%)</label>
            <input
                type="number"
                name="discount_percent"
                id="discount_percent"
                min="0"
                max="100"
                required
                class="form-input w-full mt-1"
            >
        </div>

        <button type="submit" class="btn-edit">💾 Save Discount</button>
    </form>
@endsection
