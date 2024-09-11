@extends('layouts.app')

@section('content')
<!-- Article Description -->
<div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
    <div class="w-lg-65 mx-lg-auto">
        <div class="mb-4">
            <h1 class="h1">{{ $event->judul }}</h1>
        </div>

        <div class="row align-items-sm-center mb-5">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <!-- Media -->
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 ms-1">
                        <h4 class=" h4 mb-2">{{ $event->tema }}</h4>
                        <h6 class="mb-0">
                            <span class="text-body">{{ $event->created_at->format('d M Y')}}</span>
                        </h6>
                    </div>
                </div>
                <!-- End Media -->
            </div>
            <!-- End Col -->

            <div class="col-sm-5">
                <div class="d-flex justify-content-sm-end align-items-center">
                    <span class="text-cap mb-0 me-2">Share:</span>

                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank">
                        <i class="bi-facebook"></i>
                        </a>

                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($event->judul) }}" 
                        target="_blank">
                         <i class="bi-twitter"></i>
                        </a>
 

                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://www.instagram.com/" 
                        target="_blank">
                         <i class="bi-instagram"></i>
                        </a>

                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($event->judul) }}" 
                        target="_blank">
                         <i class="bi-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
        <div class="my-4 my-sm-8">
            <img class="img-fluid rounded-lg" src="{{ Storage::url($event->thumbnail) }}" alt="Image Description">
        </div>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h5>Dilaksanakan Pada: </h5>
        <ul class="list-unstyled">
            <li> <i class="bi bi-calendar me-1"></i>{{ \Carbon\Carbon::parse($event->tanggal_dilaksanakan)->translatedFormat('l, d F Y') }}</li>
            <li> <i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->waktu_selesai)->format('H:i') }}</li>
        </ul>
    </div>
    
    <div class="w-lg-65 mx-lg-auto">
        <h5>Lokasi : </h5>
        <p>
            <i class="bi bi-geo-alt me-1"></i>{{ $event->lokasi }}
        </p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h5>HTM : </h5>
        <p>
            <i class="bi bi-cash me-1"></i>Rp. {{ number_format($event->harga_tiket_masuk, 0, ',', '.') }}
        </p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h5>Kuota : </h5>
        <p>
            <i class="bi bi-people me-1"></i>{{ $event->kuota}} Peserta
        </p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h5>Kegiatan</h5>
        <p>
            {{ $event->kegiatan }} 
        </p>


        <h5>Deskripsi</h5>
        <p>
            {{ $event->deskripsi}}
        </p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <!-- Card -->
        <div class="card bg-dark text-center my-4"
            style="background-image: url(assets/svg/components/wave-pattern-light.svg);">
            <div class="card-body">
                <h4 class="text-white mb-4">"Akhir Pendaftaran Pada {{ \Carbon\Carbon::parse($event->tanggal_akhir_pendaftaran)->translatedFormat('l, d F Y') }}"</h4>

                <div class="w-lg-75 mx-lg-auto">
                        <!-- Input Card -->
                    <a href="{{ $event->link_pendaftaran }}" target="_blank" class="btn btn-outline-success">Daftar Sekarang</a>
                        <!-- End Input Card --> 
                </div>
            </div>
        </div>
        <!-- End Card -->

        <p>Follow us on 
            @if($config->show_facebook)
                <a class="link" href="{{ $config->link_facebook }}" target="_blank">Facebook</a>
            @endif
        
            @if($config->show_youtube)
                <a class="link" href="{{ $config->link_youtube }}" target="_blank">YouTube</a>
            @endif
        
            @if($config->show_instagram)
                <a class="link" href="{{ $config->link_instagram }}" target="_blank">Instagram</a>
            @endif
        
            @if($config->show_twitter)
                <a class="link" href="{{ $config->link_twitter }}" target="_blank">Twitter</a>
            @endif
        </p>
        

        <div class="row justify-content-sm-between align-items-sm-center mt-5">
            <div class="col-sm mb-2 mb-sm-0">
                <span class="text-cap mb-0 me-2">Media Partners:</span>
                <div class="d-flex align-items-center">
                    <div>
                        @foreach($event->mediaPartners as $mediaPartner)
                            <img src="{{ Storage::url($mediaPartner->logo_path) }}" alt="Media Partner Logo" class="img-thumbnail" style="max-width: 100px;">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm mb-2 mb-sm-0">
                <span class="text-cap mb-0 me-2">Sponsors:</span>
                <div class="d-flex align-items-center">
                    <div>
                        @foreach($event->sponsors as $sponsor)
                        <img src="{{ Storage::url($sponsor->logo_path) }}" alt="Sponsor Logo" class="img-thumbnail" style="max-width: 100px;">
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>
<!-- End Article Description -->
@endsection