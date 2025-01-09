@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('category.index', $post->category->slug) }}"
                   class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $post->category->name }}</a>
                <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
            <p class="text-gray-600 mb-4">{!!  $post->description !!}</p>
            <a href="{{ route('profile.show', $post->user) }}" class="text-gray-600 mb-4 text-sm font-bold">Autor: {{ $post->user->name }}</a>
            @if($post->tags->count() > 0)
                <div class="text-sm text-gray-500 m-4 ml-0">
                    Tagovi:
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag.index', $tag->slug) }}"
                           class="bg-gray-200 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2">{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif

            @auth
                <div class=" mb-4 flex justify-end">
                    @if(auth()->id() === $post->user_id)
                        <div class="flex gap-2">
                            <div class="mt-4">
                                <a href="{{ route('post.edit', $post->id) }}"
                                   class="text-sm text-black bg-yellow-300 px-2 py-1 rounded hover:bg-yellow-400">
                                    Edit
                                </a>
                            </div>

                            <div class="mt-4">
                                <a class="text-sm text-white bg-red-500 px-2 py-1 rounded hover:bg-red-700"
                                   href="{{ route('post.destroy', $post->id) }}">Delete
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                @include('comments.create')
            @endauth
            @if(!auth()->check())
                <p class="text-red-500 mt-2 mb-4">Da biste komentarisali, morati biti prijavljeni <a
                        href="{{ route('login') }}" class=" font-bold">Login</a></p>
            @endif

            @if($post->comments->isNotEmpty())
                @include('comments.list', ['comments' => $post->comments])
            @else
                <p>No comments yet.</p>
            @endif
        </div>
    </div>
@endsection
