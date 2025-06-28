@extends('layouts.main')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Keranjang Belanja</h1>
    <div class="bg-white rounded-lg shadow-md p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @php $cart = session('cart', []); @endphp

        @if(count($cart) > 0)
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $item)
                        @php $total = $item['price'] * $item['qty']; $grandTotal += $total; @endphp
                        <tr>
                            <td>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" class="cart-item-checkbox" value="{{ $item['id'] }}" checked>
                                    <button type="button" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs" onclick="removeCartItem({{ $item['id'] }})">Hapus</button>
                                </div>
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>$ {{ number_format($item['price'], 2, '.', ',') }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>$ {{ number_format($total, 2, '.', ',') }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right font-bold">Grand Total</td>
                        <td class="font-bold" colspan="2">$ {{ number_format($grandTotal, 2, '.', ',') }}</td>
                    </tr>
                </tbody>
            </table>
            <div style="position:fixed;left:0;right:0;bottom:32px;z-index:50;display:flex;justify-content:center;pointer-events:none;">
                <form action="{{ route('cart.buy') }}" method="POST" id="cart-buy-form" style="pointer-events:auto;">
                    @csrf
                    <button type="submit" class="px-16 py-4 bg-green-600 text-white rounded-full text-2xl font-bold shadow-lg hover:bg-green-700 transition">Beli</button>
                </form>
            </div>
            @foreach($cart as $item)
                <form action="{{ route('cart.remove', $item['id']) }}" method="POST" id="remove-form-{{ $item['id'] }}" style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
            <script>
                // Saat submit form beli, hanya kirim item yang dicentang
                document.getElementById('cart-buy-form').addEventListener('submit', function(e) {
                    // Hapus input hidden sebelumnya
                    document.querySelectorAll('#cart-buy-form input[name=\'items[]\']').forEach(el => el.remove());
                    // Tambahkan input hidden untuk item yang dicentang
                    document.querySelectorAll('.cart-item-checkbox:checked').forEach(function(checkbox) {
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'items[]';
                        input.value = checkbox.value;
                        document.getElementById('cart-buy-form').appendChild(input);
                    });
                });
                // Fungsi hapus item
                function removeCartItem(id) {
                    if(confirm('Yakin hapus item ini dari keranjang?')) {
                        document.getElementById('remove-form-' + id).submit();
                    }
                }
            </script>
        @else
            <p>Keranjang belanja masih kosong.</p>
        @endif
    </div>
</div>
@endsection 