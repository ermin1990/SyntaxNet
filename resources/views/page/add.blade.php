@extends('layouts.app')

@section('content')

    <div class="bg-white shadow-lg rounded-lg p-6">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h1 class="text-4xl font-bold text-gray-900">Create New Post</h1>
                <p class="mt-2 text-lg text-gray-600">Share your thoughts with the community</p>
            </div>

        <form id="newPostForm" class="space-y-6" action="{{ route('page.store') }}" method="POST">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="textcontent" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="textcontent" name="textcontent" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Publish</button>
        </form>
    </div>
@endsection