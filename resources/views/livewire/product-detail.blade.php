<div class="py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
    <div class="flex flex-col md:flex-row gap-10">
        <!-- Gambar Produk -->
        <div class="flex-shrink-0">
            @php
                $gambarArray = json_decode($paket->gambar, true);
            @endphp
            @if (!empty($gambarArray))
                <img id="mainImage" src="{{ asset('storage/paket_biasa/' . $gambarArray[0]) }}" alt="Gambar Produk"
                    class="w-full h-auto max-h-[400px] max-w-[600px] object-cover rounded-lg shadow-md">
                <div class="flex gap-2 mt-3">
                    @foreach ($gambarArray as $gambar)
                        <img src="{{ asset('storage/paket_biasa/' . $gambar) }}" alt="Thumbnail"
                            class="thumbnail w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
                    @endforeach
                </div>
            @else
                <img class="w-full h-auto object-cover rounded-lg shadow-md"
                    src="{{ asset('assets/images/paket/biasa.png') }}" alt="Gambar Produk">
            @endif

        </div>

        <!-- Detail Produk -->
        <div class="flex flex-col flex-grow">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">{{ $paket->nama_paket }}</h1>
            <p class="text-xl font-semibold text-gray-600 mb-3">Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>
            <p class="text-gray-700 mb-5">{!! $paket->deskripsi !!}</p>
            <div class="flex items-center gap-2 mb-5">
                @php
                    $reviewCount = $paket->review ? count($paket->review) : 0;
                    $averageRating = $reviewCount > 0 ? array_sum($paket->review) / $reviewCount : 0;
                @endphp
                @for ($i = 0; $i < 5; $i++)
                    <span class="text-{{ $i < $averageRating ? 'yellow' : 'gray' }}-500"><i
                            class="fas fa-star"></i></span>
                @endfor
                <span class="text-gray-600 ml-2">({{ $reviewCount }} Reviews)</span>
            </div>
            <button
                wire:click="addItem({{ $paket->id }}, '{{ $paket->nama_paket }}', {{ $paket->harga }}, '{{ $gambarArray[0] }}')"
                class="bg-primary-700 text-white font-bold py-2 px-4 rounded-full hover:bg-primary-600 transition duration-300 ease-in-out">
                <i class="fas fa-shopping-cart mr-2"></i> Pesan Paket
            </button>
        </div>
    </div>
    <!-- Review Section -->
    {{-- @if ($reviewCount > 0) --}}
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-3">Reviews</h2>
        <div id="product" class="swiper-container relative">
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">{{ $review->review }}</p>
                        <p class="font-bold text-gray-800">- {{ $review->reviewer_name }}</p>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
    {{-- @endif --}}

    <!-- Tambah Review -->
    @auth
        <div class="mt-5">
            <h3 class="text-lg font-bold text-gray-800 mb-3">Tambah Review</h3>
            <form wire:submit.prevent="addReview">
                <textarea wire:model="newReview" class="w-full p-2 border rounded-lg" placeholder="Tulis review Anda di sini..."></textarea>
                @error('newReview')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded">Kirim</button>
            </form>
        </div>

    @endauth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    mainImage.src = thumbnail.src;
                });
            });

            const swiper = new Swiper('#product', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    426: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    }
                }
            });
            Livewire.on('cartUpdated', () => {
                const popupCart = document.getElementById('popupCart');
                const CartContent = document.getElementById('CartContent');
                if (popupCart.classList.contains('hidden')) {
                    popupCart.classList.remove('hidden');
                    setTimeout(() => {
                        CartContent.classList.remove('slide-in-right');
                        CartContent.classList.add('slide-in');
                    }, 10); // slight delay to trigger transition
                }
            });

            Livewire.on('closeCart', () => {
                const popupCart = document.getElementById('popupCart');
                const CartContent = document.getElementById('CartContent');
                CartContent.classList.remove('slide-in');
                CartContent.classList.add('slide-in-right');
                setTimeout(() => {
                    popupCart.classList.add('hidden');
                }, 500); // duration of the slide-out animation
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</div>
