<footer class="bg-gray-800 text-white py-8" >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" >
            <div>
                <h3 class="text-xl font-bold mb-4">About Us</h3>
                <p class="text-gray-400" >Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li ><a href="/" class="text-gray-400 hover:text-white">Home</a></li>
                    <li ><a href="/pages" class="text-gray-400 hover:text-white">Pages</a></li>
                </ul>
            </div>
            <div w-tid="124">
                <h3 class="text-xl font-bold mb-4">Categories</h3>
                <ul class="space-y-2">
                    <li><a href="/category/frontend" class="text-gray-400 hover:text-white">Frontend</a></li>
                    <li><a href="/category/backend" class="text-gray-400 hover:text-white">Backend</a></li>
                 </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="https://github.com" class="text-gray-400 hover:text-white">
                    </a>
                    <a href="https://facebook.com" class="text-gray-400 hover:text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                    </a>
                    <a href="https://linkedin.com" class="text-gray-400 hover:text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400">© {{ date('Y') }} {{ config('app.name') }} All rights reserved.</p>
        </div>
    </div>
</footer>
