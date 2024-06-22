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
            <h1 class="text-3xl md:text-6xl font-bold">{{ $heroSections->title }} <span
                    class="text-primary-700">{{ $heroSections->span_title }}</span></h1>
            <h4 class="text-base md:text-xl text-slate-500 font-semibold">
                {{ $heroSections->subtitle }}
            </h4>
            <div class="flex gap-3">
                <a href="#destinasi"
                    class="btn-primary text-xs md:text-base py-3 px-5 md:px-8 hover:shadow-lg hover:-translate-y-1 transition-all ease-in-out w-fit rounded-full">Pesan
                    Sekarang</a>
                @if ($heroSections->video)
                    <a href="#"
                        class="btn-secondary text-xs md:text-base py-3 px-5 md:px-8 hover:shadow-lg hover:-translate-y-1 transition-all ease-in-out w-fit rounded-full flex gap-5 items-center"
                        onclick="openModal('{{ asset('storage/hero-section/' . $heroSections->video) }}')">
                        <img class="hidden md:flex" src="{{ asset('assets/images/icons/image.png') }}" alt="">
                        <span class="text-primary-700">Lihat Video</span>
                    </a>
                @endif
                <!-- Modal -->
                <div id="videoModal"
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden transition-opacity duration-300 ease-in-out">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-11/12 md:w-1/2">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal()"
                                class="text-3xl text-gray-600 hover:text-gray-900">&times;</button>
                        </div>
                        <div class="p-4">
                            <video id="modalVideo" controls class="w-full">
                                <source id="videoSource" src="" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>

                <script>
                    function openModal(videoUrl) {
                        const modalVideo = document.getElementById('modalVideo');
                        const videoSource = document.getElementById('videoSource');

                        videoSource.src = videoUrl;
                        modalVideo.load(); // Load the new video source
                        modalVideo.play(); // Start playing the video
                        document.getElementById('videoModal').classList.remove('hidden');
                        setTimeout(() => {
                            document.getElementById('videoModal').classList.add('opacity-100');
                        }, 10);
                    }

                    function closeModal() {
                        const modal = document.getElementById('videoModal');
                        const modalVideo = document.getElementById('modalVideo');
                        modal.classList.remove('opacity-100');
                        setTimeout(() => {
                            modal.classList.add('hidden');
                            modalVideo.pause();
                            document.getElementById('videoSource').src = "";
                        }, 300);
                    }
                </script>
            </div>
        </div>
        <div class="gap-3 items-center relative w-full justify-center md:w-fit md:justify-between flex order-1 md:order-2">
            <div class="flex flex-col h-fit gap-3">
                <img class="w-36 md:w-52 max-h-60 object-cover rounded-md flex md:hidden xl:flex"
                    src="{{ asset('storage/hero-section/' . $heroSections->image1) }}" alt="" />
                <img class="w-36 md:w-52 max-h-60 object-cover rounded-md flex md:hidden xl:flex"
                    src="{{ asset('storage/hero-section/' . $heroSections->image2) }}" alt="" />
            </div>
            <img class="w-36 max-h-60 object-cover rounded-md md:w-52"
                src="{{ asset('storage/hero-section/' . $heroSections->image3) }}" alt="" />
            <img class="absolute top-10 right-5 drop-shadow-lg hidden md:flex"
                src="{{ asset('assets/images/head/head-comp.png') }}" alt="">
        </div>
    </div>
    <div class="lokasi py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3 z-10">
        <h1 class="text-2xl md:text-3xl font-bold">Lokasi wisata Natural Bathing PAB</h1>
        <h4 class="md:text-xl text-slate-500 max-w-4xl">permandian alam baruttung terletak di desa matajang kecamatan
            kahu,
            kabupaten bone, profinsi sulawesi selatan indonesia</h4>
        @if ($mapSection)
            <iframe src="{{ $mapSection->google_map_url }}" width="100%" height="400" class="rounded-lg mt-5"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        @endif
    </div>
    <div id="destinasi" class="paket-biasa py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h1 class="text-2xl md:text-3xl font-bold">Paket Wisata Biasa</h1>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
            @foreach ($paketBiasas as $paket)
                <div
                    class="flex flex-col gap-3 p-2 rounded-2xl hover:ring-1 group/button-pkt hover:ring-gray-300 transition-all ease-in-out">
                    <div class="relative box-border overflow-hidden">
                        @php
                            $gambarArray = json_decode($paket->gambar, true);
                        @endphp
                        @if (!empty($gambarArray) && count($gambarArray) > 0)
                            <img class="w-full max-h-60 object-cover rounded-xl"
                                src="{{ asset('storage/paket_biasa/' . $gambarArray[0]) }}" alt="">
                        @else
                            <img class="w-full object-cover rounded-xl" src="{{ asset('assets/images/paket/biasa.png') }}"
                                alt="">
                        @endif
                        <div
                            class="absolute flex bottom-3 left-1/2 -translate-x-1/2 ml-3 w-full group-hover/button-pkt:-translate-y-0 transition-all ease-in-out box-border translate-y-20">
                            <a href="{{ route('detail', $paket->nama_paket) }}"
                                class="btn-primary hover:btn-secondary hover:bg-primary-700/95 hover:text-white hover:border-none hover:font-semibold transition-all ease-in-out w-[94%] py-3 rounded-md">Pesan
                                Paket</a>

                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="flex items-end gap-2">
                            <h1 class="text-xl font-semibold">Pengunjung</h1>
                            <span class="text-gray-500">/{{ $paket->nama_paket }}</span>
                        </div>
                        {{-- <div class="flex gap-2 items-center">
                            <i class="fa-solid fa-star text-secondary-700"></i>
                            <span
                                class="text-secondary-700">{{ $paket->review ? number_format(array_sum($paket->review) / count($paket->review), 1) : 'No Reviews' }}</span>
                        </div> --}}
                    </div>
                    <h2 class="text-3xl font-bold">Rp. {{ number_format($paket->harga, 0, ',', '.') }}</h2>
                </div>
            @endforeach
        </div>
    </div>
    <div class="paket-spesial py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex md:grid grid-cols-2 items-center">
        <div class="flex flex-col">
            <h1 class="text-2xl md:text-3xl font-bold">Paket Wisata Spesial</h1>
            <div class="flex flex-col gap-5 md:gap-3 my-5">
                @foreach ($paketSpesial as $paket)
                    <div
                        class="flex justify-between p-3 rounded-xl transition-all ease-in-out mb-5 items-center group hover:ring-1 hover:ring-primary-500">

                        <div class="flex gap-3 items-start">
                            <img class="object-contain w-24 h-24"
                                src="{{ asset('storage/paket_spesial/' . json_decode($paket->gambar)[0]) }}"
                                alt="{{ $paket->nama_paket }}">
                            <div class="flex flex-col gap-2">
                                <h1 class="text-base md:text-xl font-bold">{{ $paket->nama_paket }}</h1>
                                <h4 class="text-gray-500 text-sm font-semibold">{!! $paket->short_deskripsi !!}</h4>
                                <div class="md:justify-start text-xl md:text-3xl flex gap-2 items-end font-bold">
                                    Rp. {{ number_format($paket->harga, 0, ',', '.') }}
                                    <span class="text-sm d:text-base">/ malam</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('paket-spesial.detail', $paket->nama_paket) }}"
                            class="text-transparent group-hover:text-white group-hover:bg-primary-500 hover:bg-primary-700 rounded-lg py-2 px-4 hover:underline transition-all ease-in-out">Lihat
                            Detail</a>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="lg:flex flex-col gap-3 hidden">
            <div class="flex justify-end items-end gap-3">
                <div class="w-72">
                    <img class=" z-[1] rounded-xl" src="{{ asset('assets/images/paket-spesial/hero_2.png') }}"
                        alt="">
                </div>
                <div class="w-56">
                    <img class="w-full rounded-r-2xl rounded-tl-2xl object-cover z-0"
                        src="{{ asset('assets/images/paket-spesial/hero_3.png') }}" alt="">
                </div>
            </div>
            <div class="flex justify-end items-start gap-3">
                <div class="w-36">
                    <img class="w-full rounded-b-2xl rounded-tl-2xl object-cover z-0"
                        src="{{ asset('assets/images/paket-spesial/hero_1.png') }}" alt="">
                </div>
                <div class="h-56 w-96">
                    <img class="inset-3 w-full object-cover h-full z-[1]  rounded-xl"
                        src="{{ asset('assets/images/paket-spesial/hero_4.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div id="akomodasi" class="rekomendasi-hotel py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h2 class="text-2xl font-bold mb-5">Rekomendasi Hotel</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Helios Hotel & Convention Watampone</h3>
                    <p class="text-sm text-gray-500">Hotel bintang 3</p>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 725.079</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Hotel Grand Rofina</h3>
                    <p class="text-sm text-gray-500">Hotel bintang 2</p>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 331.170</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Hotel Mario Pulana Bone Mitra RedDoorz</h3>
                    <p class="text-sm text-gray-500">Hotel bintang 2</p>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 226.746</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">The Novena Hotel & Convention. Watampone</h3>
                    <p class="text-sm text-gray-500">Hotel bintang 2</p>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 507.290</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Boarding House Syariah MM Bone Mitra RedDoorz</h3>
                    <p class="text-sm text-gray-500">Hotel bintang 1</p>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 128.887</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">OYO 92337 Wisma Arwini Syariah</h3>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 56.318</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Sahabat Setia Homestay</h3>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 74.700</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Wisma Tenrisannae</h3>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 60.412</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Athaya kost</h3>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 58.766</p>
            </div>
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-md p-4">
                <div class="h-full">
                    <h3 class="text-lg font-semibold">Indekost Exclusive Anugrah</h3>
                </div>
                <p class="text-lg font-bold text-blue-500">Rp. 80.397</p>
            </div>
        </div>
    </div>
    <div id="tentang-kami" class="tentang py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h2 class="text-2xl font-bold mb-5">Tentang Kami</h2>
        <div class="p-6 mb-5">
            <h3 class="text-xl font-semibold mb-4">Selamat datang di Natural Bathing PAB</h3>
            <p class="text-gray-700 leading-relaxed">
                Kami adalah penyedia layanan pariwisata yang berdedikasi untuk membantu Anda menemukan keajaiban dan
                keindahan
                destinasi terbaik di Desa Matajang. Dari Permandian Alam yang menakjubkan hingga pegunungan yang memukau,
                kami
                siap membawa Anda menjelajahi surga tersembunyi di negeri ini.
            </p>
        </div>
        <h2 class="text-2xl font-bold mb-5">Misi Kami</h2>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed">
                Misi kami adalah memberikan pengalaman perjalanan yang tak terlupakan dengan pelayanan terbaik. Kami percaya
                bahwa setiap perjalanan harus menjadi cerita yang akan dikenang sepanjang hidup. Oleh karena itu, kami
                selalu berusaha menyediakan paket wisata yang disesuaikan dengan kebutuhan dan keinginan Anda.
            </p>
        </div>
    </div>
    <div id="aktivitas" class="aktivitas py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h2 class="text-2xl font-bold mb-5">Bagian Aktivitas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Jelajah Hutan</h3>
                <p class="text-gray-700 leading-relaxed mb-3">
                    Nikmati keindahan hutan tropis dengan pemandu wisata lokal yang berpengalaman.
                </p>
                {{-- <p class="text-lg font-bold text-primary-700 mb-3">Rp100.000</p> --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Bersepeda Gunung</h3>
                <p class="text-gray-700 leading-relaxed mb-3">
                    Rasakan sensasi bersepeda di pegunungan dengan pemandangan alam yang menakjubkan.
                </p>
                {{-- <p class="text-lg font-bold text-primary-700 mb-3">Rp150.000</p> --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Rafting Sungai</h3>
                <p class="text-gray-700 leading-relaxed mb-3">
                    Petualangan mendebarkan menyusuri sungai dengan arus yang menantang.
                </p>
                {{-- <p class="text-lg font-bold text-primary-700 mb-3">Rp200.000</p> --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Piknik di Taman</h3>
                <p class="text-gray-700 leading-relaxed mb-3">
                    Nikmati waktu bersantai bersama keluarga di taman yang indah.
                </p>
                {{-- <p class="text-lg font-bold text-primary-700 mb-3">Rp50.000</p> --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Camping Malam</h3>
                <p class="text-gray-700 leading-relaxed mb-3">
                    Pengalaman menginap di alam bebas dengan fasilitas lengkap.
                </p>
                {{-- <p class="text-lg font-bold text-primary-700 mb-3">Rp250.000</p> --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Tur Kebudayaan</h3>
                <p class="text-gray-700 leading-relaxed mb-3">
                    Pelajari budaya lokal melalui tur yang dipandu oleh penduduk setempat.
                </p>
                {{-- <p class="text-lg font-bold text-primary-700 mb-3">Rp120.000</p> --}}
            </div>
        </div>
        <div class="mt-6 flex justify-center">
            <a href="#"
                class="bg-primary-700 text-white py-2 px-4 rounded-full hover:bg-primary-600 transition duration-300 ease-in-out">
                Lihat Semua Aktivitas
            </a>
        </div>
    </div>

    <div class="layanan py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h2 class="text-2xl font-bold mb-5">Layanan Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Paket Wisata</h3>
                <p class="text-gray-700 leading-relaxed">
                    Pilihan paket wisata yang bervariasi, mulai dari wisata alam, budaya, kuliner, hingga petualangan
                    ekstrem.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Pemandu Wisata</h3>
                <p class="text-gray-700 leading-relaxed">
                    Pemandu wisata lokal yang ramah dan berpengetahuan, siap memberikan informasi dan pengalaman terbaik
                    selama perjalanan Anda.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Akomodasi</h3>
                <p class="text-gray-700 leading-relaxed">
                    Pilihan akomodasi yang nyaman dan sesuai dengan anggaran Anda, dari hotel berbintang hingga penginapan
                    lokal yang unik.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-3">Transportasi</h3>
                <p class="text-gray-700 leading-relaxed">
                    Layanan transportasi yang aman dan nyaman untuk memastikan mobilitas Anda selama berwisata tidak
                    terganggu.
                </p>
            </div>
        </div>
    </div>

    <!-- Bagian Testimonial -->
    <div class="testimonial py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3 relative">
        <h2 class="text-2xl font-bold mb-5">Bagian Testimonial</h2>
        <div class="swiper-container" id="testimonialSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide bg-white p-6 rounded-lg shadow-md flex flex-col items-start gap-4">
                    <img src="https://via.placeholder.com/50" alt="User Image"
                        class="w-12 h-12 rounded-full object-cover">
                    <div class="flex justify-between flex-col">
                        <p class="text-gray-700 h-full leading-relaxed">"Pelayanan sangat memuaskan dan tempatnya sangat
                            indah. Saya pasti akan kembali lagi!"</p>
                        <p class="font-bold text-gray-800">- John Doe</p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide bg-white p-6 rounded-lg shadow-md flex flex-col items-start gap-4">
                    <img src="https://via.placeholder.com/50" alt="User Image"
                        class="w-12 h-12 rounded-full object-cover">
                    <div class="flex justify-between flex-col">
                        <p class="text-gray-700 h-full leading-relaxed">"Pengalaman yang luar biasa, suasana alam yang
                            tenang
                            dan asri."</p>
                        <p class="font-bold text-gray-800">- Jane Smith</p>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide bg-white p-6 rounded-lg shadow-md flex flex-col items-start gap-4">
                    <img src="https://via.placeholder.com/50" alt="User Image"
                        class="w-12 h-12 rounded-full object-cover">
                    <div class="flex justify-between flex-col">
                        <p class="text-gray-700 h-full leading-relaxed">"Sangat direkomendasikan untuk keluarga yang ingin
                            berlibur."</p>
                        <p class="font-bold text-gray-800">- Alice Johnson</p>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide bg-white p-6 rounded-lg shadow-md flex flex-col items-start gap-4">
                    <img src="https://via.placeholder.com/50" alt="User Image"
                        class="w-12 h-12 rounded-full object-cover">
                    <div class="flex justify-between flex-col">
                        <p class="text-gray-700 h-full leading-relaxed">"Harga terjangkau dan fasilitas lengkap. Sangat
                            puas!"</p>
                        <p class="font-bold text-gray-800">- Bob Brown</p>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination mt-4"></div>
            <!-- Add Navigation -->
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
        </div>
        <div class="mt-6 flex justify-center">
            <a href="#"
                class="bg-primary-700 text-white py-2 px-4 rounded-full hover:bg-primary-600 transition duration-300 ease-in-out">
                Baca Lebih Banyak Ulasan
            </a>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq py-5 md:py-10 px-5 md:px-10 2xl:px-48 flex flex-col gap-3">
        <h2 class="text-2xl font-bold mb-5">FAQ</h2>
        <div class="space-y-4">
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Apa saja layanan yang ditawarkan oleh Natural Bathing PAB?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Kami menawarkan berbagai layanan pariwisata, termasuk paket wisata, pemandu wisata, akomodasi, dan
                    transportasi.
                    Detail lebih lanjut dapat Anda temukan di bagian "Layanan Kami" di situs web kami.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Bagaimana cara memesan paket wisata di Natural Bathing PAB?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Anda dapat memesan paket wisata melalui situs web kami dengan mengikuti langkah-langkah yang ditentukan.
                    Cukup pilih paket wisata yang Anda inginkan, isi formulir pemesanan, dan lakukan pembayaran sesuai
                    instruksi.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Metode pembayaran apa saja yang diterima?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Kami menerima berbagai metode pembayaran, termasuk transfer bank, kartu kredit, dan pembayaran digital
                    lainnya.
                    Informasi lengkap mengenai metode pembayaran akan tersedia saat Anda melakukan pemesanan.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Apakah ada kebijakan pembatalan?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Ya, kebijakan pembatalan kami bervariasi tergantung pada jenis layanan yang dipesan.
                    Detail kebijakan pembatalan akan diberikan saat proses pemesanan. Harap baca dengan cermat sebelum
                    melakukan konfirmasi pemesanan.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Apakah Natural Bathing PAB menyediakan layanan pemandu wisata
                        lokal?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Ya, kami menyediakan layanan pemandu wisata lokal yang berpengalaman dan berpengetahuan luas tentang
                    destinasi wisata.
                    Pemandu kami siap memberikan informasi dan pengalaman terbaik selama perjalanan Anda.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Apakah ada jaminan keamanan selama perjalanan?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Keselamatan dan keamanan Anda adalah prioritas kami. Kami bekerja sama dengan penyedia layanan yang
                    terpercaya
                    dan memastikan semua transportasi dan akomodasi memenuhi standar keselamatan yang tinggi.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Apakah Natural Bathing PAB menawarkan layanan khusus untuk kelompok
                        atau perusahaan?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Ya, kami menawarkan paket khusus untuk kelompok besar dan perusahaan yang ingin mengadakan acara,
                    outing, atau perjalanan bersama.
                    Silakan hubungi tim kami untuk informasi lebih lanjut dan penawaran khusus.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Apakah Natural Bathing PAB mendukung pariwisata
                        berkelanjutan?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Kami berkomitmen untuk mendukung pariwisata berkelanjutan yang bertanggung jawab terhadap lingkungan dan
                    budaya lokal.
                    Kami bekerja sama dengan mitra yang memiliki visi yang sama dan mendorong praktik ramah lingkungan dalam
                    setiap perjalanan.
                </div>
            </div>
            <div x-data="{ open: false }" class="border rounded-lg shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left flex justify-between items-center p-4 bg-white">
                    <span class="text-lg font-semibold">Bagaimana cara mendapatkan informasi terbaru tentang promosi dan
                        penawaran spesial?</span>
                    <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transform transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4 bg-gray-50 text-gray-600">
                    Anda dapat berlangganan newsletter kami untuk mendapatkan informasi terbaru tentang promosi, penawaran
                    spesial,
                    dan berita terbaru Natural Bathing PAB. Formulir berlangganan tersedia di bagian bawah situs web kami.
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('#testimonialSwiper', {
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
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    }
                }
            });
        });
    </script>
@endsection
