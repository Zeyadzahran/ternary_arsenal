{{-- @extends('layouts.app')

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


    <button type="submit">Update</button>
</form>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="product-form-container animate-slide-up">
        <div class="text-center">
             <h1 class="product-form-title gradient-text"">Edit Product</h1>
        </div>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">
                Name:
            </label>
            <input type="text" name="name" class="form-input" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                Model:
            </label>
            <input type="text" name="model" value="{{ $product->model }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                Category:
            </label>
            <select name="category_id" class="form-select"  required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id)  selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">
                Country:
            </label>
            <select name="country_id" class="form-select" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($product->country_id == $country->id) selected @endif>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">
                Price:
            </label>
            <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="form-input" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                Stock:
            </label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-input">
        </div>

        @if(isset($imageUrl))
            <div class="form-group">
                <label class="form-label">
                    Current Image:
                </label>
                <img src="{{ $imageUrl }}" alt="Current Image" class="image-preview">
            </div>
        @endif

      <div class="form-group">
    <label class="form-label">Change Product Image</label>

    <div class="custom-upload-box" onclick="document.getElementById('image').click();">
        <span id="upload-text">Click here to choose image</span>
    </div>

    <input id="image" type="file" name="image" accept="image/*" style="display: none;" onchange="showFileName(this)">

    <p id="file-name" style="margin-top: 10px; font-style: italic;"></p>
    <img id="image-preview" style="max-width: 150px; margin-top: 10px; display: none;" />
</div>


<div class="form-group">
    <label class="form-label">
        Description:
    </label>
    <textarea name="description" class="form-textarea">{{ $product->description }}</textarea>
</div>

<button type="submit" class="btn-update">
    Update Product
</button>
</form>
</div>
    <style>
    .custom-upload-box {
        border: 2px dashed #aaa;
        padding: 20px;
        text-align: center;
        color: #777;
        cursor: pointer;
        border-radius: 10px;
        transition: 0.3s;
    }
    
    .custom-upload-box:hover {
        background-color: #f9f9f9;
        border-color: #555;
        color: #000;
    }
    </style>
    <script>
    function showFileName(input) {
        const fileName = input.files[0]?.name;
        document.getElementById('file-name').textContent = fileName ? `Selected: ${fileName}` : '';
    }
</script>
            
@endsection