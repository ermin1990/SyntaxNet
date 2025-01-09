@extends('admin.layouts.admin')

@section('content')

<div class="w-full px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold text-gray-900 pb-2 inline-block">Edit User</h1>
    <p class="mt-2 text-lg text-gray-600">Update user information and permissions</p>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-xl max-w-2xl">
        <form id="editUserForm" action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="editName">Name</label>
                <input type="text" id="editName" name="name" value="{{ old('name', $user->name) }}"
                       class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hover:border-blue-500 transition-colors">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="editEmail">Email</label>
                <input type="email" id="editEmail" name="email" value="{{ old('email', $user->email) }}"
                       class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hover:border-blue-500 transition-colors">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="editRole">Role</label>
                <select id="editRole" name="role"
                        class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hover:border-blue-500 transition-colors">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                </select>
            </div>


            <div class="flex items-center justify-end gap-4 mt-8">
                <a href="{{ route('admin.users.index') }}"
                   class="px-6 py-3 bg-gray-200 text-gray-800 text-sm font-medium rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
