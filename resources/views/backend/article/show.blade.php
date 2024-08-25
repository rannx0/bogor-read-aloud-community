<!-- resources/views/blogs/show.blade.php -->

@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>
    <p><strong>Overview:</strong> {{ $blog->overview }}</p>

    @if ($blog->cover_image)
        <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="Cover Image" class="mt-2" width="400">
    @endif

    <p><strong>Category:</strong> {{ $blog->category->name }}</p>

    <p><strong>Tags:</strong>
        @foreach($blog->tags as $tag)
            <span class="badge bg-info">{{ $tag->name }}</span>
        @endforeach
    </p>

    <p><strong>Description:</strong> {{ $blog->description }}</p>
</div>
@endsection
