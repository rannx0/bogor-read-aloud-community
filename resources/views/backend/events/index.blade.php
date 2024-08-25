@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Event</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Tambah Event</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tema</th>
                <th>Tanggal Dilaksanakan</th>
                <th>Tanggal Akhir Pendaftaran</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Lokasi</th>
                <th>Harga Tiket Masuk</th>
                <th>Kuota</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $i =>$event)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $event->judul }}</td>
                    <td>{{ $event->tema }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal_dilaksanakan)->format('l, d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal_akhir_pendaftaran)->format('l, d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->waktu_selesai)->format('H:i') }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>Rp {{ number_format($event->harga_tiket_masuk, 2, ',', '.') }}</td>
                    <td>{{ $event->kuota }}</td>
                    <td>{{ $event->deskripsi }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus event ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
