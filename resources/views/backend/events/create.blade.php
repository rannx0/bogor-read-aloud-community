@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Form fields as described above -->
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ old('judul') }}"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tema</label>
            <input type="text" name="tema" class="form-control" placeholder="Tema" value="{{ old('tema') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Dilaksanakan</label>
            <input type="date" id="tanggal_dilaksanakan" name="tanggal_dilaksanakan" class="form-control"
                placeholder="Tanggal Dilaksanakan" value="{{ old('tanggal_dilaksanakan') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Akhir Pendaftaran</label>
            <input type="date" id="tanggal_akhir_pendaftaran" name="tanggal_akhir_pendaftaran" class="form-control"
                placeholder="Tanggal Akhir Pendaftaran" value="{{ old('tanggal_akhir_pendaftaran') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai"
                value="{{ old('waktu_mulai') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai"
                value="{{ old('waktu_selesai') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{ old('lokasi') }}"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Tiket Masuk</label>
            <input type="number" name="harga_tiket_masuk" class="form-control" placeholder="Harga Tiket Masuk"
                value="{{ old('harga_tiket_masuk') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kegiatan</label>
            <textarea name="kegiatan" class="form-control" placeholder="Kegiatan"
                required>{{ old('kegiatan') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Kuota</label>
            <input type="number" name="kuota" class="form-control" placeholder="Kuota" value="{{ old('kuota') }}"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="form-group">
            <label for="link_pendaftaran">Link Pendaftaran</label>
            <input type="url" name="link_pendaftaran" id="link_pendaftaran" class="form-control"
                value="{{ old('link_pendaftaran') }}">
        </div>

        <!-- Media Partner Logos -->
        <div id="media-partners-container" class="mb-3">
            <label class="form-label">Media Partner Logos</label>
            <div class="form-group">
                <div class="input-group">
                    <input type="file" name="media_partner_logos[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-secondary" id="add-media-partner">Add More Media Partner
                        Logos</button>
                </div>
                <div id="media-partners-preview" class="mt-2"></div>
            </div>
        </div>

        <!-- Sponsor Logos -->
        <div id="sponsors-container" class="mb-3">
            <label class="form-label">Sponsor Logos</label>
            <div class="form-group">
                <div class="input-group">
                    <input type="file" name="sponsor_logos[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-secondary" id="add-sponsor">Add More Sponsor Logos</button>
                </div>
                <div id="sponsors-preview" class="mt-2"></div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to add more media partner logo inputs
        document.getElementById('add-media-partner').addEventListener('click', function() {
            const container = document.getElementById('media-partners-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group mb-2';

            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'media_partner_logos[]';
            newInput.className = 'form-control';
            newInput.accept = 'image/*';

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger';
            removeButton.textContent = 'Remove';
            removeButton.onclick = function() {
                container.removeChild(newInputGroup);
                updateMediaPartnerPreview();
            };

            newInputGroup.appendChild(newInput);
            newInputGroup.appendChild(removeButton);
            container.appendChild(newInputGroup);
        });

        // Function to add more sponsor logo inputs
        document.getElementById('add-sponsor').addEventListener('click', function() {
            const container = document.getElementById('sponsors-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group mb-2';

            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'sponsor_logos[]';
            newInput.className = 'form-control';
            newInput.accept = 'image/*';

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger';
            removeButton.textContent = 'Remove';
            removeButton.onclick = function() {
                container.removeChild(newInputGroup);
                updateSponsorPreview();
            };

            newInputGroup.appendChild(newInput);
            newInputGroup.appendChild(removeButton);
            container.appendChild(newInputGroup);
        });

        // Function to preview selected media partner logos
        function updateMediaPartnerPreview() {
            const previewContainer = document.getElementById('media-partners-preview');
            previewContainer.innerHTML = '';
            const files = document.querySelectorAll('input[name="media_partner_logos[]"]');
            files.forEach(input => {
                const selectedFiles = input.files;
                Array.from(selectedFiles).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        img.style.maxWidth = '150px';
                        img.style.marginRight = '10px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }

        // Function to preview selected sponsor logos
        function updateSponsorPreview() {
            const previewContainer = document.getElementById('sponsors-preview');
            previewContainer.innerHTML = '';
            const files = document.querySelectorAll('input[name="sponsor_logos[]"]');
            files.forEach(input => {
                const selectedFiles = input.files;
                Array.from(selectedFiles).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        img.style.maxWidth = '150px';
                        img.style.marginRight = '10px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }

        // Attach event listeners to initial file inputs
        document.querySelectorAll('input[name="media_partner_logos[]"]').forEach(input => {
            input.addEventListener('change', updateMediaPartnerPreview);
        });
        document.querySelectorAll('input[name="sponsor_logos[]"]').forEach(input => {
            input.addEventListener('change', updateSponsorPreview);
        });
    });
</script>
@endsection