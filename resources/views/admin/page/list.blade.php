<tr class="hover:bg-blue-50 transition-all duration-200">
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
        <a href="{{ route('page.show', $page->slug) }}" class="text-blue-600 hover:text-blue-800 hover:underline">{{ $page->title }}</a>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $page->updated_at->format('F j, Y') }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $page->user->name }}</td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
        @auth
            @if(auth()->user()->role == 'admin')
                <div class="flex gap-2">
                    <a href="{{ route('admin.page.edit', $page->id) }}" class="text-yellow-500 hover:text-yellow-800">@include('icons.edit')</a>
                    <a href="{{ route('admin.page.delete', $page->id) }}" class="text-red-600 hover:text-red-800">@include('icons.delete')</a>
                </div>
            @endif
        @endauth
    </td>
</tr>
