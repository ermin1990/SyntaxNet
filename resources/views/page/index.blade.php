@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Pages</h1>
                    <p class="mt-2 text-lg text-gray-600">Browse all pages</p>
                </div>
                <a href="{{ route('page.addnew') }}"
                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    New Page
                </a>
            </div>
        </div>

        <div class="pages">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @if(isset($pages))
                        @foreach($pages as $page)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                <div class="p-6">
                                    <div class="block">
                                        <a href="{{ route('page.show', $page->slug) }}" class=" hover:text-blue-800 text-xl font-bold text-gray-900 mb-2">{{ $page->title }}</a>
                                    </div>
                                    <p class="text-gray-600 mb-4">{!! \Illuminate\Support\Str::limit($page->textcontent, 120) !!}</p>
                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span>Last edited: {{ $page->updated_at->format('F j, Y') }}</span>

                                    </div>
                                    <a href="{{ route('profile.show', $page->user) }}" class="px-2 py-1 mt-2 text-xs font-medium bg-gray-100 text-black">Autor: {{ $page->user->name }}</a>
                                    @if(Auth::check())
                                        @if(Auth::user()->id == $page->user_id)
                                            <div class="flex space-x-2 mt-2 justify-end">
                                                <a href="{{ route('page.edit', $page->id) }}"
                                                   class="text-blue-600 hover:text-blue-800">
                                                    @include('icons.edit')
                                                </a>
                                                <a href="{{ route('page.delete', $page->id) }}"
                                                   class="text-red-600 hover:text-red-800">
                                                    @include('icons.delete')
                                                </a>
                                            </div>

                                        @endif
                                    @endif
                                </div>

                            </div>

                        @endforeach
                    @endif
                </div>
            </div>


        </div>


    </div>
@endsection
