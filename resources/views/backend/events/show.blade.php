@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Event</h1>
    
    <div class="mb-3">
        <label class="form-label"><strong>Judul:</strong></label>
        <p>{{ $event->judul }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Image Cover:</strong></label>
        <div>           
            <img src="{{ Storage::url($event->thumbnail) }}" alt="" class="img-thumbnail" style="max-width: 100px;">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Tema:</strong></label>
        <p>{{ $event->tema }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Tanggal Dilaksanakan:</strong></label>
        <p>{{ \Carbon\Carbon::parse($event->tanggal_dilaksanakan)->translatedFormat('l, d F Y') }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Tanggal Akhir Pendaftaran:</strong></label>
        <p>{{ \Carbon\Carbon::parse($event->tanggal_akhir_pendaftaran)->translatedFormat('l, d F Y') }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Waktu Mulai:</strong></label>
        <p>{{ \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Waktu Selesai:</strong></label>
        <p>{{ \Carbon\Carbon::parse($event->waktu_selesai)->format('H:i') }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Lokasi:</strong></label>
        <p>{{ $event->lokasi }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Harga Tiket Masuk:</strong></label>
        <p>Rp {{ number_format($event->harga_tiket_masuk, 0, ',', '.') }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Kegiatan:</strong></label>
        <p>{{ $event->kegiatan }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Kuota:</strong></label>
        <p>{{ $event->kuota }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Deskripsi:</strong></label>
        <p>{{ $event->deskripsi }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Link Pendaftaran:</strong></label>
        @if($event->link_pendaftaran)
            <p><a href="{{ $event->link_pendaftaran }}" target="_blank">{{ $event->link_pendaftaran }}</a></p>
        @else
            <p>Tidak tersedia</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label"><strong>Media Partner Logos:</strong></label>
        <div>
            @foreach($event->mediaPartners as $mediaPartner)
                <img src="{{ Storage::url($mediaPartner->logo_path) }}" alt="Media Partner Logo" class="img-thumbnail" style="max-width: 100px;">
            @endforeach
        </div>
    </div>
    
    <div class="mb-3">
        <label class="form-label"><strong>Sponsor Logos:</strong></label>
        <div>
            @foreach($event->sponsors as $sponsor)
                <img src="{{ Storage::url($sponsor->logo_path) }}" alt="Sponsor Logo" class="img-thumbnail" style="max-width: 100px;">
            @endforeach
        </div>
    </div>
    
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit Event</a>
    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Hapus Event</button>
    </form>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali ke Daftar Event</a>
</div>
@endsection
