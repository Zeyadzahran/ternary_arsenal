<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
  body {
    background-color: #1a0000;
    background-image: url("https://res.cloudinary.com/dtjflvikd/image/upload/v1751929713/War-Torn_Battlefield_Under_Fiery_Skies_rmkck1.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .form-box {
    background-color: rgba(111, 45, 29, 0.39);
    padding: 40px;
    border-radius: 20px;
    width: 100%;
    max-width: 500px;
    box-shadow: 0 0 20px rgba(255, 60, 0, 0.3);
    backdrop-filter: blur(4px);
    color: #ffdddd;
  }

  .form-box h2 {
    text-align: center;
    color: #ff4d4d;
    font-size: 2rem;
    margin-bottom: 30px;
    letter-spacing: 2px;
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-size: 0.95rem;
    color: #ffbbbb;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  input, select {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    background-color:rgb(58, 43, 43);
    color: #ffffff;
    border: 1px solid #ff3333;
    border-radius: 8px;
    font-size: 1rem;
  }

  input:focus, select:focus {
    outline: none;
    box-shadow: 0 0 5px #ff4d4d;
    border-color: #ff4d4d;
  }

  button {
    width: 100%;
    padding: 14px;
    font-size: 1rem;
    font-weight: bold;
    text-transform: uppercase;
    background: linear-gradient(to right, #990000, #ff3300);
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 0 10px rgba(255, 50, 0, 0.6);
  }

  button:hover {
    background: linear-gradient(to right, #ff1a1a, #ff6600);
    color: #000;
  }
  .error {
    color:rgb(15, 1, 1);
    font-weight: bold;
    font-size: 1rem;
    margin-top: 2px;
  }
  .no-account {
  text-align: center;
  font-size: 1.05rem;
  margin-top: 25px;
  color: #ddd;
  font-family: 'Segoe UI', sans-serif;
}

.no-account a {
  color:rgb(255, 180, 68);
  text-decoration: none;
  font-weight: bold;
  margin-left: 5px;
  transition: color 0.3s ease;
}

.no-account a:hover {
  color:rgb(197, 157, 113);
}
</style>
</head>
<body>
    <div class="form-box">
    <h2>Login</h2>
    <form method="POST" action="/login">
      @csrf

      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
      @error('email')
        <p class="error">{{ $message }}</p>
      @enderror
      <input type="password" name="password" placeholder="Password">
      @error('password')
        <p class="error">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn">Log In</button>
    </form>
    <div class="no-account">
      Don't have an account ? 
      <a href="/register"> Register </a>
    </div>
  </div>
  

</body>
</html>
