<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ternary Arsenal</title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #1a0000;
        color: white;
    }

    nav {
        background-color: #330000;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-left a {
        margin-right: 15px;
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .nav-right a,
    .nav-right button {
        text-decoration: none;
        color: white;
        background: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
    }

    .nav-right form {
        margin: 0;
    }
</style>
</head>

<body>

@auth
    <nav>
    <div class="nav-left">
        <a href="/home">Home</a>
        <a href="/product">Products</a>
        <a href="/inventory">Inventory</a>
    </div>

    <div class="nav-right">
        <a href="/profile">Profile</a>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
</nav>
@endauth

    @yield('content')

</body>

</html>
