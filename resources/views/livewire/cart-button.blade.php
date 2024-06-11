<div>
    <button id="{{ $idName }}" class="relative">
        @if ($itemCount > 0)
            <span class="bg-red-500 text-white text-[10px] font-semibold px-1.5 py-0.5 rounded-full absolute -top-4 -right-3">{{ $itemCount }}</span>
        @endif
        <img class="max-w-10" src="{{ asset('assets/images/icons/cart.png') }}" alt="Cart">
    </button>
</div>
