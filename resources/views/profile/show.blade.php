@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gray-800 h-48 relative">
            <div class="absolute bottom-0 left-0 w-full transform translate-y-1/2 flex justify-center">
                <div class="h-32 w-32 rounded-full border-4 border-white bg-white">
                    <img id="profileImage" src="https://via.placeholder.com/128" alt="Profile" class="h-full w-full rounded-full object-cover">
                </div>
            </div>
        </div>

        <div class="pt-20 px-6 pb-6">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900" id="userName">{{ $user->name }}</h1>
                <p class="text-gray-600" id="userBio">{{ $user->email }}</p>
            </div>

            <div class="flex justify-center space-x-8 mb-8">
                <div class="text-center">
                    <span class="block text-2xl font-bold text-gray-900" id="postsCount">{{ $user->posts->count() }}</span>
                    <span class="text-gray-600">Posts</span>
                </div>
                <div class="text-center">
                    <span class="block text-2xl font-bold text-gray-900" id="commentsCount">{{ $user->comments->count() }}</span>
                    <span class="text-gray-600">Comments</span>
                </div>
                <div class="text-center">
                    <span class="block text-2xl font-bold text-gray-900" id="pagesCount">5</span>
                    <span class="text-gray-600">Pages</span>
                </div>
            </div>

            <div class="border-b border-gray-200">
                <nav class="-mb-px flex justify-center space-x-8">
                    <button id="postsTab" class="tab-button border-b-2 border-blue-500 px-1 py-4 text-sm font-medium text-blue-600" data-target="postsGrid">Posts</button>
                    <button id="commentsTab" class="tab-button border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="commentsGrid">Comments</button>
                    <button id="pagesTab" class="tab-button border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="pagesGrid">Pages</button>
                </nav>
            </div>

            <div class="mt-8">
                <div id="postsGrid" class="tab-content flex flex-wrap -mx-4">
                    @if($user->posts()->count() > 0)
                        @foreach($user->postPagination(4) as $post)
                            <div class="w-full md:w-1/2 px-4 mb-6">

                                    @include('posts.list', ['post' => $post, 'showAutor' => false])

                            </div>
                        @endforeach
                        <div class="w-full mt-8 flex justify-center">
                            {{ $user->postPagination(4)->links() }}
                        </div>
                    @else
                        <p class="text-center text-gray-600 w-full">No posts yet</p>
                    @endif
                </div>


            </div>

                <div id="commentsGrid" class="tab-content hidden space-y-4">
                    @if($user->comments->count() > 0)
                        @include('comments.list', ['comments' => $user->comments, 'showPost' => true])
                    @else
                        <p>No comments yet</p>
                    @endif
                </div>

                <div id="pagesGrid" class="tab-content hidden grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-900">About Us</h3>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm text-gray-500">Last edited: 1 week ago</span>
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Published</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-button');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs
                    tabs.forEach(t => {
                        t.classList.remove('border-blue-500', 'text-blue-600');
                        t.classList.add('border-transparent', 'text-gray-500');
                    });

                    // Hide all content
                    contents.forEach(content => content.classList.add('hidden'));

                    // Activate clicked tab
                    tab.classList.add('border-blue-500', 'text-blue-600');
                    tab.classList.remove('border-transparent', 'text-gray-500');

                    // Show related content
                    const targetId = tab.dataset.target;
                    const targetContent = document.getElementById(targetId);
                    targetContent.classList.remove('hidden');
                });
            });
        });
    </script>
@endsection
