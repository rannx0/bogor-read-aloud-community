@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1 class=" mb-4">Create New Slider</h1>

    <!-- Form Upload -->
    <form id="slider-form" enctype="multipart/form-data" method="POST" action="{{ route('sliders.store') }}">
        @csrf
        <!-- Drag and Drop Area -->
        <div id="dropzone" class="border p-4 text-center mb-3 shadow">
            <p>Drag & Drop image(s) here</p>
            <p><i class="h1 text-muted dripicons-cloud-upload align-center"></i></p>
            <input id="file-input" name="files[]" type="file" multiple accept="image/*" hidden>
            <p>Or</p>
            <label for="file-input" class="btn btn-primary">Choose file(s)</label>
            <!-- Preview Gallery -->
            <div id="gallery" class="d-flex flex-wrap mt-3"></div>
        </div>

        <!-- Buttons -->
        <a href="{{ route('sliders.index') }}" class="h6 btn btn-outline-danger">Back</a>
        <button type="submit" class="h6 btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const fileInput = document.getElementById('file-input');
    const gallery = document.getElementById('gallery');
    let selectedFiles = [];

    fileInput.addEventListener('change', previewFiles);

    function previewFiles() {
        const files = Array.from(fileInput.files);
        gallery.innerHTML = ''; // Clear the gallery for new previews
        selectedFiles = files; // Update selected files array

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create wrapper div for each preview
                const previewWrapper = document.createElement('div');
                previewWrapper.className = 'position-relative m-2';

                // Create image element
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';
                img.style.width = '200px';

                // Create remove button (X)
                const removeButton = document.createElement('button');
                removeButton.className = 'btn btn-danger btn-sm position-absolute top-0 end-0';
                removeButton.innerHTML = '&times;';
                removeButton.type = 'button';
                removeButton.addEventListener('click', () => removeFile(index));

                // Append image and remove button to the wrapper
                previewWrapper.appendChild(img);
                previewWrapper.appendChild(removeButton);
                gallery.appendChild(previewWrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    // Function to remove selected file
    function removeFile(index) {
        selectedFiles.splice(index, 1); // Remove file from selectedFiles array

        // Create a new DataTransfer object
        const dataTransfer = new DataTransfer();

        // Add the remaining files to the DataTransfer object
        selectedFiles.forEach(file => dataTransfer.items.add(file));

        // Update the file input with the new files
        fileInput.files = dataTransfer.files;

        // Re-render the preview gallery
        previewFiles();
    }
</script>
@endsection
