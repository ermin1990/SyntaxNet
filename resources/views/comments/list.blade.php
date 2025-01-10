@if($comments)
    <h3 class="text-xl font-bold text-gray-900 mb-6">{{ $comments->count() }} Comments </h3>
    @foreach($comments as $comment)
        <div class="bg-gray-100 p-4 mb-1 hover:bg-gray-200">
            <div class="flex justify-between">
                <div>
                    <p><strong><a href=" {{ route('profile.show', $comment->user) }}">{{ $comment->user->name }}</a></strong> - {{ $comment->created_at->diffForHumans() }}</p>
                    <p>{{ $comment->textcomment }}</p>
                    @if(isset($showPost))
                        <div class="text-sm mt-2 p-2 py-1 rounded"><span class="text-gray-500">|| Commented on:</span>
                            <a class="text-blue-500 hover:text-blue-700"
                               href="{{route('post.show', $comment->post->slug)}}">{{$comment->post->title}}</a></div>
                    @endif
                </div>

                <div>
                    @if(Auth::check())
                    @if(Auth::id() === $comment->user_id || Auth::user()->role === 'admin')
                        <a href="{{route('comment.destroy', $comment->id)}}" class="text-red-600 hover:text-red-800">
                            @include('icons.delete')
                        </a>
                    @endif
                    @endif
                </div>

            </div>

        </div>
    @endforeach

@endif
