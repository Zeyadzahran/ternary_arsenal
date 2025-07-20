@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card animate-slide-up">
        <h2 class="gradient-text">Forgot Your Password?</h2>

        @if (session('status'))
            <div class="alert-message success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" name="email" class="form-input" required>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-main btn-block ripple">Send Reset Link</button>
        </form>
    </div>
</div>
@endsection
