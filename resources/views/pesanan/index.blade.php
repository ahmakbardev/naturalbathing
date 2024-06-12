@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-5">
            <h2 class="text-2xl font-bold mb-5">Pesanan Saya</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Invoice ID</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Total Pembayaran</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Status</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Detail</th>
                            @if ($pesanans->contains('status', 1))
                                <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Invoice</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $pesanan)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $pesanan->Invoice_ID }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    Rp{{ number_format($pesanan->paket_data['total'], 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    @if ($pesanan->status)
                                        <span class="text-green-500">Sudah Terverifikasi</span>
                                    @else
                                        <span class="text-red-500">Belum Terverifikasi</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    {{-- <button @click="open = !open" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Lihat Detail
                                    </button> --}}
                                    {{-- <div x-show="open" x-transition class="mt-2"> --}}
                                    <div class="mt-2">
                                        <div class="bg-gray-100 p-4 rounded">
                                            @foreach ($pesanan->paket_data['items'] as $item)
                                                <div class="mb-2">
                                                    <p class="font-semibold">{{ $item['name'] }}</p>
                                                    <p>Jumlah: {{ $item['quantity'] }}</p>
                                                    <p>Harga: Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    @if ($pesanan->status)
                                        <a href="{{ route('pesanan.invoice', $pesanan->id) }}"
                                            class="bg-green-500 text-white px-4 py-2 rounded">
                                            Lihat Invoice
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
@endsection
