<!-- resources/views/blogs/index.blade.php -->

@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Blog List</h1>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
    <table class="table mt-4 table-primary table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $i => $blog)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>
                        <img src="{{ Storage::url($blog->cover_image)}}" alt="" class="img-fluid" style="width: 75px">
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
