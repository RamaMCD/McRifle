@extends('layouts.main')

@section('title', 'Search Results - McRifle')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Search Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Search Results</h1>
            <p class="text-gray-600">
                Showing results for "{{ $query }}"
            </p>
        </div>

        <!-- Search Results -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold">{{ $product->formatted_price }}</span>
                        <a href="{{ route('products.show', $product->id) }}" 
                           class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">No Results Found</h2>
            <p class="text-gray-600 mb-6">
                We couldn't find any products matching "{{ $query }}". Try different keywords or browse our categories.
            </p>
            <a href="{{ route('products') }}" 
               class="inline-block px-6 py-3 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                Browse All Products
            </a>
        </div>
        @endif
    </div>
</div>
@endsection 