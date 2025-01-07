@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('category.index', $post->category->slug) }}" class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $post->category->name }}</a>
                <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $post->description }}</p>
            <p class="text-gray-600 mb-4 text-sm font-bold">Autor: {{ $post->user->name }}</p>
            @if($post->tags->count() > 0)
                <div class="text-sm text-gray-500 m-4 ml-0">
                    Tagovi:
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag.index', $tag->slug) }}" class="bg-gray-200 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2">{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif

            @auth
                @if(auth()->id() === $post->user_id)
                    <div class="flex gap-2">
                    <div class="mt-4">
                        <a href="{{ route('post.edit', $post->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Edit
                        </a>
                    </div>

                    <div class="mt-4">
                        <form action="{{ route('post.destroy', $post->id) }}">
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                Delete
                            </button>
                        </form>
                    </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endsection
