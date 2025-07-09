@extends('layouts.navbar')

@section('content') 
<h1>Add Product</h1>

<form action="{{ route('product.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Model:</label>
    <input type="text" name="model" required><br>

    <label>Category:</label>
    <select name="category_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>

    <label>Country:</label>
    <select name="country_id" required>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" required><br>

    <label>Stock:</label>
    <input type="number" name="stock" value="0"><br>

    <label>Path:</label>
    <input type="text" name="path" required><br>

    <button type="submit">Create</button>
</form>
@endsection
