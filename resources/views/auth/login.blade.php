<!DOCTYPE html>
<html lang="en">
<head>

   @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Your E-Commerce Site</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Mono:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-circuit">
  <div class="animated-bg">
    <div id="particles-js"></div>
  </div>

  <main class="auth-container">
    <div class="auth-card animate-slide-up">
      <div class="auth-header">
        <h1 class="gradient-text">Welcome Back</h1>
        <p>Login to your electric account</p>
      </div>

      @if(session('success'))
        <div class="alert-message success">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </svg>
          {{ session('success') }}
        </div>
      @endif

      @if(request('redirect_reason') === 'buy'))
        <div class="alert-message">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          Please login first to buy a product
        </div>
      @endif

      <form method="POST" action="/login" class="auth-form">
        @csrf

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

        <button type="submit" class="btn-main btn-block">Log In</button>

        <div class="auth-footer">
          Don't have an account? <a href="/register" class="auth-link">Register</a>
        </div>
      </form>
    </div>
  </main>

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>