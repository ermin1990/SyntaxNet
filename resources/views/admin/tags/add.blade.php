@extends('admin.layouts.admin')

@section('content')

    <h2 class="text-2xl font-bold text-gray-900 mb-8 bg-gray-50 p-2">Add new tag</h2>

    <form action="{{ route('admin.tag.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
            <input
                class="shadow appearance-none border rounded w-60 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name" name="name" type="text">
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Save
            </button>
        </div>
    </form>
@endSection
