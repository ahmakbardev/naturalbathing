@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full p-3">
                    <div class="flex justify-between items-center">
                        <h2 class="text-gray-900 font-medium text-xl">Pembayaran</h2>
                    </div>
                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Paket yang Dibeli</label>
                            <div class="w-full px-3 py-2 border rounded-lg text-gray-700">
                                @foreach ($cart as $item)
                                    <p>{{ $item['name'] }} - Rp{{ number_format($item['price'], 0, ',', '.') }} x
                                        {{ $item['quantity'] }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Total Pembayaran</label>
                            <div class="w-full px-3 py-2 border rounded-lg text-gray-700">
                                Rp{{ number_format(
                                    array_sum(
                                        array_map(function ($item) {
                                            return $item['price'] * $item['quantity'];
                                        }, $cart),
                                    ),
                                    0,
                                    ',',
                                    '.',
                                ) }}
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                            <input type="file" name="ss_pembayaran"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bayar
                                Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
