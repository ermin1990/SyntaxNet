<div class="container mx-auto p-2">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="space-y-4">
            <!-- Accordion Button -->
            <div class="border-b flex items-center justify-between">
                <button id="toggleAccordion" class="w-full text-left py-3 text-xl font-semibold text-gray-800 focus:outline-none">
                    <span>Kreiraj novi post</span>
                </button>
                <span id="plusBtn" class="text-black text-3xl font-bold text-right transition-all duration-900 ease-in-out">＋</span>

            </div>

            <!-- Accordion Content -->
            <div id="accordionContent" class="hidden space-y-6 transition-all duration-900 ease-in-out">
                <form action="{{ route('post.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tag" class="block text-sm font-medium text-gray-700">Tag</label>
                        <select id="tag" name="tag[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                            @foreach($alltags as $tag)
                                <option value="{{ $tag->id }}" {{ is_array(old('tag')) && in_array($tag->id, old('tag')) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag.*')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="description" rows="10" class="mt-1 p-2 block w-full border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Publish Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tailwind JS for toggling -->
<script>
    const toggleButton = document.getElementById('toggleAccordion');
    const accordionContent = document.getElementById('accordionContent');
    const plusBtn = document.getElementById('plusBtn');

    toggleButton.addEventListener('click', () => {
        accordionContent.classList.toggle('hidden');
        plusBtn.classList.toggle('rotate-45');
    });
</script>
