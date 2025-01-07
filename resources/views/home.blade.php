@extends('layouts.app')

@section('content')

    @if(Auth::check())
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Post</h2>
        @include('posts.create')

    @else
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Da biste postavili post, morate biti prijavljeni</h2>
        <a class=" px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200"
           href="{{route('login')}}">Prijavi se</a>
    @endif


    <div class="mt-5">
        <div class=" flex gap-4">
            @if($categories)
                <div>
                    <h2 class="font-bold text-gray-900 mb-1">Categories</h2>

                    @include('category.group')

                </div>
            @endif

            @if($alltags)
                <div>
                    <h2 class="font-bold text-gray-900 mb-1">Tags</h2>

                    @include('tag.group')

                </div>
            @endif


        </div>
        @if(isset($pages))

            <h2 class="font-bold text-3xl text-gray-900 mb-1">Pages</h2>
            <div class="flex gap-2 mb-4">
                @foreach($pages as $page)
                    @include('page.group')
                @endforeach
            </div>

        @endif

        <h2 class="text-3xl font-bold text-gray-900 mb-1">Recent Posts</h2>
        @if(isset($posts))
            @foreach($posts as $post)
                @include('posts.list', ['post' => $post])
            @endforeach
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-3xl font-bold text-gray-900 mb-8">Nema postova</p>
        @endif
    </div>

@endSection


