<div class="bg-white rounded shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="p-6">
        <div class="block">
            <a href="{{ route('page.show', $page->slug) }}" class="text-balance hover:text-blue-800 text-xl font-bold text-gray-900 mb-2">{{ $page->title }}</a>
        </div>
        <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($page->textcontent, 50) }}</p>

        <div class="flex items-center justify-between text-sm text-gray-500">
            <span>Last edited: {{ $page->updated_at->format('F j, Y') }}</span>

        </div>
        <a href="{{ route('profile.show', $page->user) }}" class="px-2 py-1 mt-2 text-xs font-medium bg-gray-100 text-black">Autor: {{ $page->user->name }}</a>
    </div>

</div>
