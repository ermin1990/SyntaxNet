@extends('admin.layouts.admin')

@section('content')

    <h2 class="text-2xl font-bold text-gray-900 mb-8 bg-gray-50 p-2">Edit tag</h2>

    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <form method="POST" action="{{ route('admin.tag.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Name" required>
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Save
            </button>
        </form>
    </div>

@endSection
