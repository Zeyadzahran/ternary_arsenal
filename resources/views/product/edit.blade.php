@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('product.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required><br>

    <label>Model:</label>
    <input type="text" name="model" value="{{ $product->model }}" required><br>

    <label>Category:</label>
    <select name="category_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>

    <label>Country:</label>
    <select name="country_id" required>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}" @if ($product->country_id == $country->id) selected @endif>
                {{ $country->name }}
            </option>
        @endforeach
    </select><br>

    <label>Price:</label>
    <input type="number" name="price" value="{{ $product->price }}" step="0.01" required><br>

    <label>Stock:</label>
    <input type="number" name="stock" value="{{ $product->stock }}"><br>

    <label>Path:</label>
    <input type="text" name="path" value="{{ $product->path }}" required><br>

    <button type="submit">Update</button>
</form>
@endsection
