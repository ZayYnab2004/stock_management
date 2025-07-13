<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // عرض قائمة المنتجات
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // عرض نموذج إضافة منتج جديد
    public function create()
    {
        return view('products.create');
    }

    // تخزين المنتج الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'required|unique:product,barcode',  // لأن جدولك اسمه product مفرد
            'unit_price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer',
            'expiration_date' => 'nullable|date',
            'status' => 'required|in:active,inactive,discontinued',
        ]);

        Product::create([
            'business_id' => auth()->user()->business_id ?? 'demo-business-id',
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'name' => $request->name,
            'barcode' => $request->barcode,
            'unit_price' => $request->unit_price,
            'cost_price' => $request->cost_price,
            'description' => $request->description,
            'expiration_date' => $request->expiration_date,
            'quantity_in_stock' => $request->quantity_in_stock,
            'minimum_stock_threshold' => $request->minimum_stock_threshold,
            'tax_rate' => $request->tax_rate,
            'status' => $request->status,
        ]);

        return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }
}
