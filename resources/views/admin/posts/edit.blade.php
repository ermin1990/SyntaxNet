@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Autor:</label>
                    <h3 class=" text-xl font-medium text-gray-700 mb-4">{{ $post->user->name }}</h3>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                        <option value="">Select a status</option>
                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label for="tag" class="block text-sm font-medium text-gray-700">Tags</label>
                    <select id="tag" name="tag[]" multiple
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                        @foreach($alltags as $tag)
                            <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tag.*')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Content</label>

                    <textarea name="description" id="textcontent"
                              class="mt-1 p-2 block w-full border-gray-300 shadow-sm">{{ old('description', $post->description) }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex items-center space-x-4">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
