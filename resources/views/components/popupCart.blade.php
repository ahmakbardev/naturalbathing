<div class="flex flex-col justify-between">
    <div class="flex justify-between border-b-2 px-3">
        <h1 class="text-base py-2 font-semibold">Keranjang Kamu</h1>
        <button id="closePopup" class="mt-5 bg-red-500 text-white py-2 px-4 rounded hidden">Close</button>

    </div>
    <div class="flex flex-col max-h-96 p-2 overflow-y-scroll gap-3 my-3">
        @forelse (range(1, 5) as $item)
            <div
                class="flex justify-between p-2 rounded-md hover:ring-slate-400 hover:ring-1 transition-all ease-in-out">
                <div class="flex gap-3">
                    <img class="max-w-24 w-max-w-24 rounded-lg aspect-square object-cover"
                        src="{{ asset('assets/images/paket/biasa.png') }}" alt="">
                    <div class="flex flex-col justify-center gap-2">
                        <p class="text-lg font-semibold">Paket Biasa</p>
                        <div class="inline-flex items-center rounded-md shadow-sm">
                            <button
                                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-2 py-2 inline-flex space-x-1 items-center"
                                onclick="decreaseQuantity()">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                    </svg>
                                </span>
                            </button>
                            <input id="quantity"
                                class="text-slate-800 w-10 text-center hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium py-1.5 inline-flex items-center"
                                type="text" value="1">
                            <button
                                class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-2 py-2 inline-flex space-x-1 items-center"
                                onclick="increaseQuantity()">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <script>
                            function decreaseQuantity() {
                                const quantityInput = document.getElementById('quantity');
                                let currentQuantity = parseInt(quantityInput.value);
                                if (currentQuantity > 1) {
                                    quantityInput.value = currentQuantity - 1;
                                }
                            }

                            function increaseQuantity() {
                                const quantityInput = document.getElementById('quantity');
                                let currentQuantity = parseInt(quantityInput.value);
                                quantityInput.value = currentQuantity + 1;
                            }
                        </script>

                    </div>
                </div>
                <p class="flex items-end mb-3 text-lg">Rp. 10.000</p>
            </div>
        @empty
            <p>No Data</p>
        @endforelse
    </div>
    <div class="w-full h-full flex flex-col gap-2 px-3 pt-3 border-t">
        <div class="flex justify-between">
            <h1 class="text-lg inline font-semibold">Total</h1>
            <h1 class="text-lg inline">Rp. 200.000</h1>
        </div>
        <button class="bg-primary-700 text-center py-3 px-5 rounded-md text-white">Bayar Sekarang</button>
    </div>
</div>
