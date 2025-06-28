<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->active();

        // Filter by category (multi-select dan nama)
        if ($request->has('category')) {
            $catInput = $request->category;
            $catIds = [];
            if (is_array($catInput)) {
                foreach ($catInput as $cat) {
                    if (is_numeric($cat)) {
                        $catIds[] = $cat;
                    } else {
                        $catModel = \App\Models\Category::whereRaw('LOWER(name) = ?', [strtolower($cat)])->first();
                        if ($catModel) $catIds[] = $catModel->id;
                    }
                }
                if (count($catIds)) {
                    $query->whereIn('category_id', $catIds);
                }
            } else {
                if (is_numeric($catInput)) {
                    $query->where('category_id', $catInput);
                } else {
                    $catModel = \App\Models\Category::whereRaw('LOWER(name) = ?', [strtolower($catInput)])->first();
                    if ($catModel) $query->where('category_id', $catModel->id);
                }
            }
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sort products
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12);
        $categories = Category::active()->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->active()
            ->paginate(12);

        return view('products.search', compact('products', 'query'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'sku' => 'nullable|string|max:100',
            'weight' => 'nullable|numeric|min:0',
        ]);

        // Handle kategori spesial jika category_id bukan angka
        $kategoriInput = $validated['category_id'];
        if (!is_numeric($kategoriInput)) {
            $category = \App\Models\Category::firstOrCreate([
                'name' => ucfirst($kategoriInput),
            ], [
                'status' => true,
                'slug' => \Illuminate\Support\Str::slug($kategoriInput)
            ]);
            $validated['category_id'] = $category->id;
        }

        // Tambahkan slug otomatis
        $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();
        Product::create($validated);

        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products')->with('success', 'Produk berhasil dihapus!');
    }
} 