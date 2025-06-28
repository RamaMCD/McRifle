<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1|max:999999',
            'category_id' => 'required',
            'sku' => 'nullable|string|max:100',
            'weight' => 'nullable|numeric|min:0',
        ]);

        // Handle kategori spesial
        $kategoriInput = $validated['category_id'];
        if (!is_numeric($kategoriInput)) {
            // Untuk 'accessory' atau string lain, cari/buat kategori
            $category = \App\Models\Category::firstOrCreate([
                'name' => ucfirst($kategoriInput),
            ], [
                'status' => true
            ]);
            $validated['category_id'] = $category->id;
        }

        // Tambahkan slug otomatis
        $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::active()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'nullable|string|max:100',
            'weight' => 'nullable|numeric|min:0',
        ]);
        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
} 