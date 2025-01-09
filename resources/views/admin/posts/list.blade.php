
                        <tr class="hover:bg-blue-50 transition-all duration-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                <a href="{{ route('post.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800 hover:underline">{{ $post->title }}</a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
                                <a href="{{ route('category.index', $post->category->slug) }}" class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded hover:bg-blue-800 hover:text-white">{{ $post->category->name }}</a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $post->created_at->diffForHumans() }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700 @if($post->status == 'published') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif uppercase">{{ $post->status }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tag.index', $tag->slug) }}" class="bg-gray-200 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2 hover:bg-blue-800 hover:text-white">{{ $tag->name }}</a>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $post->user->name }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                @auth
                                    @if(auth()->user()->role == 'admin')
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.post.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-800">@include('icons.edit')</a>
                                            <a href="{{ route('admin.post.delete', $post->id) }}" class="text-red-600 hover:text-red-800"> @include('icons.delete')</a>
                                        </div>
                                    @endif
                                @endauth
                            </td>
                        </tr>

