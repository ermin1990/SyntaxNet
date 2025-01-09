@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">{{ $page->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">Published by: {{ $page->user->name }}</p>
        <div class="prose">
            {!! $page->textcontent !!}
        </div>
    </div>
@endsection
