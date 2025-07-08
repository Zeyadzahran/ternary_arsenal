<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>

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
</style>

<div class="form-box">
  <h2>Register</h2>
  <form method="POST" action="/register">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="password_confirmation">Re-enter Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <label for="country">Country</label>
    <select id="country" name="country" required>
      <option value="">Select your country</option>
      <option value="germany">Germany</option>
      <option value="italy">Italy</option>
      <option value="japan">Japan</option>
      <option value="hungary">Hungary</option>
      <option value="romania">Romania</option>
      <option value="bulgaria">Bulgaria</option>
      <option value="uk">United Kingdom</option>
      <option value="usa">USA</option>
      <option value="ussr">Soviet Union</option>
      <option value="france">France</option>
      <option value="china">China</option>
      <option value="canada">Canada</option>
      <option value="australia">Australia</option>
      <option value="new-zealand">New Zealand</option>
      <option value="india">India</option>
      <option value="switzerland">Switzerland</option>
      <option value="sweden">Sweden</option>
      <option value="spain">Spain</option>
      <option value="portugal">Portugal</option>
      <option value="turkey">Turkey</option>

    </select>

    <button type="submit">Register</button>
  </form>
</div>
