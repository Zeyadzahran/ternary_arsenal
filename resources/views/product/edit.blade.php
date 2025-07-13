@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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

    @if(isset($imageUrl))
        <p>Current Image:</p>
        <img src="{{ $imageUrl }}" alt="Current Image" style="max-width: 150px;"><br>
    @endif

    <label for="image">Change Product Image:</label>
    <div style="border: 2px dashed #aaa; padding: 20px; margin: 10px 0;">
        <input type="file" name="image" accept="image/*" style="border: none;" />
    </div>

   <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

    <label>Discounted Price (optional):</label>
    <input type="number" name="discounted_price" step="0.01" 
           value="{{ optional($product->discount)->discounted_price }}"><br>

    <button type="submit">Update</button>
</form>
@endsection
