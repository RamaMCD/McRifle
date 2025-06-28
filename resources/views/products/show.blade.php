@extends('layouts.main')

@section('title', $product->name . ' - McRifle')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                <!-- Product Images -->
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/2 flex items-center justify-center bg-gray-100 rounded-lg p-4">
                        <span class="text-gray-400">Tidak ada gambar</span>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <p class="text-2xl font-bold text-brown-600 mt-2">{{ $product->formatted_price }}</p>
                    </div>

                    <div class="prose max-w-none">
                        <p>{{ $product->description }}</p>
                    </div>

                    <!-- Stock Status -->
                    <div class="flex items-center space-x-2">
                        @if($product->stock > 0)
                        <span class="text-green-600">In Stock</span>
                        <span class="text-gray-500">({{ $product->stock }} available)</span>
                        @else
                        <span class="text-red-600">Out of Stock</span>
                        @endif
                    </div>

                    <!-- Add to Cart Form -->
                    @if($product->stock > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center border rounded-lg">
                                <button type="button" 
                                        class="px-4 py-2 text-gray-600 hover:text-gray-700 focus:outline-none"
                                        onclick="decrementQuantity()">
                                    -
                                </button>
                                <input type="number" 
                                       name="quantity" 
                                       id="quantity"
                                       value="1" 
                                       min="1" 
                                       max="{{ $product->stock }}"
                                       class="w-16 text-center border-0 focus:ring-0">
                                <button type="button" 
                                        class="px-4 py-2 text-gray-600 hover:text-gray-700 focus:outline-none"
                                        onclick="incrementQuantity()">
                                    +
                                </button>
                            </div>
                            
                            <button type="submit" 
                                    class="flex-1 bg-brown-600 text-white py-2 px-6 rounded-lg hover:bg-brown-700 transition duration-150">
                                Add to Cart
                            </button>
                        </div>
                    </form>
                    @endif

                    <!-- Product Details -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4">Product Details</h3>
                        <dl class="grid grid-cols-1 gap-4">
                            <div class="flex justify-between">
                                <dt class="text-gray-600">Category</dt>
                                <dd class="font-medium">{{ $product->category->name }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-600">SKU</dt>
                                <dd class="font-medium">{{ $product->sku }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-600">Weight</dt>
                                <dd class="font-medium">{{ $product->weight }} kg</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Related Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative group h-8"></div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $relatedProduct->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold">{{ $relatedProduct->formatted_price }}</span>
                            <a href="{{ route('products.show', $relatedProduct->id) }}" 
                               class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function incrementQuantity() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.getAttribute('max'));
        const currentValue = parseInt(input.value);
        if (currentValue < max) {
            input.value = currentValue + 1;
        }
    }

    function decrementQuantity() {
        const input = document.getElementById('quantity');
        const currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    }
</script>
@endpush
@endsection 