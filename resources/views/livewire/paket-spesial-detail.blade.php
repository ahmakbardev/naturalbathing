<div class="py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
    <div class="flex flex-col md:flex-row gap-10">
        <!-- Product Images -->
        <div class="flex-shrink-0">
            @if (!empty($paket->gambar))
                <img id="mainImage" src="{{ asset('storage/paket_spesial/' . $paket->gambar[0]) }}" alt="Gambar Produk"
                    class="w-full h-auto max-h-[400px] max-w-[600px] object-cover rounded-lg shadow-md">
                <div class="flex gap-2 mt-3">
                    @foreach ($paket->gambar as $gambar)
                        <img src="{{ asset('storage/paket_spesial/' . $gambar) }}" alt="Thumbnail"
                            class="thumbnail w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
                    @endforeach
                </div>
            @else
                <img class="w-full h-auto object-cover rounded-lg shadow-md"
                    src="{{ asset('assets/images/paket/biasa.png') }}" alt="Gambar Produk">
            @endif
        </div>
        <!-- Product Details -->
        <div class="flex flex-col flex-grow">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">{{ $paket->nama_paket }}</h1>
            <p class="text-xl font-semibold text-gray-600 mb-3">Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>
            <p class="text-gray-700 mb-5">{!! $paket->deskripsi !!}</p>
            <div class="flex items-center gap-2 mb-5">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < 4)
                        <!-- Assuming 4-star rating -->
                        <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                    @else
                        <span class="text-gray-300"><i class="fas fa-star"></i></span>
                    @endif
                @endfor
                <span class="text-gray-600 ml-2">(4 Reviews)</span>
            </div>
            <button
                wire:click="addItem({{ $paket->id }}, '{{ $paket->nama_paket }}', {{ $paket->harga }}, '{{ $paket->gambar[0] }}')"
                class="bg-primary-700 text-white font-bold py-2 px-4 rounded-full hover:bg-primary-600 transition duration-300 ease-in-out">
                <i class="fas fa-shopping-cart mr-2"></i> Pesan Paket
            </button>
        </div>
    </div>
    <!-- Review Carousel -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-3">Reviews</h2>
        <div class="swiper-container relative">
            <div class="swiper-wrapper">
                @if ($paket->review)
                    @foreach ($paket->review as $review)
                        <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                            <p class="text-gray-700 mb-3">{{ $review }}</p>
                            <p class="font-bold text-gray-800">- Reviewer</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    mainImage.src = thumbnail.src;
                });
            });

            const swiper = new Swiper('.swiper-container', {
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
                    425: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    426: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    }
                }
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection
