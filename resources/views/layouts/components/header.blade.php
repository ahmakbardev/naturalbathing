<header class="sticky top-0 z-[60]">
    <nav
        class="sticky top-0 flex justify-between items-center py-3 bg-white md:bg-white/50 backdrop-blur-sm px-5 md:px-10 z-[60]">
        <a href="/">
            <img class="w-16 object-contain" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
        </a>

        <!-- Mobile Nav -->
        <div class="lg:hidden burger-container flex items-center gap-5">
            @livewire('cart-button', ['idName' => 'cart-mobile'])
            <button id="burger" class="text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Desktop Nav -->
        <div class="hidden lg:flex gap-8 justify-between w-full items-center">
            <ul class="flex gap-8 w-full justify-center">
                @if (Route::currentRouteName() == 'home')
                    <li class="text-sm"><a href="#tentang-kami" class="scroll-smooth">Tentang Kami</a></li>
                    <li class="text-sm"><a href="#destinasi" class="scroll-smooth">Destinasi</a></li>
                    <li class="text-sm"><a href="#akomodasi" class="scroll-smooth">Akomodasi</a></li>
                    <li class="text-sm"><a href="#aktivitas" class="scroll-smooth">Aktivitas</a></li>
                    <li class="text-sm"><a href="#kontak" class="scroll-smooth">Kontak</a></li>
                    {{-- <li class="text-sm"><a href="#panduan-perjalanan" class="scroll-smooth">Panduan Perjalanan</a></li> --}}
                @else
                    <li class="text-sm"><a href="{{ route('home') }}#tentang-kami">Tentang Kami</a></li>
                    <li class="text-sm"><a href="{{ route('home') }}#destinasi">Destinasi</a></li>
                    <li class="text-sm"><a href="{{ route('home') }}#akomodasi">Akomodasi</a></li>
                    <li class="text-sm"><a href="{{ route('home') }}#aktivitas">Aktivitas</a></li>
                    <li class="text-sm"><a href="{{ route('home') }}#kontak">Kontak</a></li>
                    {{-- <li class="text-sm"><a href="{{ route('home') }}#panduan-perjalanan">Panduan Perjalanan</a></li> --}}
                @endif
            </ul>
            <ul class="flex gap-5 items-center">
                <li>
                    @livewire('cart-button', ['idName' => 'cart-desktop'])
                </li>
                @guest <!-- Jika pengguna belum login -->
                    @if (in_array(Route::currentRouteName(), ['login', 'register']))
                    @else
                        <li>
                            <a href="#" id="loginButton"
                                class="bg-primary-700 text-center py-3 px-5 rounded-full text-white">Masuk</a>
                        </li>
                    @endif
                @else
                    <li class="relative">
                        <button id="userMenuButton"
                            class="w-10 h-10 rounded-full bg-primary-700 text-white flex items-center justify-center focus:outline-none">
                            <i class="fas fa-user"></i>
                        </button>
                        <div id="userMenu"
                            class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-10 transform transition-transform duration-300 ease-in-out scale-95 opacity-0">
                            <a href="{{ route('pesanan.index') }}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Lihat Pesanan</a>
                            {{-- <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a> --}}
                            <a href="{{ route('logout') }}" id="logoutButton"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div id="mobile-menu"
        class="hidden lg:hidden absolute top-[88px] left-0 w-full bg-gray-200 z-50 transform -translate-y-full transition-transform duration-300 ease-in-out">
        <ul class="flex flex-col gap-8 items-center p-5">
            @if (Route::currentRouteName() == 'home')
                <li class="text-sm"><a href="#tentang-kami" class="scroll-smooth">Tentang Kami</a></li>
                <li class="text-sm"><a href="#destinasi" class="scroll-smooth">Destinasi</a></li>
                <li class="text-sm"><a href="#akomodasi" class="scroll-smooth">Akomodasi</a></li>
                <li class="text-sm"><a href="#aktivitas" class="scroll-smooth">Aktivitas</a></li>
                <li class="text-sm"><a href="#kontak" class="scroll-smooth">Kontak</a></li>
                {{-- <li class="text-sm"><a href="#panduan-perjalanan" class="scroll-smooth">Panduan Perjalanan</a></li> --}}
            @else
                <li class="text-sm"><a href="{{ route('home') }}#tentang-kami">Tentang Kami</a></li>
                <li class="text-sm"><a href="{{ route('home') }}#destinasi">Destinasi</a></li>
                <li class="text-sm"><a href="{{ route('home') }}#akomodasi">Akomodasi</a></li>
                <li class="text-sm"><a href="{{ route('home') }}#aktivitas">Aktivitas</a></li>
                <li class="text-sm"><a href="{{ route('home') }}#kontak">Kontak</a></li>
                {{-- <li class="text-sm"><a href="{{ route('home') }}#panduan-perjalanan">Panduan Perjalanan</a></li> --}}
            @endif
            <li>
                @guest <!-- Jika pengguna belum login -->
                    <a href="#" id="mobileLoginButton"
                        class="bg-primary-700 text-center py-3 px-5 rounded-full text-white">Masuk</a>
                @else
                    <!-- Jika pengguna sudah login -->
                <li>
                    <a href="{{ route('pesanan.index') }}">Lihat Pesanan</a>
                </li>
                {{-- <li>
                    <a href="#">Profile</a>
                </li> --}}
                <li>
                    <a href="{{ route('logout') }}" id="mobileLogoutButton">Logout</a>
                </li>
            @endguest
            </li>
        </ul>
    </div>
