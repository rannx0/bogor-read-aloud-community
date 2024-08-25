@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Tambahkan Galeri Baru</h1>

        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="gallery-forms">
                <!-- Form set pertama -->
                <div class="gallery-form-set" data-index="1">
                    <h4>Input Gambar 1</h4>
                    <div class="mb-3">
                        <label for="title_1" class="form-label">Judul</label>
                        <input type="text" name="title[]" class="form-control" id="title_1" required>
                    </div>

                    <div class="mb-3">
                        <label for="image_1" class="form-label">Gambar</label>
                        <input type="file" name="image[]" class="form-control" id="image_1" required>
                    </div>
                </div>
            </div>

            <button type="button" id="add-more" class="btn btn-secondary">Add Form</button>
            <a href="{{ route('galleries.index') }}" class="btn btn-outline-danger ">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        let formIndex = 1;

        document.getElementById('add-more').addEventListener('click', function () {
            formIndex++;
            const container = document.getElementById('gallery-forms');
            const newSet = document.createElement('div');
            newSet.classList.add('gallery-form-set');
            newSet.setAttribute('data-index', formIndex);
            newSet.innerHTML = `
                <h4>Input Gambar ${formIndex}</h4>
                <div class="mb-3">
                    <label for="title_${formIndex}" class="form-label">Judul</label>
                    <input type="text" name="title[]" class="form-control" id="title_${formIndex}" required>
                </div>

                <div class="mb-3">
                    <label for="image_${formIndex}" class="form-label">Gambar</label>
                    <input type="file" name="image[]" class="form-control" id="image_${formIndex}" required>
                </div>
                <button type="button" class="btn btn-danger remove-form">Hapus</button>
                <hr>
            `;
            container.appendChild(newSet);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-form')) {
                e.target.parentElement.remove();
                updateFormIndexes();
            }
        });

        function updateFormIndexes() {
            const formSets = document.querySelectorAll('.gallery-form-set');
            formSets.forEach((formSet, index) => {
                formSet.setAttribute('data-index', index + 1);
                formSet.querySelector('h4').textContent = `Input Gambar ${index + 1}`;
                formSet.querySelectorAll('input').forEach(input => {
                    input.id = `${input.name.split('[]')[0]}_${index + 1}`;
                });
            });
        }
    </script>
@endsection