@extends('layouts.app')

@section('content')


<div class="profile-container">
    <h1 class="profile-header">My Profile</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-card">
        <div class="profile-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Country:</strong> {{ $user->country->name ?? 'Not Set' }}</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('profile.edit') }}" class="btn btn-edit">
                Edit Profile
            </a>

            <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
</div>
@endsection