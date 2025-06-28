<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-100 p-4 rounded shadow flex flex-col items-center">
                            <span class="text-4xl font-bold text-brown-700 mb-2">{{ $konsultasiCount ?? 0 }}</span>
                            <span class="text-gray-700">Total Konsultasi Produk</span>
                            <a href="{{ route('admin.konsultasi.index') }}" class="mt-2 text-sm text-brown-600 hover:underline">Kelola Konsultasi</a>
                        </div>
                        <div class="bg-gray-100 p-4 rounded shadow flex flex-col items-center">
                            <span class="text-4xl font-bold text-brown-700 mb-2">{{ $customOrderCount ?? 0 }}</span>
                            <span class="text-gray-700">Total Pesanan Custom</span>
                            <a href="{{ route('admin.custom-orders.index') }}" class="mt-2 text-sm text-brown-600 hover:underline">Kelola Pesanan Custom</a>
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">Dashboard ini hanya dapat diakses oleh admin.</div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
