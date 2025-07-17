@extends('layouts.app')

@section('content')
<main class="auth-container">
  <div class="auth-card animate-slide-up">

    <div class="auth-header">
      <h1 class="gradient-text">Edit Profile</h1>
      <p>Update your details and change your password</p>
    </div>

    <a href="{{ route('profile.show') }}" class="back-link mb-4 inline-flex items-center gap-1 text-electric-blue">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
      </svg>
      Back to Profile
    </a>

    <form method="POST" action="{{ route('profile.update') }}" class="auth-form">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
          </svg>
          Name
        </label>
        <input type="text" name="name" id="name" class="form-input" value="{{ auth()->user()->name }}" required>
        @error('name')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="email" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
          </svg>
          Email
        </label>
        <input type="email" name="email" id="email" class="form-input" value="{{ auth()->user()->email }}" required>
        @error('email')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="current_password" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
          </svg>
          Current Password
        </label>
        <input type="password" name="current_password" id="current_password" class="form-input" required>
        @error('current_password')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="password" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l3.5-3.5L1.17 6.17l1.42-1.41 3.54 3.53L10 4l.257.257A6 6 0 0118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
          </svg>
          New Password
        </label>
        <input type="password" name="password" id="password" class="form-input">
        <small class="form-hint">Leave blank to keep current password</small>
        @error('password')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
          Confirm New Password
        </label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
      </div>

      <button type="submit" class="btn-main btn-block ripple">
        Save Changes
      </button>
    </form>

    {{-- Danger Zone (outside the form) --}}
    <div class="danger-zone mt-10">
      <h3 class="text-danger flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
          <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
        Danger Zone
      </h3>

      <form action="{{ route('profile.destroy') }}" method="POST" class="delete-form mt-4" onsubmit="return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone.');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-main btn-delete">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
          Delete Account
        </button>
      </form>
    </div>

  </div>
</main>
@endsection
