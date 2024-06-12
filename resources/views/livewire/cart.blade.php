<div>
    <div class="flex flex-col justify-between">
        <div class="flex justify-between border-b-2 px-3">
            <h1 class="text-base py-2 font-semibold">Keranjang Kamu</h1>
            {{-- <button wire:click="$dispatch('closeCart')" class="bg-red-500 text-white py-2 px-4 rounded">Close</button> --}}
        </div>
        <div class="flex flex-col max-h-96 p-2 overflow-y-scroll gap-3 my-3">
            @foreach ($cart as $key => $item)
                <div
                    class="flex justify-between p-2 rounded-md hover:ring-slate-400 hover:ring-1 transition-all ease-in-out">
                    <div class="flex gap-3">
                        @if ($item['type'] === 'paket_biasa')
                            <img class="max-w-24 w-max-w-24 rounded-lg aspect-square object-cover"
                                src="{{ asset('storage/paket_biasa/' . $item['image']) }}" alt="">
                        @elseif ($item['type'] === 'paket_spesial')
                            <img class="max-w-24 w-max-w-24 rounded-lg aspect-square object-cover"
                                src="{{ asset('storage/paket_spesial/' . $item['image']) }}" alt="">
                        @endif
                        <div class="flex flex-col justify-center gap-2">
                            <p class="text-lg font-semibold">{{ $item['name'] }}</p>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <button wire:click="decreaseQuantity('{{ $key }}')"
                                    class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-2 py-2 inline-flex space-x-1 items-center">
                                    -
                                </button>
                                <input readonly class="text-center w-10" value="{{ $item['quantity'] }}">
                                <button wire:click="increaseQuantity('{{ $key }}')"
                                    class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-2 py-2 inline-flex space-x-1 items-center">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="flex items-end mb-3 text-lg">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
        <div class="w-full flex flex-col gap-2 px-3 pt-3 border-t">
            <div class="flex justify-between">
                <h1 class="text-lg inline font-semibold">Total</h1>
                <h1 class="text-lg inline">Rp{{ number_format($total, 0, ',', '.') }}</h1>
            </div>
            <a href="{{ route('pembayaran.create') }}"
                class="bg-primary-700 text-center py-3 px-5 rounded-md text-white">Bayar Sekarang</a>
        </div>
    </div>
</div>
