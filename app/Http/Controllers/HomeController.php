<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $featuredProducts = Product::where('is_featured', true)
                ->latest()
                ->take(8)
                ->get();

            return view('home', compact('featuredProducts'));
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in HomeController@index: ' . $e->getMessage());
            
            // Return view with empty featured products
            return view('home', ['featuredProducts' => collect()]);
        }
    }
} 