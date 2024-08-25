@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Form fields as described above -->
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ old('judul', $event->judul) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tema</label>
            <input type="text" name="tema" class="form-control" placeholder="Tema" value="{{ old('tema', $event->tema) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Dilaksanakan</label>
            <input type="date" id="tanggal_dilaksanakan" name="tanggal_dilaksanakan" class="form-control" placeholder="Tanggal Dilaksanakan" value="{{ old('tanggal_dilaksanakan', \Carbon\Carbon::parse($event->tanggal_dilaksanakan)->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Akhir Pendaftaran</label>
            <input type="date" id="tanggal_akhir_pendaftaran" name="tanggal_akhir_pendaftaran" class="form-control" placeholder="Tanggal Akhir Pendaftaran" value="{{ old('tanggal_akhir_pendaftaran', \Carbon\Carbon::parse($event->tanggal_akhir_pendaftaran)->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai" value="{{ old('waktu_mulai', \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i')) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control" placeholder="Waktu Selesai" value="{{ old('waktu_selesai', \Carbon\Carbon::parse($event->waktu_selesai)->format('H:i')) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{ old('lokasi', $event->lokasi) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Tiket Masuk</label>
            <input type="number" name="harga_tiket_masuk" class="form-control" placeholder="Harga Tiket Masuk" value="{{ old('harga_tiket_masuk', $event->harga_tiket_masuk) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kegiatan</label>
            <textarea name="kegiatan" class="form-control" placeholder="Kegiatan" required>{{ old('kegiatan', $event->kegiatan) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Kuota</label>
            <input type="number" name="kuota" class="form-control" placeholder="Kuota" value="{{ old('kuota', $event->kuota) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ old('deskripsi', $event->deskripsi) }}</textarea>
        </div>
        <div class="form-group">
            <label for="link_pendaftaran">Link Pendaftaran</label>
            <input type="url" name="link_pendaftaran" id="link_pendaftaran" class="form-control" value="{{ old('link_pendaftaran', $event->link_pendaftaran) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Media Partner Logos</label>
            <input type="file" name="media_partner_logos[]" class="form-control" multiple>
        </div>
        <div class="mb-3">
            <label class="form-label">Sponsor Logos</label>
            <input type="file" name="sponsor_logos[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
