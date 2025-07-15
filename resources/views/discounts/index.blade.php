@extends('layouts.app')

@section('title', 'Manage Discounts')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Discount Management</h1>

    @if(auth()->user()?->role === 'admin')
        {{-- Country filter for admins --}}
        <form method="GET" class="mb-4">
            <label for="country_id">Filter by Country:</label>
            <select name="country_id" onchange="this.form.submit()">
                <option value="">All</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </form>
    @endif

    <div class="mb-4">
        <a href="{{ route('discounts.create') }}" class="btn-edit">➕ Add New Discount</a>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Product</th>
                <th class="border px-4 py-2">Created By</th>
                <th class="border px-4 py-2">Target Country</th>
                <th class="border px-4 py-2">Discount %</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($discounts as $discount)
                <tr>
                    <td class="border px-4 py-2">{{ $discount->product->name }}</td>
                    <td class="border px-4 py-2">{{ $discount->fromCountry?->name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ $discount->toCountry?->name }}</td>
                    <td class="border px-4 py-2">{{ $discount->discount_percent }}%</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center p-4">No discounts found.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
