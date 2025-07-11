@extends('layouts.app')

@section('content')
<h1>Product Details</h1>

<ul>
    <li><strong>Name:</strong> {{ $product->name }}</li>
    <li><strong>Model:</strong> {{ $product->model }}</li>
    <li><strong>Category:</strong> {{ $product->category->name ?? '-' }}</li>
    <li><strong>Country:</strong> {{ $product->country->name ?? '-' }}</li>
    <li><strong>Price:</strong> {{ $product->price }}</li>
    <li><strong>Stock:</strong> {{ $product->stock }}</li>
    <li><strong>Path:</strong> {{ $product->path }}</li>
</ul>

@auth
    @if(Auth::user()->role == 'admin') 
    <a href="{{ route('product.edit', $product->id) }}">Edit</a>
    @endif
@endauth
<a href="{{ route('product.index') }}">Back to List</a>
@endsection
