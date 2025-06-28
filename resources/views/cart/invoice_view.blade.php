@extends('layouts.main')
@section('title', 'Invoice #'. $invoice['number'])
@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-gradient-to-br from-blue-50 to-green-50 rounded-2xl shadow-2xl p-10 border border-blue-100">
        <div class="flex justify-between items-center mb-8">
            <div>
                <div class="text-3xl font-extrabold text-blue-800 mb-1 tracking-wide">Invoice #{{ $invoice['number'] }}</div>
                <div class="text-gray-500 text-sm">Tanggal: {{ $invoice['date'] }}</div>
            </div>
            <form action="{{ route('cart.download', $invoice['number']) }}" method="GET">
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-bold shadow">Download PDF</button>
            </form>
        </div>
        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
            <div>
                <div class="font-semibold text-lg text-gray-800">Nama: {{ auth()->user()->name }}</div>
                <div class="text-gray-500 text-sm">Email: {{ auth()->user()->email }}</div>
            </div>
            <a href="{{ route('products') }}" class="inline-block px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-bold shadow transition">Kembali Berbelanja</a>
        </div>
        <table class="w-full mb-8 border rounded-xl overflow-hidden shadow">
            <thead>
                <tr class="bg-blue-100 text-blue-900">
                    <th class="p-3 border">Nama Produk</th>
                    <th class="p-3 border">Harga</th>
                    <th class="p-3 border">Qty</th>
                    <th class="p-3 border">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice['items'] as $item)
                <tr class="bg-white hover:bg-blue-50">
                    <td class="p-3 border">{{ $item['name'] }}</td>
                    <td class="p-3 border">$ {{ number_format($item['price'], 2, '.', ',') }}</td>
                    <td class="p-3 border text-center">{{ $item['qty'] }}</td>
                    <td class="p-3 border">$ {{ number_format($item['price'] * $item['qty'], 2, '.', ',') }}</td>
                </tr>
                @endforeach
                <tr class="font-bold bg-green-100 text-green-900">
                    <td colspan="3" class="text-right p-3 border">Grand Total</td>
                    <td class="p-3 border">$ {{ number_format($invoice['total'], 2, '.', ',') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center text-xl font-semibold text-green-700 mt-8">Terima kasih telah berbelanja di <span class="text-blue-800 font-bold">McRifle</span>!</div>
    </div>
</div>
@endsection 