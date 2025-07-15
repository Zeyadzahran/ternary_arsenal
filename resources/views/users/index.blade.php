@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-4">Users from {{ auth()->user()->country->name }}</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered w-75 mx-auto">
        <thead>
        <tr class="table-dark">
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Country</th>
            <th>Change Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->country->name }}</td>
                <td>
                    <form method="POST" action="{{ route('users.updateRole', $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-warning">
                            {{ $user->role === 'admin' ? 'Remove Admin' : 'Make Admin' }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

    </table>
@endsection
