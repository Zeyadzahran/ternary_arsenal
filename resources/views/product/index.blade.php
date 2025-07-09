{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<h1>All Products</h1>

<a href="{{ route('product.create') }}">Add New Product</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Model</th>
        <th>Category</th>
        <th>Country</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->model }}</td>
        <td>{{ $product->category->name ?? '-' }}</td>
        <td>{{ $product->country->name ?? '-' }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <a href="{{ route('product.show', $product->id) }}">View</a> |
            <a href="{{ route('product.edit', $product->id) }}">Edit</a> |
            <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Delete?')" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{-- @endsection --}}
