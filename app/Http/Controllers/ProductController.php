<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('create_product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'required|string|unique:products,barcode',
            'unit_price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer',
        ]);

        Product::create([
            'product_id' => Str::uuid(),
            'name' => $request->name,
            'barcode' => $request->barcode,
            'unit_price' => $request->unit_price,
            'cost_price' => $request->cost_price,
            'description' => $request->description,
            'quantity_in_stock' => $request->quantity_in_stock,
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('products.index')->with('success', 'تمت إضافة المنتج بنجاح.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'required|string|unique:products,barcode,' . $id . ',product_id',
            'unit_price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer',
        ]);

        $product->update([
            'name' => $request->name,
            'barcode' => $request->barcode,
            'unit_price' => $request->unit_price,
            'cost_price' => $request->cost_price,
            'description' => $request->description,
            'quantity_in_stock' => $request->quantity_in_stock,
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('products.index')->with('success', 'تم تعديل المنتج بنجاح.');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'تم حذف المنتج.');
    }
}
