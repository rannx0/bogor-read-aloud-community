<!-- resources/views/blogs/create.blade.php -->

@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Create Blog</h1>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea name="overview" class="form-control" id="overview" required></textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control" id="cover_image">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" class="form-select" id="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags (Comma-separated)</label>
            <input type="text" name="tags" class="form-control" id="tags">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
