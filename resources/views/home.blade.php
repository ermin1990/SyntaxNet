@extends('layouts.app')

@section('content')

    @if(Auth::check())
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Create Post</h2>
    @include('posts.create')
    </div>
    @else
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Da biste postavili post, morate biti prijavljeni</h2>
        <a class=" px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200" href="{{route('login')}}">Prijavi se</a>
    </div>
    @endif


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Recent Posts</h2>
    @include('posts.list')
    </div>



@endSection


