<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natural Bathing PAB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Append version number to CSS file name -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.01') }}">
    <!-- Add cache-control headers for CSS and JavaScript files -->
    <link rel="preload" href="{{ asset('css/app.css?v=1.01') }}" as="style" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="overflow-x-hidden box-border">
    <header class="sticky top-0 z-[60]">
        <nav
            class="sticky top-0 flex justify-between items-center py-3 bg-white md:bg-white/50 backdrop-blur-sm px-5 md:px-10 z-[60]">
            <img class="w-16 object-contain" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">

            <!-- Mobile Nav -->
            <div class="lg:hidden burger-container flex items-center gap-5">
                <button class="relative">
                    <span
                        class="bg-red-500 text-white text-[10px] font-semibold px-1.5 py-0.5 rounded-full absolute -top-4 -right-3">1</span>
                    <img class="w-5" src="{{ asset('assets/images/icons/cart.png') }}" alt="Cart">
                </button>
                <button id="burger" class="text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <!-- Desktop Nav -->
            <div class="hidden lg:flex gap-8 justify-between w-full items-center">
                <ul class="flex gap-8 w-full justify-center">
                    <li>Home</li>
                    <li>Paket</li>
                    <li>Tentang Kami</li>
                </ul>
                <ul class="flex gap-5 items-center">
                    <li>
                        <button class="relative">
                            <span
                                class="bg-red-500 text-white text-[10px] font-semibold px-1.5 py-0.5 rounded-full absolute -top-4 -right-3">1</span>
                            <img class="w-10" src="{{ asset('assets/images/icons/cart.png') }}" alt="Cart">
                        </button>
                    </li>
                    <li>
                        <a href="#" class="bg-primary-700 text-center py-3 px-5 rounded-full text-white">Masuk</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="mobile-menu"
            class="hidden lg:hidden absolute top-[88px] left-0 w-full bg-gray-200 z-50 transform -translate-y-full transition-transform duration-300 ease-in-out">
            <ul class="flex flex-col gap-8 items-center p-5">
                <li>Home</li>
                <li>Paket</li>
                <li>Tentang Kami</li>
                <li>
                    <a href="#" class="bg-primary-700 text-center py-3 px-5 rounded-full text-white">Masuk</a>
                </li>
            </ul>
        </div>
    </header>

    <main class="overflow-x-hidden box-border">
        <div class="head relative py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3 md:gap-[unset] md:flex-row justify-between">
            <img class="absolute hidden md:flex w-96 -top-44 -left-44 z-[-1] pointer-events-none rotate"
                src="{{ asset('assets/images/head/suqare-comp.png') }}" alt="">
            <img class="absolute hidden md:flex w-96 -bottom-44 -right-44 z-[-1] pointer-events-none rotate"
                src="{{ asset('assets/images/head/suqare-comp.png') }}" alt="">
            <img class="absolute hidden md:flex top-1/2 -translate-y-1/2 z-0 pointer-events-none opacity-20 max-w-4xl"
                src="{{ asset('assets/images/indo.png') }}" alt="">
            <div class="flex z-[10] flex-col gap-5 max-w-md justify-center order-2 md:order-1">
                <h1 class="text-3xl md:text-6xl font-bold">Welcome To <span class="text-primary-700"> Natural Bathing
                        PAB</span></h1>
                <h4 class="text-base md:text-xl text-slate-500 font-semibold">
                    Jelajah permandian alam baruttung, destinasi favorit anda! Rasakan sensasi yang belum pernah anda
                    rasakan di sini
                </h4>
                <div class="flex gap-3">
                    <a href="#"
                        class="btn-primary text-xs md:text-base py-3 px-5 md:px-8 hover:shadow-lg hover:-translate-y-1 transition-all ease-in-out w-fit rounded-full">Pesan
                        Sekarang</a>
                    <a href="#"
                        class="btn-secondary text-xs md:text-base py-3 px-5 md:px-8 hover:shadow-lg hover:-translate-y-1 transition-all ease-in-out w-fit rounded-full flex gap-5 items-center">
                        <img class="hidden md:flex" src="{{ asset('assets/images/icons/image.png') }}" alt="">
                        <span class="text-primary-700">Lihat Foto</span>
                    </a>
                </div>
            </div>
            <div
                class="gap-3 items-center relative w-full justify-center md:w-fit md:justify-between flex order-1 md:order-2">
                <div class="flex flex-col h-fit gap-3">
                    <img class="w-36 md:w-52 flex md:hidden xl:flex" src="{{ asset('assets/images/head/head-1.png') }}"
                        alt="" />
                    <img class="w-36 md:w-52 flex md:hidden xl:flex" src="{{ asset('assets/images/head/head-1.png') }}"
                        alt="" />
                </div>
                <img class="h-36 min-w-36 md:h-fit" src="{{ asset('assets/images/head/head-1.png') }}"
                    alt="" />
                <img class="absolute top-10 right-5 drop-shadow-lg hidden md:flex"
                    src="{{ asset('assets/images/head/head-comp.png') }}" alt="">
            </div>
        </div>
        <div class="lokasi py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3 z-10">
            <h1 class="text-2xl md:text-3xl font-bold">Lokasi wisata Natural Bathing PAB</h1>
            <h4 class="md:text-xl text-slate-500 max-w-4xl">permandian alam baruttung terletak di desa matajang kecamatan
                kahu,
                kabupaten bone, profinsi sulawesi selatan indonesia</h4>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15898.97098282299!2d120.0443181!3d-4.9823571!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbe87359305b7ed%3A0xc40d885be7b2b1db!2sPermandian%20Alam%20Baruttung!5e0!3m2!1sen!2sid!4v1716187089210!5m2!1sen!2sid"
                width="100%" height="400" class="rounded-lg mt-5" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="paket-biasa py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
            <h1 class="text-2xl md:text-3xl font-bold">Paket Wisata Biasa</h1>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                <div
                    class="flex flex-col gap-3 p-2 rounded-2xl hover:ring-1 group/button-pkt hover:ring-gray-300 transition-all ease-in-out">
                    <div class="relative box-border overflow-hidden">
                        <img class="w-full rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}"
                            alt="">
                        <div
                            class="absolute flex bottom-3 left-1/2 -translate-x-1/2 ml-3 w-full group-hover/button-pkt:-translate-y-0 transition-all ease-in-out box-border translate-y-20">
                            <a href="#"
                                class="btn-primary hover:btn-secondary hover:bg-primary-700/95 hover:text-white hover:border-none hover:font-semibold transition-all ease-in-out w-[94%] py-3 rounded-md">Pesan
                                Paket</a>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="flex items-end gap-2">
                            <h1 class="text-xl font-semibold">Pengunjung</h1>
                            <span class="text-gray-500">/orang</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <i class="fa-solid fa-star text-secondary-700"></i>
                            <span class="text-secondary-700">5.0</span>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold">Rp. 10.000</h2>
                </div>
                <div
                    class="flex flex-col gap-3 p-2 rounded-2xl hover:ring-1 group/button-pkt hover:ring-gray-300 transition-all ease-in-out">
                    <div class="relative box-border overflow-hidden">
                        <img class="w-full rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}"
                            alt="">
                        <div
                            class="absolute flex bottom-3 left-1/2 -translate-x-1/2 ml-3 w-full group-hover/button-pkt:-translate-y-0 transition-all ease-in-out box-border translate-y-20">
                            <a href="#"
                                class="btn-primary hover:btn-secondary hover:bg-primary-700/95 hover:text-white hover:border-none hover:font-semibold transition-all ease-in-out w-[94%] py-3 rounded-md">Pesan
                                Paket</a>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="flex items-end gap-2">
                            <h1 class="text-xl font-semibold">Pengunjung</h1>
                            <span class="text-gray-500">/orang</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <i class="fa-solid fa-star text-secondary-700"></i>
                            <span class="text-secondary-700">5.0</span>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold">Rp. 10.000</h2>
                </div>
                <div
                    class="flex flex-col gap-3 p-2 rounded-2xl hover:ring-1 group/button-pkt hover:ring-gray-300 transition-all ease-in-out">
                    <div class="relative box-border overflow-hidden">
                        <img class="w-full rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}"
                            alt="">
                        <div
                            class="absolute flex bottom-3 left-1/2 -translate-x-1/2 ml-3 w-full group-hover/button-pkt:-translate-y-0 transition-all ease-in-out box-border translate-y-20">
                            <a href="#"
                                class="btn-primary hover:btn-secondary hover:bg-primary-700/95 hover:text-white hover:border-none hover:font-semibold transition-all ease-in-out w-[94%] py-3 rounded-md">Pesan
                                Paket</a>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="flex items-end gap-2">
                            <h1 class="text-xl font-semibold">Pengunjung</h1>
                            <span class="text-gray-500">/orang</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <i class="fa-solid fa-star text-secondary-700"></i>
                            <span class="text-secondary-700">5.0</span>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold">Rp. 10.000</h2>
                </div>
            </div>
        </div>
        <div class="paket-spesial py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex md:grid grid-cols-2 items-center">
            <div class="flex flex-col">
                <h1 class="text-2xl md:text-3xl font-bold">Paket Wisata Spesial</h1>
                <div class="flex flex-col gap-5 md:gap-3 my-5">
                    <div class="flex gap-3 items-start">
                        <img class="object-contain" src="{{ asset('assets/images/paket/icons-special-1.png') }}"
                            alt="">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-base md:text-xl font-bold">Paket Wisata Lengkap</h1>
                            <h4 class="text-gray-500 text-sm font-semibold">kunjungan wisata bermalam lengkap dengan tempat
                                menginap dan fasilitas wisata lainnya.</h4>
                            <div class="md:justify-end text-xl md:text-3xl flex gap-2 items-end font-bold">Rp.500.000 <span
                                    class="text-sm d:text-base">/ malam</span></div>
                        </div>
                    </div>
                    <div class="flex gap-3 items-start">
                        <img class="object-contain" src="{{ asset('assets/images/paket/icons-special-1.png') }}"
                            alt="">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-base md:text-xl font-bold">Paket Wisata Spesial</h1>
                            <h4 class="text-gray-500 text-sm font-semibold">kunjungan wisata bermalam lengkap dengan tempat
                                menginap dan fasilitas wisata lainnya.</h4>
                            <div class="md:justify-end text-xl md:text-3xl flex gap-2 items-end font-bold">Rp.500.000 <span
                                    class="text-sm d:text-base">/ malam</span></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="lg:flex flex-col gap-3 hidden">
                <div class="flex justify-end items-end gap-3">
                    <div class="w-72">
                        <img class=" z-[1] rounded-xl" src="{{ asset('assets/images/paket/spesial.png') }}"
                            alt="">
                    </div>
                    <div class="w-56">
                        <img class="w-full rounded-r-2xl rounded-tl-2xl object-cover z-0"
                            src="{{ asset('assets/images/paket/spesial.png') }}" alt="">
                    </div>
                </div>
                <div class="flex justify-end items-start gap-3">
                    <div class="w-36">
                        <img class="w-full rounded-b-2xl rounded-tl-2xl object-cover z-0"
                            src="{{ asset('assets/images/paket/spesial.png') }}" alt="">
                    </div>
                    <div class="h-56 w-96">
                        <img class="inset-3 w-full object-cover h-full z-[1]  rounded-xl"
                            src="{{ asset('assets/images/paket/spesial.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- component -->
    <footer class="bg-primary-500">
        <div class="container px-6 py-12 mx-auto">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                <div class="sm:col-span-2">
                    <h1 class="max-w-lg text-xl font-semibold tracking-tight text-white xl:text-2xl ">
                        Natural Bathing PAB</h1>

                    <div class="flex flex-col mx-auto mt-6 space-y-3 md:space-y-0 md:flex-row">
                        <input id="email" type="text"
                            class="px-4 py-2 text-gray-700 bg-white border rounded-md   focus:border-blue-400  focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                            placeholder="Email Address">

                        <button
                            class="w-full btn-secondary px-6 py-2.5 text-sm font-medium tracking-wider transition-all duration-300 transform md:w-auto md:mx-4 focus:outline-none rounded-lg ">
                            Subscribe
                        </button>
                    </div>
                </div>
                {{--
                <div>
                    <p class="font-semibold text-gray-800 ">Quick Link</p>

                    <div class="flex flex-col items-start mt-5 space-y-2">
                        <a href="#"
                            class="text-gray-600 transition-colors duration-300  hover:underline hover:text-blue-500">Home</a>
                        <a href="#"
                            class="text-gray-600 transition-colors duration-300  hover:underline hover:text-blue-500">Who
                            We Are</a>
                        <a href="#"
                            class="text-gray-600 transition-colors duration-300  hover:underline hover:text-blue-500">Our
                            Philosophy</a>
                    </div>
                </div> --}}

                {{-- <div>
                    <p class="font-semibold text-gray-800 ">Industries</p>

                    <div class="flex flex-col items-start mt-5 space-y-2">
                        <a href="#"
                            class="text-gray-600 transition-colors duration-300  hover:underline hover:text-blue-500">Retail
                            & E-Commerce</a>
                        <a href="#"
                            class="text-gray-600 transition-colors duration-300  hover:underline hover:text-blue-500">Information
                            Technology</a>
                        <a href="#"
                            class="text-gray-600 transition-colors duration-300  hover:underline hover:text-blue-500">Finance
                            & Insurance</a>
                    </div>
                </div> --}}
            </div>

            <hr class="my-6 md:my-8 border-white">

            <div class="flex items-center justify-between">
                <a href="#">
                    <img class="w-auto h-10" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                </a>

                <div class="flex -mx-2">
                    <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500"
                        aria-label="Reddit">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z">
                            </path>
                        </svg>
                    </a>

                    <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500"
                        aria-label="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                            </path>
                        </svg>
                    </a>

                    <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500"
                        aria-label="Github">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('burger').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                setTimeout(function() {
                    menu.classList.remove('-translate-y-full');
                    menu.classList.add('translate-y-0');
                }, 50); // Delay untuk memastikan transisi terlihat
            } else {
                menu.classList.remove('translate-y-0');
                menu.classList.add('-translate-y-full');
                setTimeout(function() {
                    menu.classList.add('hidden');
                }, 300); // Durasi transisi harus sesuai dengan yang diatur di Tailwind
            }
        });
    </script>
</body>

</html>
