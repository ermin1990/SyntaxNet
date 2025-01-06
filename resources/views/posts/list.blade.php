<div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 mb-4">
    <div class="flex justify-between items-center mb-4">
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $post->category->name }}</span>

        <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    </div>
    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
    <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 150) }}</p>
    <p class="text-gray-600 mb-4 text-sm font-bold">Objavio: {{ $post->user->name }}</p>
    @if($post->tags->count() > 0)
    <div class="text-sm text-gray-500 m-4 ml-0">
        Tagovi:
        @foreach($post->tags as $tag)
            <span class="bg-gray-200 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2">{{ $tag->name }}</span>
        @endforeach
    </div>
    @endif
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <button class="flex items-center text-gray-500 hover:text-blue-600">
                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span>{{ $post->comments_count }}</span>
            </button>
            <button class="flex items-center text-gray-500 hover:text-blue-600">
                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                <span>{{ $post->likes_count }}</span>
            </button>
        </div>
        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold">Opširnije →</a>
    </div>
</div>
