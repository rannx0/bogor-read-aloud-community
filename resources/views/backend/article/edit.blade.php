<!-- resources/views/blogs/edit.blade.php -->

@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Blog</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $blog->title }}" required>
        </div>

        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea name="overview" class="form-control" id="overview" required>{{ $blog->overview }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control" id="cover_image">
            @if ($blog->cover_image)
                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="Cover Image" class="mt-2" width="200">
            @endif
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" class="form-select" id="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($blog->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags (Comma-separated)</label>
            <input type="text" name="tags" class="form-control" id="tags" value="{{ $blog->tags->pluck('name')->implode(', ') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $blog->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
