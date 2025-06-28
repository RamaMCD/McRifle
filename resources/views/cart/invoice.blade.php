<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice['number'] }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { font-size: 24px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;}
        th { background: #eee; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">Invoice #{{ $invoice['number'] }}</div>
    <div>Tanggal: {{ $invoice['date'] }}</div>
    <div>Nama: {{ auth()->user()->name }}</div>
    <div>Email: {{ auth()->user()->email }}</div>
    <br>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice['items'] as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>$ {{ number_format($item['price'], 2, '.', ',') }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>$ {{ number_format($item['price'] * $item['qty'], 2, '.', ',') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="total">Grand Total</td>
                <td class="total">$ {{ number_format($invoice['total'], 2, '.', ',') }}</td>
            </tr>
        </tbody>
    </table>
    <div>Terima kasih telah berbelanja di McRifle!</div>
</body>
</html> 