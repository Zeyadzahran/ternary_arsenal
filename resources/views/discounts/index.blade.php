@extends('layouts.app')

@section('title', 'Manage Discounts')

@section('content')
<div class="discount-management-container animate-slide-up">
    <h1 class="discount-title">Discount Management</h1>

    @if(auth()->user()?->role === 'admin')
        <form method="GET" class="discount-filter">
            <label for="country_id">Filter by Country:</label>
            <select name="country_id" id="country_id" onchange="this.form.submit()">
                <option value="">All Countries</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </form>
    @endif

    <div class="text-right">
        <a href="{{ route('discounts.create') }}" class="add-discount-btn">
            <i class="fas fa-plus"></i> Add New Discount
        </a>
    </div>

    <table class="discount-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>From Country</th>
                <th>Target Country</th>
                <th>Discount %</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($discounts as $discount)
                <tr>
                    <td>{{ $discount->product->name }}</td>
                    <td>{{ $discount->fromCountry?->name ?? 'Global' }}</td>
                    <td>{{ $discount->toCountry?->name }}</td>
                    <td>{{ $discount->discount_percent }}%</td>
                    <td>
                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        <i class="fas fa-tag fa-2x mb-3" style="color: var(--electric-purple);"></i>
                        <p>No discounts found.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection