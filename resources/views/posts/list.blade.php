<div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 mb-4 transition-all duration-900 ease-in-out">
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('category.index', $post->category->slug) }}" class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded hover:bg-blue-800 hover:text-white">{{ $post->category->name }}</a>

        <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    </div>
    <a href="{{ route('post.show', $post->slug) }}" class="text-2xl font-bold text-gray-900 mb-2 hover:text-blue-800">{{ $post->title }}</a>
    <p class="text-gray-600 mb-4">{!! Str::limit(strip_tags(trim($post->description)), 50, ' ...') !!}</p>
    @if(isset($showAuthor))
    <p class="text-gray-600 mb-4 text-sm font-bold">Autor: {{ $post->user->name }}</p>
    @endif
    @if($post->tags->count() > 0)
    <div class="text-sm text-gray-500 m-4 ml-0">
        Tagovi:
        @foreach($post->tags as $tag)
            <a href="{{ route('tag.index', $tag->slug) }}" class="bg-gray-200 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2 hover:bg-blue-800 hover:text-white">{{ $tag->name }}</a>
        @endforeach
    </div>
    @endif
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">

            <a href="{{ route('post.show', $post->slug) }}#commentContent" class="flex items-center text-gray-500 hover:text-blue-600">
                @include('icons.comment')
                <span>{{ $post->comments->count() }}</span>
            </a>
        </div>
    </div>
    @auth
        <div class=" mb-4 flex justify-end">
            @if(auth()->id() === $post->user_id)
                <div class="flex gap-2">
                    <div class="mt-4">
                        <a href="{{ route('post.edit', $post->id) }}"
                           class=" text-yellow-500 hover:text-yellow-800">
                            @include('icons/edit')
                        </a>
                    </div>

                    <div class="mt-4">
                        <a class=" text-red-600 hover:text-red-800"
                           href="{{ route('post.destroy', $post->id) }}">
                            @include('icons/delete')
                        </a>
                    </div>
                </div>
            @endif
        </div>
    @endauth
</div>
