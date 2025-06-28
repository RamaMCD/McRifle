@extends('layouts.main')

@section('title', 'Admin - Edit Produk')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>
    <div class="bg-white rounded-lg shadow-md p-6 max-w-lg mx-auto">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" required rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">{{ $product->description }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" min="0" value="{{ $product->price }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">SKU</label>
                <input type="text" name="sku" value="{{ $product->sku }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                <input type="number" name="weight" step="0.01" min="0" value="{{ $product->weight }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brown-500 focus:ring-brown-500">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-2">Batal</a>
                <button type="submit" class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection 