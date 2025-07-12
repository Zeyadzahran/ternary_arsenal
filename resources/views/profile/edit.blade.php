@extends('layouts.app')

@section('content')
<h2>Edit Profile</h2>

<form method="POST" action="/profile/update">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ auth()->user()->name }}">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ auth()->user()->email }}">
    </div>

    <div>
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" required>
    </div>

    <div>
        <label for="password">New Password</label>
        <input type="password" name="password">
    </div>

    <div>
        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">Save Changes</button>

</form>


    <form action="/profile/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Delete Account
        </button>
    </form>
@endsection
