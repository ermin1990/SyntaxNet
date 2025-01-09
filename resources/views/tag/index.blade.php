@extends('layouts.app')

@section('content')

    <h2 class="text-2xl font-bold text-gray-900 mb-8 bg-gray-50 p-2">Posts by Tag: {{ $tag->name }}</h2>

    @if($posts && count($posts) > 0)
    @foreach($posts as $post)
        @include('posts.list', ['post' => $post])
    @endforeach
    @else
        <p class="text-center text-gray-600">No posts found</p>
    @endif
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endSection

