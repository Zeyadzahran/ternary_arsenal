@extends('layouts.navbar') 

@section('content') 

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            background-color: #1a0000;
            background-image: url("https://res.cloudinary.com/dtjflvikd/image/upload/v1751929713/War-Torn_Battlefield_Under_Fiery_Skies_rmkck1.png");
            color: white;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
        }

        .product-card {
            background-color: #552222;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 10px rgba(255, 80, 80, 0.4);
        }

        .product-card img {
            width: 100%;
            max-height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-card h3 {
            margin: 15px 0 10px;
            color: #ffd4d4;
        }

        .product-card p {
            margin: 0;
            color: #ff9999;
        }

        .product-card button {
            margin-top: 10px;
            background-color: #ff3300;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        .product-card button:hover {
            background-color: #ff6600;
            color: black;
        }
    </style>
</head>
<body>

    <div class="products">
        <!-- Example Products -->
        <div class="product-card">
            <img src="https://via.placeholder.com/300x200.png?text=Weapon+1" alt="Product 1">
            <h3>Laser Rifle</h3>
            <p>$99.99</p>
            <button>Buy</button>
        </div>

        <div class="product-card">
            <img src="https://via.placeholder.com/300x200.png?text=Shield" alt="Product 2">
            <h3>Energy Shield</h3>
            <p>$79.99</p>
            <button>Buy</button>
        </div>

    </div>
</body>
</html>
@endsection