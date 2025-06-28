@extends('layouts.main')

@section('title', 'McRifle - Premium Firearms')

@section('content')
    <!-- Hero Banner -->
    <div class="bg-gray-900 h-[300px] flex flex-col justify-center px-12 py-10">
        <span class="text-4xl font-extrabold text-white mb-3">McRifle</span>
        <p class="text-lg text-gray-200 mb-4 max-w-2xl">
            Solusi senjata api & aksesoris custom, legal dan bergaransi. Layanan personal, pengiriman aman, dan konsultasi gratis.
        </p>
        <div class="flex flex-wrap gap-6 text-base text-gray-300 mb-6">
            <span class="flex items-center gap-2">
                <svg class='w-5 h-5 text-brown-600' fill='currentColor' viewBox='0 0 20 20'><path d='M10 2a8 8 0 100 16 8 8 0 000-16zm1 12H9v-2h2v2zm0-4H9V6h2v4z'/></svg>
                Legal & Bergaransi
            </span>
            <span class="flex items-center gap-2">
                <svg class='w-5 h-5 text-brown-600' fill='currentColor' viewBox='0 0 20 20'><path d='M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5zm2 2v2h2V7H6zm0 4v2h2v-2H6zm4-4v2h2V7h-2zm0 4v2h2v-2h-2z'/></svg>
                Custom Order
            </span>
            <span class="flex items-center gap-2">
                <svg class='w-5 h-5 text-brown-600' fill='currentColor' viewBox='0 0 20 20'><path d='M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm2 0v10h12V5H4zm2 2h8v2H6V7zm0 4h8v2H6v-2z'/></svg>
                Konsultasi Gratis
            </span>
            <span class="flex items-center gap-2">
                <svg class='w-5 h-5 text-brown-600' fill='currentColor' viewBox='0 0 20 20'><path d='M10 18a8 8 0 100-16 8 8 0 000 16zm1-13H9v6h2V5zm0 8H9v2h2v-2z'/></svg>
                Pengiriman Aman
            </span>
        </div>
        <a href="{{ route('products') }}" class="inline-block px-8 py-3 bg-brown-600 text-white rounded-lg hover:bg-brown-700 text-lg font-bold shadow">
            Lihat Produk
        </a>
    </div>

    <!-- Featured Categories -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Featured Categories</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Category 1 -->
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/img/AK-47.webp') }}" alt="Rifles" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <h3 class="text-2xl font-bold text-white">Rifles</h3>
                    </div>
                </div>
                <!-- Category 2 -->
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/img/handgun.jpeg') }}" alt="Handguns" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <h3 class="text-2xl font-bold text-white">Handguns</h3>
                    </div>
                </div>
                <!-- Category 3 -->
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/img/aksesoris.jpeg') }}" alt="Accessories" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <h3 class="text-2xl font-bold text-white">Accessories</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kenapa Memilih McRifle? -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Kenapa Memilih McRifle?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-100 rounded-lg p-6 shadow text-center flex flex-col items-center">
                    <svg class="w-10 h-10 mb-3 text-brown-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 12H9v-2h2v2zm0-4H9V6h2v4z"/></svg>
                    <h3 class="font-bold text-lg mb-2">Legal & Bergaransi</h3>
                    <p class="text-gray-600 text-sm">Semua produk dijamin original, legal, dan bergaransi resmi.</p>
                </div>
                <div class="bg-gray-100 rounded-lg p-6 shadow text-center flex flex-col items-center">
                    <svg class="w-10 h-10 mb-3 text-brown-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 2h12v10H4V5zm2 2v2h2V7H6zm0 4v2h2v-2H6zm4-4v2h2V7h-2zm0 4v2h2v-2h-2z"/></svg>
                    <h3 class="font-bold text-lg mb-2">Custom Order</h3>
                    <p class="text-gray-600 text-sm">Bebas request desain & spesifikasi sesuai kebutuhan Anda.</p>
                </div>
                <div class="bg-gray-100 rounded-lg p-6 shadow text-center flex flex-col items-center">
                    <svg class="w-10 h-10 mb-3 text-brown-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm2 0v10h12V5H4zm2 2h8v2H6V7zm0 4h8v2H6v-2z"/></svg>
                    <h3 class="font-bold text-lg mb-2">Konsultasi Gratis</h3>
                    <p class="text-gray-600 text-sm">Dapatkan saran dari tim ahli McRifle tanpa biaya tambahan.</p>
                </div>
                <div class="bg-gray-100 rounded-lg p-6 shadow text-center flex flex-col items-center">
                    <svg class="w-10 h-10 mb-3 text-brown-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13H9v6h2V5zm0 8H9v2h2v-2z"/></svg>
                    <h3 class="font-bold text-lg mb-2">Pengiriman Aman</h3>
                    <p class="text-gray-600 text-sm">Proses pengiriman cepat, aman, dan terjamin ke seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Customize Your Firearm?</h2>
            <p class="text-xl mb-8">Create your perfect firearm with our custom ordering service.</p>
            <a href="{{ route('custom') }}" class="inline-block px-8 py-3 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition duration-150">
                Start Customizing
            </a>
        </div>
    </div>

    @vite('resources/css/app.css')
@endsection 