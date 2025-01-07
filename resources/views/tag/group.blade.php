<div class="flex flex-wrap gap-2">
    @foreach($alltags as $tag)

        <a href="{{ route('tag.index', $tag->slug) }}" class="bg-white text-sm shadow-lg rounded-lg px-4 py-2 mb-4 hover:bg-gray-800 hover:text-white">
            <h3>{{ $tag->name }}</h3>
        </a>
    @endforeach
</div>
