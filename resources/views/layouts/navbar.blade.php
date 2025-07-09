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
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav>
        <div>
            <a href="/home">Home</a>
            <a href="/products">Products</a>
            <a href="/inventory">Inventory</a>
        </div>
        <form method  = "POST" action = "logout">
            @csrf
            <button>log out </button>
        </form>
    </nav>

</body>

</html>
