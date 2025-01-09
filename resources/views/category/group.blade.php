<div class="flex flex-wrap gap-2">
@foreach($categories as $category)

    <a href="{{ route('category.index', $category->slug) }}" class="bg-white text-sm shadow-lg rounded-lg px-4 py-2 mb-4 hover:bg-gray-800 hover:text-white">
        {{ $category->name }} <span class="text-xs text-gray-500">({{ $category->posts->count() }})</span>
    </a>

@endforeach
</div>
