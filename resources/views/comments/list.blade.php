@if($comments)
   <h3 class="text-xl font-bold text-gray-900 mb-6">{{ $comments->count() }} Comments </h3>
    @foreach($comments as $comment)
        <div class="bg-gray-100 p-4 mb-1 hover:bg-gray-200">
            <div class="flex justify-between">
                <div>
                    <p><strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->diffForHumans() }}</p>
                    <p>{{ $comment->textcomment }}</p>
                </div>

                <div>
                    @if(Auth::id() === $comment->user_id)
                        <a href="{{route('comment.destroy', $comment->id)}}" class="text-sm text-white bg-red-500 px-2 py-1  rounded hover:bg-red-700">Delete</a>
                    @endif
                </div>

            </div>

        </div>
    @endforeach

@endif