</header>

<!-- Popup Cart -->
<div id="popupCart" class="fixed inset-0 z-[12] bg-gray-900/30 bg-opacity-50 flex items-center hidden">
    <div id="CartContent"
        class="w-full absolute md:right-3 max-w-sm md:max-w-md mt-20 max-h-[80vh] md:max-h-[36rem] md:h-[36rem] p-3 rounded-md bg-white shadow-xl shadow-black/15 slide-in-right">
        @livewire('cart')
    </div>
</div>
@auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuButton = document.getElementById('userMenuButton');
            const userMenu = document.getElementById('userMenu');

            userMenuButton.addEventListener('click', function(event) {
                event.stopPropagation();
                userMenu.classList.toggle('hidden');

                if (userMenu.classList.contains('hidden')) {
                    userMenu.classList.remove('scale-100', 'opacity-100');
                    userMenu.classList.add('scale-95', 'opacity-0');
                } else {
                    userMenu.classList.remove('scale-95', 'opacity-0');
                    userMenu.classList.add('scale-100', 'opacity-100');
                }
            });

            document.addEventListener('click', function(event) {
                if (!userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                    userMenu.classList.remove('scale-100', 'opacity-100');
                    userMenu.classList.add('scale-95', 'opacity-0');
                }
            });
        });
    </script>
@endauth
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartButtonMobile = document.getElementById('cart-mobile');
        const cartButtonDesktop = document.getElementById('cart-desktop');
        const popupCart = document.getElementById('popupCart');
        const CartContent = document.getElementById('CartContent');
        const closePopup = document.getElementById('closePopup');

        function handleCartButtonClick() {
            if (popupCart.classList.contains('hidden')) {
                popupCart.classList.remove('hidden');
                setTimeout(() => {
                    CartContent.classList.remove('slide-in-right');
                    CartContent.classList.add('slide-in');
                }, 10); // slight delay to trigger transition
            } else {
                CartContent.classList.remove('slide-in');
                CartContent.classList.add('slide-in-right');
                setTimeout(() => {
                    popupCart.classList.add('hidden');
                }, 500); // duration of the slide-out animation
            }
        }

        if (window.innerWidth >= 1024) { // lg breakpoint
            cartButtonDesktop.addEventListener('click', handleCartButtonClick);
        } else {
            cartButtonMobile.addEventListener('click', handleCartButtonClick);
        }

        closePopup.addEventListener('click', function() {
            CartContent.classList.remove('slide-in');
            CartContent.classList.add('slide-in-right');
            setTimeout(() => {
                popupCart.classList.add('hidden');
            }, 500); // duration of the slide-out animation
        });

        // Close popup cart when clicking outside of CartContent
        document.addEventListener('click', function(event) {
            if (!popupCart.classList.contains('hidden') && !CartContent.contains(event.target) && event
                .target !== cartButtonDesktop && event.target !== cartButtonMobile) {
                CartContent.classList.remove('slide-in');
                CartContent.classList.add('slide-in-right');
                setTimeout(() => {
                    popupCart.classList.add('hidden');
                }, 500); // duration of the slide-out animation
            }
        });

        // Prevent closing when clicking inside CartContent
        CartContent.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
</script>
@guest
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginButton = document.getElementById('loginButton');
            const mobileLoginButton = document.getElementById('mobileLoginButton');
            const logoutButton = document.getElementById('logoutButton');
            const mobileLogoutButton = document.getElementById('mobileLogoutButton');
            const loginModal = document.getElementById('loginModal');
            const closeModal = document.getElementById('closeModal');

            function toggleModal() {
                loginModal.classList.toggle('hidden');
            }

            loginButton.addEventListener('click', function(event) {
                event.preventDefault();
                toggleModal();
            });

            mobileLoginButton.addEventListener('click', function(event) {
                event.preventDefault();
                toggleModal();
            });

            // logoutButton.addEventListener('click', function() {
            //     // Lakukan proses logout di sini
            // });

            // mobileLogoutButton.addEventListener('click', function() {
            //     // Lakukan proses logout di sini
            // });

            closeModal.addEventListener('click', function() {
                toggleModal();
            });

            // Periksa status login saat halaman dimuat
            const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
            if (isLoggedIn) {
                loginModal.classList.add('hidden');
            }
        });
    </script>

@endguest
