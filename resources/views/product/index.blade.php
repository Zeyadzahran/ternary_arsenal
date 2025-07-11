@extends('layouts.app')

@section('content')
    <div class="products-container">
        <h1 class="page-title">Weapon Arsenal Inventory</h1>
        
        <div id="search-info" class="search-info"></div>
        
        <div id="no-results" class="no-results">
            <p>No weapons found in inventory. Please adjust your search parameters.</p>
        </div>

        <div class="table-container">
            <table id="product-table" class="military-table">
                <thead>
                    <tr>
                        <th>Weapon Name</th>
                        <th>Model</th>
                        <th>Category</th>
                        <th>Country</th>
                        <th>Price ($)</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="weapon-row">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->model }}</td>
                        <td>
                            <span class="category-tag">{{ $product->category->name ?? '-' }}</span>
                        </td>
                        <td>
                            <span class="country-flag" data-country="{{ strtolower($product->country->code ?? '') }}">
                                {{ $product->country->name ?? '-' }}
                            </span>
                        </td>
                        <td class="price">{{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="stock-badge {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="actions">
                            <a href="{{ route('product.show', $product->id) }}" class="action-btn view-btn">
                                <i class="fas fa-eye"></i>Show
                            </a>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('product.edit', $product->id) }}" class="action-btn edit-btn">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" onclick="return confirm('Destroy this weapon from inventory?')">
                                            <i class="fas fa-trash"></i>Destroy
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('product.buy', $product->id) }}" class="action-btn buy-btn">
                                    <i class="fas fa-shopping-cart"></i> Buy
                                </a>
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
document.getElementById('live-search').addEventListener('keyup', function () {
    const query = this.value;
    const category = '{{ request()->category ?? '' }}';

    fetch(`/product/live-search?query=${query}&category=${category}`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#product-table tbody');
            const noResults = document.getElementById('no-results');
            const info = document.getElementById('search-info');
            tbody.innerHTML = '';
            
            if (query.length > 0) {
                info.textContent = `Showing results for: "${query}"`;
                info.style.display = 'block';
            } else {
                info.style.display = 'none';
            }

            if (data.length === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
                data.forEach(product => {
                    tbody.innerHTML += `
                        <tr class="weapon-row">
                            <td>${product.name}</td>
                            <td>${product.model}</td>
                            <td><span class="category-tag">${product.category}</span></td>
                            <td><span class="country-flag" data-country="${product.country ? product.country.toLowerCase() : ''}">${product.country}</span></td>
                            <td class="price">${parseFloat(product.price).toFixed(2)}</td>
                            <td><span class="stock-badge ${product.stock > 0 ? 'in-stock' : 'out-of-stock'}">${product.stock}</span></td>
                            <td class="actions">
                                <a href="/product/${product.id}" class="action-btn view-btn"><i class="fas fa-eye"></i> Inspect</a>
                                ${product.actions ?? ''}
                            </td>
                        </tr>
                    `;
                });
            }
        });
});
</script>
@endsection