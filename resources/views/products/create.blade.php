<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        form { background: #fff; padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #0D65D2;
            color: white;
            padding: 10px 15px;
            margin-top: 15px;
            border: none;
            cursor: pointer;
        }
        .error { color: red; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">➕ Add New Product</h2>

    @if (session('success'))
        <p style="color: green; text-align: center;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="error" style="max-width: 600px; margin: auto;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Product Name" value="{{ old('name') }}" required>
        <input type="text" name="barcode" placeholder="Barcode" value="{{ old('barcode') }}" required>
        <input type="number" step="0.01" name="unit_price" placeholder="Unit Price" value="{{ old('unit_price') }}" required>
        <input type="number" step="0.01" name="cost_price" placeholder="Cost Price" value="{{ old('cost_price') }}">
        <input type="text" name="category_id" placeholder="Category ID" value="{{ old('category_id') }}">
        <input type="text" name="supplier_id" placeholder="Supplier ID" value="{{ old('supplier_id') }}">
        <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
        <input type="date" name="expiration_date" value="{{ old('expiration_date') }}">
        <input type="number" name="quantity_in_stock" placeholder="Quantity In Stock" value="{{ old('quantity_in_stock') }}" required>
        <input type="number" name="minimum_stock_threshold" placeholder="Minimum Stock Threshold" value="{{ old('minimum_stock_threshold') }}">
        <input type="number" step="0.01" name="tax_rate" placeholder="Tax Rate" value="{{ old('tax_rate') }}">

        <select name="status" required>
            <option value="">Select Status</option>
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            <option value="discontinued" {{ old('status') == 'discontinued' ? 'selected' : '' }}>Discontinued</option>
        </select>

        <button type="submit">✅ Save Product</button>
    </form>
</body>
</html>
