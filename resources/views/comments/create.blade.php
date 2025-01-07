<div class="p-2">
    <h2 class="text-xl font-bold text-gray-900 mb-6" >Comments</h2>

    <!-- Comment Form -->
    <form id="commentForm" class="mb-8" action="{{ route('comment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="mb-4">
            <textarea id="commentContent" name="textcomment" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2" placeholder="Write a comment..."></textarea>
        </div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" w-tid="103">
            Post Comment
        </button>
    </form>

</div>
