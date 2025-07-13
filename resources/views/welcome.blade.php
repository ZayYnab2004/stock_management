<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to StockPro</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            color: #00214D;
            text-align: center;
            padding-top: 100px;
        }
        h1 {
            color: #0D65D2;
            font-size: 48px;
        }
        p {
            font-size: 18px;
            margin-bottom: 40px;
        }
        a button {
            background-color: #0D65D2;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        a button:hover {
            background-color: #00214D;
        }
    </style>
</head>
<body>

    <h1>📦 Welcome to StockPro</h1>
    <p>Manage your inventory with ease and precision.</p>

    <a href="{{ route('products.create') }}">
        <button>➕ Add New Product</button>
    </a>

</body>
</html>
