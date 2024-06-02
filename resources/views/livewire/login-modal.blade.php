<div id="loginModal"
    class="fixed inset-0 flex z-20 items-center justify-center bg-black bg-opacity-50 @if ($modalHidden) hidden @endif">
    <div class="bg-white p-6 rounded shadow-lg w-1/3">
        <button id="closeModal" class="float-right">✖</button>
        <h2 class="text-2xl mb-4">Login</h2>

        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block">Email:</label>
                <input type="email" id="email" wire:model="email" class="w-full p-2 border rounded">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block">Password:</label>
                <input type="password" id="password" wire:model="password" class="w-full p-2 border rounded">
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Login</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('loginModal');
        var hasError = {!! session()->has('error') ? 'true' : 'false' !!};

        if (hasError) {
            modal.classList.remove('hidden');
        }

        document.getElementById('closeModal').addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    });
</script>
