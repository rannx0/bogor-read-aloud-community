@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Gallery</h1>
    <a href="{{ route('galleries.create') }}" class="btn btn-primary">Add New</a>
    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    <div class="row mt-4">
        @foreach($galleries as $gallery)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ Storage::url($gallery->image_path) }}" class="card-img-top" alt="{{ $gallery->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
