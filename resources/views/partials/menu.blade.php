<nav class="bg-gray-900 text-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="hover:text-brown-400 transition duration-150">Home</a>
                <a href="{{ route('products') }}" class="hover:text-brown-400 transition duration-150">Produk</a>
                <a href="{{ route('custom') }}" class="hover:text-brown-400 transition duration-150">Custom</a>
                <a href="{{ route('about') }}" class="hover:text-brown-400 transition duration-150">Tentang</a>
                <a href="{{ route('contact') }}" class="hover:text-brown-400 transition duration-150">Kontak</a>
            </div>

            <!-- Tombol Logout di Paling Kanan -->
            @auth
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button type="submit" class="px-4 py-2 bg-brown-600 text-white rounded hover:bg-brown-700 text-sm font-semibold">
                    Logout
                </button>
            </form>
            @endauth

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" class="mobile-menu-button text-gray-400 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 hover:bg-gray-700 rounded-md">Home</a>
            <a href="{{ route('products') }}" class="block px-3 py-2 hover:bg-gray-700 rounded-md">Produk</a>
            <a href="{{ route('custom') }}" class="block px-3 py-2 hover:bg-gray-700 rounded-md">Custom</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 hover:bg-gray-700 rounded-md">Tentang</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 hover:bg-gray-700 rounded-md">Kontak</a>
        </div>
    </div>
</nav>

<!-- Mobile Menu JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('.mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    });
</script> 