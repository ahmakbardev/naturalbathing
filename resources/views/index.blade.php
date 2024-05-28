@extends('layouts.layout')

@section('content')
    <div
        class="head relative py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3 md:gap-[unset] md:flex-row justify-between">
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
        <div class="gap-3 items-center relative w-full justify-center md:w-fit md:justify-between flex order-1 md:order-2">
            <div class="flex flex-col h-fit gap-3">
                <img class="w-36 md:w-52 flex md:hidden xl:flex" src="{{ asset('assets/images/head/head-1.png') }}"
                    alt="" />
                <img class="w-36 md:w-52 flex md:hidden xl:flex" src="{{ asset('assets/images/head/head-1.png') }}"
                    alt="" />
            </div>
            <img class="h-36 min-w-36 md:h-fit" src="{{ asset('assets/images/head/head-1.png') }}" alt="" />
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
            width="100%" height="400" class="rounded-lg mt-5" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="paket-biasa py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h1 class="text-2xl md:text-3xl font-bold">Paket Wisata Biasa</h1>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
            <div
                class="flex flex-col gap-3 p-2 rounded-2xl hover:ring-1 group/button-pkt hover:ring-gray-300 transition-all ease-in-out">
                <div class="relative box-border overflow-hidden">
                    <img class="w-full rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}" alt="">
                    <div
                        class="absolute flex bottom-3 left-1/2 -translate-x-1/2 ml-3 w-full group-hover/button-pkt:-translate-y-0 transition-all ease-in-out box-border translate-y-20">
                        <a href="{{ route('paket') }}"
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
                    <img class="w-full rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}" alt="">
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
                    <img class="w-full rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}" alt="">
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
                    <img class=" z-[1] rounded-xl" src="{{ asset('assets/images/paket/spesial.png') }}" alt="">
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
@endsection
