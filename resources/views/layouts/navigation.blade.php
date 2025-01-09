<script>
    const navLinks = [
        { name: 'Home', href: '/' },
        { name: 'Pages', href: '/page' },
        { name: 'About', href: '/about' },

    ];

    function toggleMobileMenu(open) {
        const mobileMenu = document.getElementById('mobile-menu');
        if (open) {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('fixed', 'inset-0', 'bg-gray-900', 'bg-opacity-90', 'z-50', 'flex', 'flex-col', 'items-center', 'justify-center');
        } else {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('fixed', 'inset-0', 'bg-gray-900', 'bg-opacity-90', 'z-50', 'flex', 'flex-col', 'items-center', 'justify-center');
        }
    }
</script>

<nav class="bg-gray-800 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                    </svg>
                    <span class="font-bold text-xl">SyntaxNet</span>
                </a>

                <div class="md:hidden ml-4">
                    <button id="mobile-menu-button" onclick="toggleMobileMenu(true)" class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-4">
                        <script>
                            navLinks.forEach(link => {
                                document.write(`<a href="${link.href}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 transition-colors duration-200">${link.name}</a>`);
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                @if(Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <a href="{{ route('admin.index') }}" class="px-4 py-2 text-sm font-medium bg-white rounded text-black hover:bg-gray-700 hover:text-white transition-colors duration-200">Admin</a>
                @endif


                    <a href="/profile/{{Auth::user()->id}}" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-200">Moj profil</a>
                    <form action="{{route('logout')}}">
                        <button type="submit" class="px-4 py-2 text-sm font-medium bg-red-600 text-white rounded-md hover:bg-red-700 hover:text-white transition-colors duration-200">Logout</button>
                    </form>
                @else
                    <a href="/login" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-200">Login</a>
                    <a href="/register" class="px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">Register</a>
                @endif
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-gray-900 bg-opacity-90 z-50 flex flex-col items-center justify-center">
            <button onclick="toggleMobileMenu(false)" class="absolute top-4 right-4 text-gray-200 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <script>
                    navLinks.forEach(link => {
                        document.write(`<a href="${link.href}" onclick="toggleMobileMenu(false)" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">${link.name}</a>`);
                    });
                </script>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="px-2 space-y-1">
                    <div class="flex items-center px-3 py-2">
                        <input type="text" class="w-full bg-gray-700 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                    </div>
                    <a href="/login" onclick="toggleMobileMenu(false)" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Login</a>
                    <a href="/register" onclick="toggleMobileMenu(false)" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Register</a>
                </div>
            </div>
        </div>
    </div>
</nav>
