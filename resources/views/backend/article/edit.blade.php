@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Blog</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="blog-form">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label w-50">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $blog->title }}" required>
        </div>

        <div class="mb-3 d-flex">
            <div class="me-2">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" id="cover_image">
            </div>
        
            <div>
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-select" id="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea name="overview" class="form-control" id="overview" required>{{ $blog->overview }}</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>

            <!-- Custom Toolbar -->
            <div id="toolbar">
                <!-- Add all the buttons and options you need -->
                <select class="ql-font"></select>
                <select class="ql-size"></select>
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <button class="ql-strike"></button>
                <select class="ql-color"></select>
                <select class="ql-background"></select>
                <button class="ql-header" value="1"></button>
                <button class="ql-header" value="2"></button>
                <button class="ql-blockquote"></button>
                <button class="ql-code-block"></button>
                <button class="ql-list" value="ordered"></button>
                <button class="ql-list" value="bullet"></button>
                <button class="ql-indent" value="-1"></button>
                <button class="ql-indent" value="+1"></button>
                <button class="ql-direction" value="rtl"></button>
                <select class="ql-align"></select>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
                <button class="ql-video"></button>
                <button class="ql-clean"></button>
            </div>

            <!-- Quill Editor -->
            <div id="editor" style="height: 300px;">{!! $blog->description !!}</div>

            <!-- Hidden textarea for form submission -->
            <textarea name="description" id="description" style="display:none;">{!! $blog->description !!}</textarea>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags (Comma-separated)</label>
            <input type="text" name="tags" class="form-control" id="tags" value="{{ $blog->tags }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- quill js -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
    var quill = new Quill('#editor', {
        modules: {
            toolbar: '#toolbar'
        },
        theme: 'snow'
    });

    var form = document.getElementById('blog-form');
    form.onsubmit = function() {
        // Copy the HTML content from Quill editor to the hidden textarea
        var description = document.querySelector('#description');
        description.value = quill.root.innerHTML;
    };
</script>
@endsection
