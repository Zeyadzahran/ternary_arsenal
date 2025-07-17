@extends('layouts.app')

@section('content')
<main class="auth-container">
  <div class="auth-card animate-slide-up">

    <div class="auth-header">
      <h1 class="gradient-text">Send Stock Report</h1>
      <p>Fill in the details to email your report</p>
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
        <polyline points="7 10 12 15 17 10"></polyline>
        <line x1="12" y1="15" x2="12" y2="3"></line>
      </svg>
    </div>

    @if(session('success'))
      <div class="alert-message success">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
          <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        {{ session('success') }}
      </div>
    @elseif(session('error'))
      <div class="alert-message error">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="12" y1="8" x2="12" y2="12"></line>
          <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('report.send') }}" class="auth-form">
      @csrf

      <div class="form-group">
        <label for="name" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          Your Name
        </label>
        <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name" required>
        @error('name')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="email" class="form-label">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
          Recipient Email
        </label>
        <input type="email" id="email" name="email" class="form-input" placeholder="Enter recipient email" required>
        @error('email')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn-main btn-block ripple">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"></line>
          <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
        </svg>
        Send Report
      </button>
    </form>

  </div>
</main>
@endsection
