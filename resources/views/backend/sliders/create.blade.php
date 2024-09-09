@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Create Slider</h1>

    <!-- File Upload -->
    <form id="myAwesomeDropzone" action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" data-plugin="dropzone">
        @csrf
        <div class="fallback">
            <input name="file" type="file" id="image" />
        </div>
        @error('file')
        <div>{{ $message }}</div>
        @enderror
        <div class="dz-message needsclick">
            <i class="h1 text-muted dripicons-cloud-upload"></i>
            <h3>Drop files here or click to upload.</h3>
        </div>
    </form>

    <!-- Preview -->
    <div class="dropzone-previews mt-3" id="file-previews"></div>


    <!-- Buttons -->
    <div class="text-end mt-3">
        <!-- Submit Button -->
        <button type="button" id="submit-all" class="btn btn-primary rounded-pill">Upload</button>
        <!-- Back Button -->
        <a href="{{ route('sliders.index') }}" class="btn btn-outline-danger rounded-pill">Back</a>
    </div>
</div>

<!-- Slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>    
<script>
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file",
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        previewsContainer: "#file-previews",
        previewTemplate: document.querySelector('#uploadPreviewTemplate').innerHTML,
        maxFiles: 1,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        init: function() {
            // Handle the form submission via Dropzone
            const submitButton = document.querySelector("#submit-all");
            submitButton.addEventListener("click", function() {
                // Trigger file upload
                myDropzone.processQueue();
            });

            this.on("success", function(file, response) {
                console.log(response);
                if (response.success) {
                    window.location.href = "{{ route('sliders.index') }}";
                }
            });
            this.on("error", function(file, response) {
                console.log(response);
                alert('There was an error uploading the file. Please try again.');
            });
            this.on("addedfile", function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        }
    };
</script>
@endsection
