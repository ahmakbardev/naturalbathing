@extends('layouts.layout')

@section('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTn7YB2Zf2E2b9A0ZwX+FQ2v8keP0qO/J/3b1m6F1C5GpGVPYdF0t+2KP3lup5jrhfXHfnfXfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('content')
    <div class="py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <div class="flex flex-col md:flex-row gap-10">
            <!-- Gambar Produk -->
            <div class="flex-shrink-0">
                @if (!empty($paket->gambar) && count($paket->gambar) > 0)
                    <img id="mainImage" src="{{ asset('storage/paket_biasa/' . $paket->gambar[0]) }}" alt="Gambar Produk"
                        class="w-full h-auto max-h-[400px] max-w-[600px] object-cover rounded-lg shadow-md">
                    <div class="flex gap-2 mt-3">
                        @foreach ($paket->gambar as $gambar)
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
                {{-- <div class="flex items-center gap-2 mb-5">
                    @php
                        $reviewCount = $paket->review ? count($paket->review) : 0;
                        $averageRating = $reviewCount > 0 ? array_sum($paket->review) / $reviewCount : 0;
                    @endphp
                    @for ($i = 0; $i < 5; $i++)
                        <span class="text-{{ $i < $averageRating ? 'yellow' : 'gray' }}-500"><i
                                class="fas fa-star"></i></span>
                    @endfor
                    <span class="text-gray-600 ml-2">({{ $reviewCount }} Reviews)</span>
                </div> --}}
                <button
                    wire:click="$emit('addItem', { id: {{ $paket->id }}, name: '{{ $paket->nama_paket }}', price: {{ $paket->harga }}, image: '{{ $paket->gambar[0] }}' })"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
                    <i class="fas fa-shopping-cart mr-2"></i> Pesan Paket
                </button>
            </div>
        </div>
        <!-- Review Carousel -->
        {{-- @if ($reviewCount > 0)
            <div class="mt-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Reviews</h2>
                <div class="swiper-container relative">
                    <div class="swiper-wrapper">
                        @foreach ($paket->review as $review)
                            <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                                <p class="text-gray-700 mb-3">"{{ $review }}"</p>
                                <p class="font-bold text-gray-800">- Pengulas {{ $loop->iteration }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination mt-4"></div>
                </div>
            </div>
        @endif --}}
    </div>
@endsection

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
