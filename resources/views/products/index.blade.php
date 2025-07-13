<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Products List</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #0D65D2; color: white; }
    </style>
</head>
<body>
    <h2>Products List</h2>

    <a href="{{ route('products.create') }}">➕ Add New Product</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Barcode</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ number_format($product->unit_price, 2) }}</td>
                    <td>{{ $product->quantity_in_stock }}</td>
                    <td>{{ ucfirst($product->status) }}</td>
                </tr>
            @empty
                <tr><td colspan="5">No products found.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
