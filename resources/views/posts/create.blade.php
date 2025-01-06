
<div class="bg-white shadow-lg rounded-lg p-6">
    <form id="newPostForm" class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700" w-tid="54">Title</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                <option value="">Select a category</option>
                <option value="technology">Technology</option>
                <option value="design">Design</option>
                <option value="development">Development</option>
                <option value="business">Business</option>
            </select>
        </div>

        <div>
            <label for="editor" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="10" id="editor" class="mt-1 p-2 block w-full border-gray-300 shadow-sm"></textarea>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" w-tid="68">
                Publish Post
            </button>
            <button type="button" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" w-tid="69">
                Save Draft
            </button>
        </div>
    </form>
</div>
