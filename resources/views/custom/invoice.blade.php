@extends('layouts.main')
@section('title', 'Invoice Custom Order')
@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-gradient-to-br from-yellow-50 to-green-50 rounded-2xl shadow-2xl p-10 border border-yellow-100">
        <div class="flex justify-between items-center mb-8">
            <div>
                <div class="text-3xl font-extrabold text-yellow-800 mb-1 tracking-wide">Invoice Custom Order</div>
                <div class="text-gray-500 text-sm">Tanggal: {{ $order->created_at->format('d-m-Y H:i') }}</div>
            </div>
            <form action="{{ route('custom.invoice.download', $order->id) }}" method="GET">
                <button type="submit" class="px-5 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 font-bold shadow">Download PDF</button>
            </form>
        </div>
        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
            <div>
                <div class="font-semibold text-lg text-gray-800">Nama: {{ $order->name }}</div>
                <div class="text-gray-500 text-sm">Email: {{ $order->email }}</div>
                <div class="text-gray-500 text-sm">Telepon: {{ $order->phone }}</div>
            </div>
            <a href="{{ route('products') }}" class="inline-block px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-bold shadow transition">Kembali ke Produk</a>
        </div>
        <table class="w-full mb-8 border rounded-xl overflow-hidden shadow">
            <tbody>
                <tr class="bg-white hover:bg-yellow-50">
                    <td class="p-3 border font-bold">Model</td>
                    <td class="p-3 border">{{ $order->base_model }}</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-50">
                    <td class="p-3 border font-bold">Kaliber</td>
                    <td class="p-3 border">{{ $order->caliber }}</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-50">
                    <td class="p-3 border font-bold">Panjang Laras</td>
                    <td class="p-3 border">{{ $order->barrel_length }} inci</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-50">
                    <td class="p-3 border font-bold">Finishing</td>
                    <td class="p-3 border">{{ ucfirst($order->finish) }}</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-50">
                    <td class="p-3 border font-bold">Fitur Tambahan</td>
                    <td class="p-3 border">{{ $order->additional_features ?? '-' }}</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-50">
                    <td class="p-3 border font-bold">Catatan</td>
                    <td class="p-3 border">{{ $order->notes ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center text-xl font-semibold text-green-700 mt-8">Terima kasih telah melakukan custom order di <span class="text-yellow-800 font-bold">McRifle</span>!</div>
    </div>
</div>
@endsection 