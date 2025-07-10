@extends('layouts.navbar')

@section('content')
<h2>Edit Profile</h2>

<form method="POST" action="{{ route('profile.update') }}">
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
@endsection
