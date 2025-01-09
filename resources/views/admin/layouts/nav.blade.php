@php
    $navigationLinks = [
        [
            'label' => 'Dashboard',
            'url' => '/admin',
        ],
        [
            'label' => 'Users',
            'url' => '/admin/users',
        ],
        [
            'label' => 'Posts',
            'url' => '/admin/posts',
        ],
        [
            'label' => 'Pages',
            'url' => '/admin/page',
        ],
        [
            'label' => 'Tags',
            'url' => '/admin/tag',
        ],

        [
            'label' => 'Categories',
            'url' => '/admin/category',
        ],

    ];
@endphp

<nav class="bg-black text-white shadow-2xl w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo and Links -->
            <div class="flex items-center">
                <a href="{{ route('admin.index') }}" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01-.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                    </svg>
                    <span class="font-bold text-xl">Admin Dashboard</span>
                </a>
                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-4">
                        @foreach ($navigationLinks as $link)
                            <a href="{{ $link['url'] }}"
                               class="px-3 py-2 rounded-md text-sm font-medium text-gray-200 hover:bg-blue-700 hover:text-white transition-colors duration-200">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="hidden md:flex items-center space-x-4">
                <a class="px-3 py-2 rounded-md text-sm font-medium bg-blue-700 text-white transition-colors hover:bg-blue-800 duration-200" href="{{ route('home') }}">Visit site</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium bg-red-600 text-gray-200 hover:bg-red-700 hover:text-white transition-colors duration-200">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden ml-4">
                <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-black w-full">
        <div class="px-4 pt-2 pb-3 space-y-1 w-full">
            @foreach ($navigationLinks as $link)
                <a href="{{ $link['url'] }}"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-200 hover:bg-blue-700 hover:text-white">
                    {{ $link['label'] }}
                </a>
            @endforeach
            @if(Auth::check())
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="block px-3 py-2 rounded-md text-base font-medium bg-red-600 text-gray-200 hover:bg-red-700 hover:text-white w-full">
                    Logout
                </button>
            </form>
                @endif
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function () {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>
