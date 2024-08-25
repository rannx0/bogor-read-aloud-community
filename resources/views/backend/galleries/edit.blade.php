@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Gallery</h1>
    <form action="{{ route('galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" id="gallery-form">
        @csrf
        @method('PUT')

        <!-- Preview Image -->
        <div class="mb-3">
            <label for="current_image">Current Image:</label>
            <div>
                <img id="current_image" src="{{ Storage::url($gallery->image_path) }}" alt="Current Image" class="img-fluid" style="max-width: 300px;">
            </div>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image">New Image:</label>
            <input type="file" id="image" name="image" class="form-control" />
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Preview of New Image -->
        <div class="mb-3">
            <label for="new_image_preview">New Image Preview:</label>
            <div>
                <img id="new_image_preview" src="#" alt="New Image Preview" class="img-fluid" style="max-width: 300px; display: none;">
            </div>
        </div>

        <!-- Title Input -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}" required>
        </div>

        <div class="text-start mt-3">
            <button type="submit" form="gallery-form" class="btn btn-primary rounded-pill">Submit</button>
            <a href="{{ route('galleries.index') }}" class="btn btn-outline-danger rounded-pill">Back</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('new_image_preview');
        const reader = new FileReader();

        if (file) {
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endsection