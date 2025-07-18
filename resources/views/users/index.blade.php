@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
    <div class="users-management-container animate-slide-up">
        <h2 class="users-title">Users</h2>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="users-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>

                    <th>Country</th>
                    <th>Change Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if($user->role !== 'ruler')
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->country->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.updateRole', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-role">
                                    {{ $user->role === 'admin' ? 'Remove Admin' : 'Make Admin' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection