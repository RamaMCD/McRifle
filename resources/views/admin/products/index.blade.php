@extends('layouts.main')

@section('title', 'Admin - Daftar Produk')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="mb-4 inline-block px-4 py-2 bg-brown-600 text-white rounded hover:bg-brown-700">Tambah Produk</a>
    <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-brown-600 text-white">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                <tr>
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $product->formatted_price }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Belum ada produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 