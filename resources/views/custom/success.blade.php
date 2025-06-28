@extends('layouts.main')

@section('title', 'Custom Order Berhasil')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-xl">
    <div class="bg-white rounded-xl shadow-lg p-10 text-center">
        <div class="text-3xl font-bold text-green-700 mb-4">Custom Order Berhasil!</div>
        <div class="text-gray-700 mb-6">Terima kasih telah melakukan custom order di McRifle.<br>Tim kami akan segera menghubungi Anda untuk proses selanjutnya.</div>
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('products') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition">Kembali ke Produk</a>
            <a href="#" onclick="alert('Invoice custom akan dikirim via email atau bisa diunduh setelah konfirmasi admin.');return false;" class="px-6 py-3 bg-green-600 text-white rounded-lg font-bold hover:bg-green-700 transition">Download Invoice Custom</a>
        </div>
    </div>
</div>
@endsection 