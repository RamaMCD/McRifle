@extends('layouts.main')

@section('title', 'Products - McRifle')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('products') }}" method="GET" class="space-y-6">
                        <h3 class="text-lg font-semibold mb-4">Filters</h3>
                        <!-- Categories -->
                        <div class="mb-6">
                            <h4 class="font-medium mb-2">Categories</h4>
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                           name="category[]" 
                                           value="{{ is_numeric($category->id) ? $category->id : strtolower($category->name) }}"
                                           class="form-checkbox text-brown-600"
                                           {{ is_array(request('category')) && in_array($category->id, request('category', [])) ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <!-- Price Range -->
                        <div class="mb-6">
                            <h4 class="font-medium mb-2">Price Range</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-600">Min Price</label>
                                    <input type="number" 
                                           name="min_price" 
                                           value="{{ request('min_price') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600">Max Price</label>
                                    <input type="number" 
                                           name="max_price" 
                                           value="{{ request('max_price') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                                </div>
                            </div>
                        </div>
                        <!-- Apply Filters Button -->
                        <button type="submit" 
                                class="w-full bg-brown-600 text-white py-2 px-4 rounded-lg hover:bg-brown-700 transition duration-150">
                            Apply Filters
                        </button>
                    </form>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Pesan sukses -->
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Tombol Tambah Produk -->
                <div class="flex justify-end mb-4">
                    <button onclick="document.getElementById('modal-add-product').classList.remove('hidden')" class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">Tambah Produk</button>
                </div>
                <!-- Modal Tambah Produk -->
                <div id="modal-add-product" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-8 relative">
                        <button onclick="document.getElementById('modal-add-product').classList.add('hidden')" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl">&times;</button>
                        <h2 class="text-xl font-bold mb-4">Tambah Produk Baru</h2>
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-gray-50 p-4 rounded-lg shadow-lg border border-brown-200">
                            @csrf
                            <div>
                                <label class="block text-base font-semibold text-brown-700 mb-1">Nama Produk</label>
                                <input type="text" name="name" required class="mt-1 block w-full rounded-md border-2 border-brown-200 bg-white shadow-sm focus:border-brown-500 focus:ring-2 focus:ring-brown-200 transition">
                            </div>
                            <div>
                                <label class="block text-base font-semibold text-brown-700 mb-1">Deskripsi</label>
                                <textarea name="description" required rows="3" class="mt-1 block w-full rounded-md border-2 border-brown-200 bg-white shadow-sm focus:border-brown-500 focus:ring-2 focus:ring-brown-200 transition"></textarea>
                            </div>
                            <div>
                                <label class="block text-base font-semibold text-brown-700 mb-1">Harga</label>
                                <input type="number" name="price" min="0" required class="mt-1 block w-full rounded-md border-2 border-brown-200 bg-white shadow-sm focus:border-brown-500 focus:ring-2 focus:ring-brown-200 transition">
                            </div>
                            <div>
                                <label class="block text-base font-semibold text-brown-700 mb-1">Kategori</label>
                                <select name="category_id" required class="mt-1 block w-full rounded-md border-2 border-brown-200 bg-white shadow-sm focus:border-brown-500 focus:ring-2 focus:ring-brown-200 transition">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex justify-end gap-2 mt-6">
                                <button type="button" onclick="document.getElementById('modal-add-product').classList.add('hidden')" class="px-4 py-2 bg-red-500 text-white rounded-lg">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sort Options -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">{{ $products->total() }} products found</span>
                        <select name="sort" 
                                class="form-select rounded-md border-gray-300 focus:border-brown-500 focus:ring-brown-500">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                        </select>
                    </div>
                </div>

                <!-- Products -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold">{{ $product->formatted_price }}</span>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 px-3 py-1.5 bg-brown-600 text-white rounded-md shadow-sm hover:bg-brown-700 hover:scale-105 transition-all duration-150 text-sm font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.85-1.53L17 13M7 13V6a1 1 0 011-1h5a1 1 0 011 1v7" /></svg>
                                        Masukkan
                                    </button>
                                </form>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus produk ini?')" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 