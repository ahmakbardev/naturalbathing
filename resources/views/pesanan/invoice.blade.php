<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $pesanan->Invoice_ID }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .status-badge {
            position: absolute;
            top: -20px;
            right: -20px;
            transform: rotate(-15deg);
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        .status-verified {
            background-color: green;
        }

        .status-paid {
            background-color: blue;
        }
    </style>
</head>

<body>
    <div class="container mx-auto mt-8 relative">
        <div class="max-w-2xl mx-auto bg-white p-5 rounded-lg shadow-lg relative">
            @if ($pesanan->status)
                <div class="status-badge status-verified">
                    Pembayaran Terverifikasi
                </div>
            @else
                <div class="status-badge status-paid">
                    Lunas
                </div>
            @endif
            <h2 class="text-2xl font-bold mb-5">Invoice</h2>
            <p><strong>Invoice ID:</strong> {{ $pesanan->Invoice_ID }}</p>
            <p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d-m-Y') }}</p>
            <p><strong>Nama:</strong> {{ $pesanan->user->name }}</p>
            <p><strong>Email:</strong> {{ $pesanan->user->email }}</p>

            <div class="mt-5">
                <h3 class="text-xl font-bold mb-2">Detail Pembelian</h3>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Nama Paket</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Jumlah</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan->paket_data['items'] as $item)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $item['name'] }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $item['quantity'] }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <p class="text-right"><strong>Total:</strong>
                    Rp{{ number_format($pesanan->paket_data['total'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</body>

</html>
