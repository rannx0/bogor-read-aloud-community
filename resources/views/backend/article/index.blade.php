<!-- resources/views/blogs/index.blade.php -->

@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Blog List</h1>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Overview</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->overview }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>
                        @foreach($blog->tags as $tag)
                            <span class="badge bg-info">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
