<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natural Bathing PAB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Append version number to CSS file name -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.08') }}">
    <!-- Add cache-control headers for CSS and JavaScript files -->
    <link rel="preload" href="{{ asset('css/app.css?v=1.08') }}" as="style" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"
        integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTn7YB2Zf2E2b9A0ZwX+FQ2v8keP0qO/J/3b1m6F1C5GpGVPYdF0t+2KP3lup5jrhfXHfnfXfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    {{-- @livewireStyles --}}
    @livewireStyles
    @yield('assets')
</head>

<body class="overflow-x-hidden box-border">
    @include('layouts.components.header')
    <main class="overflow-x-hidden box-border">
        @livewire('login-modal')
        @yield('content')
    </main>
    <!-- component -->
    @include('layouts.components.footer')
    @livewireScripts
    @yield('scripts')
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
