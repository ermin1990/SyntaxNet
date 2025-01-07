<div class="bg-white p-6 rounded-lg shadow">
    <a href="{{ route('page.show', $page->slug) }}" class="text-lg font-semibold text-gray-900 hover:text-blue-800">{{ $page->title }}</a>
    <div class="mt-4 flex items-center justify-between">
        <span class="text-sm text-gray-500">Last edited: {{ $page->updated_at->format('F j, Y') }}</span>

    </div>

    @if(Auth::check())
        @if(Auth::user()->id == $page->user_id)
            <div class=" flex space-x-2 mt-2 justify-end">
                <a href="{{ route('page.edit', $page->id) }}" class="text-blue-600 hover:text-blue-800">
                    @include('icons.edit')
                </a>
                <a href="{{ route('page.delete', $page->id) }}" class="text-red-600 hover:text-red-800">
                    @include('icons.delete')
                </a>
            </div>
        @endif
    @endif
</div>
