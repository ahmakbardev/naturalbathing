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
            <!-- Product Images -->
            <div class="flex-shrink-0">
                <img id="mainImage" src="https://picsum.photos/id/1018/600/400" alt="Product Image"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
                <div class="flex gap-2 mt-3">
                    <img src="https://picsum.photos/id/1015/600/400" alt="Thumbnail 1"
                        class="thumbnail w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
                    <img src="https://picsum.photos/id/1016/600/400" alt="Thumbnail 2"
                        class="thumbnail w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
                    <img src="https://picsum.photos/id/1019/600/400" alt="Thumbnail 3"
                        class="thumbnail w-20 h-20 object-cover rounded-lg shadow-md cursor-pointer">
                </div>
            </div>
            <!-- Product Details -->
            <div class="flex flex-col flex-grow">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Nama Produk</h1>
                <p class="text-xl font-semibold text-gray-600 mb-3">Rp1.000.000</p>
                <p class="text-gray-700 mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque leo ut urna consequat, nec
                    tincidunt magna consequat. Integer consequat lacus in nisi feugiat, at sollicitudin arcu ultricies.
                </p>
                <div class="flex items-center gap-2 mb-5">
                    <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                    <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                    <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                    <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                    <span class="text-gray-300"><i class="fas fa-star"></i></span>
                    <span class="text-gray-600 ml-2">(4 Reviews)</span>
                </div>
                <button
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>
        <!-- Review Carousel -->
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-3">Reviews</h2>
            <div class="swiper-container relative">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                            scelerisque leo ut urna consequat."</p>
                        <p class="font-bold text-gray-800">- Reviewer 1</p>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">"Integer consequat lacus in nisi feugiat, at sollicitudin arcu
                            ultricies."</p>
                        <p class="font-bold text-gray-800">- Reviewer 2</p>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">"Etiam vel bibendum nulla. Sed luctus risus vel metus fermentum, a
                            porttitor erat ullamcorper."</p>
                        <p class="font-bold text-gray-800">- Reviewer 3</p>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                            scelerisque leo ut urna consequat."</p>
                        <p class="font-bold text-gray-800">- Reviewer 4</p>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">"Integer consequat lacus in nisi feugiat, at sollicitudin arcu
                            ultricies."</p>
                        <p class="font-bold text-gray-800">- Reviewer 5</p>
                    </div>
                    <!-- Slide 6 -->
                    <div class="swiper-slide p-5 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 mb-3">"Etiam vel bibendum nulla. Sed luctus risus vel metus fermentum, a
                            porttitor erat ullamcorper."</p>
                        <p class="font-bold text-gray-800">- Reviewer 6</p>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination mt-4"></div>
                <!-- Add Navigation -->
                {{-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // JavaScript to handle thumbnail click
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    mainImage.classList.remove('w-full', 'h-auto', 'object-cover');
                    mainImage.classList.add('w-[600px]', 'h-[400px]', 'object-cover');
                    mainImage.src = thumbnail.src;
                });
            });

            // Initialize Swiper with breakpoints for responsiveness
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1, // Display 1 item per slide for screens <= 425px
                        spaceBetween: 10 // Adjust space between slides
                    },
                    425: {
                        slidesPerView: 1, // Display 1 item per slide for screens <= 425px
                        spaceBetween: 10 // Adjust space between slides
                    },
                    426: {
                        slidesPerView: 3, // Display 3 items per slide for screens > 425px
                        spaceBetween: 20 // Space between slides
                    }
                }
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection
