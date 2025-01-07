@extends('layouts.app')

@section('content')

    <h2 class="text-2xl font-bold text-gray-900 mb-8 bg-gray-50 p-4">Posts by Category: {{ $category->name }}</h2>

    @foreach($posts as $post)
        @include('posts.list', ['post' => $post])
    @endforeach
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endSection
