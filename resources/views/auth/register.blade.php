<!DOCTYPE html>
<html lang="en">
<head>
   @extends('layouts.app')
  

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Your E-Commerce Site</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Mono:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-circuit">
 

  <main class="auth-container">
    <div class="auth-card animate-slide-up">
      <div class="auth-header">
        <h1 class="gradient-text">Create Account</h1>
        <p>Join our electric community</p>
      </div>

      <form method="POST" action="/register" class="auth-form">
        @csrf

      

        <div class="form-group">
          <label for="email" class="form-label">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Your Name
          </label>
          <input type="name" id="name" name="name" class="form-input" required value="{{ old('name') }}">
          @error('name')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="form-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
            </svg>
            Email Address
          </label>
          <input type="email" id="email" name="email" class="form-input" required value="{{ old('email') }}">
          @error('email')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password" class="form-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
            </svg>
            Password
          </label>
          <input type="password" id="password" name="password" class="form-input" required>
          @error('password')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="password_confirmation" class="form-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
            </svg>
            Confirm Password
          </label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
        </div>

        <div class="form-group">
          <label for="country" class="form-label">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
              <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            Country
          </label>
          <select id="country" name="country" class="form-input" required>
            <option value="">Select your country</option>
            @foreach($countries as $country)
              <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
            @endforeach
          </select>
          @error('country')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn-main btn-block">Register</button>

        <div class="auth-footer">
          Already have an account? <a href="/login" class="auth-link">Log in</a>
        </div>
      </form>
    </div>
  </main>

</body>
</html>