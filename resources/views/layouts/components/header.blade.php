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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
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
                    <button id="cart" class="relative">
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
<!-- Popup Cart -->
<div id="popupCart"
    class="fixed inset-0 z-[12] bg-gray-900/30 bg-opacity-50 flex items-center justify-center hidden">
    @include('components.popupCart')
</div>

@section('scripts')
    <script>
        document.getElementById('cart').addEventListener('click', function() {
            const popupCart = document.getElementById('popupCart');
            const CartContent = document.getElementById('CartContent');
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
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            const popupCart = document.getElementById('popupCart');
            const CartContent = document.getElementById('CartContent');
            CartContent.classList.remove('slide-in');
            CartContent.classList.add('slide-in-right');
            setTimeout(() => {
                popupCart.classList.add('hidden');
            }, 500); // duration of the slide-out animation
        });
    </script>
@endsection
