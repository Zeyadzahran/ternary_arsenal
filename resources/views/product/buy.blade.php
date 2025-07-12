@extends('layouts.app')

@section('content')
<h1>Buy Product</h1>

<ul>
    <li><strong>Name:</strong> {{ $product->name }}</li>
    <li><strong>Model:</strong> {{ $product->model }}</li>
    <li><strong>Category:</strong> {{ $product->category->name ?? '-' }}</li>
    <li><strong>Country:</strong> {{ $product->country->name ?? '-' }}</li>
    <li><strong>Price:</strong> {{ $product->price }}</li>
    <li><strong>Stock:</strong> {{ $product->stock }}</li>
</ul>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('product.buy', $product->id) }}">
    @csrf
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" required>

    <br><br>
    <button type="submit">Buy Now</button>
</form>

<br>
<a href="{{ route('product.index') }}">Back to Products</a>
@endsection
