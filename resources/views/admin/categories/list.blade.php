<tr class="hover:bg-blue-50 transition-all duration-200">
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
        {{ $category->name }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $category->slug }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 bg-blue-100 text-blue-800">
                {{ $category->posts->count() }} posts
            </span>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
        <a href="{{ route('category.index', $category->slug) }}" class="text-blue-600 hover:text-blue-800 hover:underline font-semibold transition-all duration-200">Pogledaj postove</a>
    </td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 flex gap-2 justify-end">

        <a href="{{ route('admin.category.edit', $category->id) }}"
           class="text-blue-600 hover:text-blue-800 hover:underline font-semibold transition-all duration-200">@include('icons.edit')</a>
        <a href="{{ route('admin.category.delete', $category) }}"
           class="ml-4 text-red-600 hover:text-red-800 hover:underline font-semibold transition-all duration-200">@include('icons.delete')</a>

    </td>
</tr>
