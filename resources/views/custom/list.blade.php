@extends('layouts.main')

@section('title', 'Daftar Custom Order')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Custom Order</h1>
    <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-brown-600 text-white">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Telepon</th>
                    <th class="px-4 py-2">Model</th>
                    <th class="px-4 py-2">Kaliber</th>
                    <th class="px-4 py-2">Panjang Laras</th>
                    <th class="px-4 py-2">Finishing</th>
                    <th class="px-4 py-2">Fitur Tambahan</th>
                    <th class="px-4 py-2">Catatan</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Tanggal Order</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($orders as $order)
                <tr>
                    <td class="px-4 py-2">{{ $order->name }}</td>
                    <td class="px-4 py-2">{{ $order->email }}</td>
                    <td class="px-4 py-2">{{ $order->phone }}</td>
                    <td class="px-4 py-2 capitalize">{{ $order->base_model }}</td>
                    <td class="px-4 py-2">{{ $order->caliber }}</td>
                    <td class="px-4 py-2">{{ $order->barrel_length }}"</td>
                    <td class="px-4 py-2 capitalize">{{ $order->finish }}</td>
                    <td class="px-4 py-2">{{ $order->additional_features }}</td>
                    <td class="px-4 py-2">{{ $order->notes }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded {{ $order->status_badge }}">
                            {{ $order->status ?? 'pending' }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center py-4 text-gray-500">Belum ada custom order.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 