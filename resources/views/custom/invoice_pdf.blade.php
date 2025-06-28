<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Custom Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { font-size: 24px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;}
        th { background: #eee; }
        .label { font-weight: bold; width: 180px; }
    </style>
</head>
<body>
    <div class="header">Invoice Custom Order</div>
    <div>Tanggal: {{ $order->created_at->format('d-m-Y H:i') }}</div>
    <div>Nama: {{ $order->name }}</div>
    <div>Email: {{ $order->email }}</div>
    <div>Telepon: {{ $order->phone }}</div>
    <br>
    <table>
        <tbody>
            <tr>
                <td class="label">Model</td>
                <td>{{ $order->base_model }}</td>
            </tr>
            <tr>
                <td class="label">Kaliber</td>
                <td>{{ $order->caliber }}</td>
            </tr>
            <tr>
                <td class="label">Panjang Laras</td>
                <td>{{ $order->barrel_length }} inci</td>
            </tr>
            <tr>
                <td class="label">Finishing</td>
                <td>{{ ucfirst($order->finish) }}</td>
            </tr>
            <tr>
                <td class="label">Fitur Tambahan</td>
                <td>{{ $order->additional_features ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Catatan</td>
                <td>{{ $order->notes ?? '-' }}</td>
            </tr>
        </tbody>
    </table>
    <div>Terima kasih telah melakukan custom order di McRifle!</div>
</body>
</html> 