@extends('layouts.app')

@section('content')
<main id="content" role="main">
  <!-- ========== MAIN CONTENT ========== -->
  <!-- Hero -->
  <!-- Slider -->
  <div class="js-swiper-navigation swiper carousel-wrapper">
    <div class="swiper-wrapper ">
      @foreach ($sliders as $slider)
      <div class="swiper-slide h-100 overflow-hidden ">
        <img class="img-fluid " src="{{ Storage::url($slider->image_path) }}" alt="Image Description">
      </div>
      @endforeach
    </div>

    <!-- Swiper Pagination -->
    <div class="js-swiper-pagination-element swiper-pagination"></div>
    <!-- Arrows -->
    <div class="js-swiper-navigation-button-next"></div>
    <div class="js-swiper-navigation-button-prev"></div>
  </div>
  <!-- End Slider -->

  <!-- AboutUs -->
  <div class="container content-space-2" id="aboutSection">
    <div class="row align-items-md-center">
      <div class="col-md-5 d-none d-md-block">
        <img class="img-fluid rounded-2" src="img/doc4.jpg" alt="Image Description">
      </div>
      <!-- End Col -->

      <div class="col-md-7">
        <!-- Blockquote -->
        <figure class="pe-md-7">
          <div class="mb-5">
            <h2 class="text-black">Tentang Kami</h2>
          </div>
          <blockquote class="blockquote blockquote-md">
            Bogor Read Aloud Community adalah bagian dari Read Aloud Indonesia (RAI), sebuah inisiatif yang mengajak
            orangtua, pendidik, dan para pegiat literasi untuk membacakan buku cerita anak secara nyaring. RAI berdiri
            sejak 2020 dan terus aktif hingga saat ini. Komunitas ini fokus pada kegiatan membacakan buku cerita dengan
            suara keras, yang memiliki dampak positif pada perkembangan karakter anak usia dini
            <figcaption class="blockquote-footer">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3 ms-md-0">
                  <span class="blockquote-footer-source">Bogor Read Aloud Community</span>
                </div>
              </div>
            </figcaption>
        </figure>
        <!-- End Blockquote -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->
  </div>
  <!-- End AboutUs -->

  <!-- Event -->
  <div class="container content-space-1 bg-soft-primary" id="eventSection">
    <div class="row rounded-1">
      <div class="col-lg-4 mb-9 mb-lg-0 mt-5 ">
        <img class="avatar avatar-xxl avatar-4x3 mb-4" src="../assets/svg/illustrations/app-wreath.svg" alt="SVG">
        <!-- Heading -->
        <div class="mb-5">
          <h2>Award winning guides and resources</h2>
          <p>Explore and learn more about everything from machine learning and global payments to building marketplaces
            and scaling your team.</p>
        </div>
        <!-- End Heading -->
        <a class="btn btn-primary btn-transition" href="#">View all guides</a>
      </div>
      <!-- Swiper Container -->
      <div class="js-swiper-card-grid swiper col mx-2">
        <div class="swiper-wrapper m-3">
          @foreach ($events as $event)
          <!-- Card -->
          <div class="swiper-slide ">
            <a class="card card-transition shadow-lg h-100" href="{{ route('detail.events', $event->judul) }}">
              <div class="d-flex justify-content-center mt-3">
                <img class="card-img w-85 rounded-1" src="{{ Storage::url($event->thumbnail) }}"
                  alt="{{ $event->judul }}">
              </div>
              <div class="card-body text-start">
                <span class="badge bg-primary rounded-pill mb-2">{{ $event->tema }}</span>
                <h3 class="card-title text-inherit">{{ $event->judul }}</h3>
                <h6 class="d-block text-body mb-3">
                  <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($event->tanggal_dilaksanakan)->format('d
                  M
                  Y') }}<br>
                  <i class="bi bi-geo-alt"></i> {{ $event->lokasi }}<br>
                  <i class="bi bi-cash"></i> Rp {{ number_format($event->harga_tiket_masuk, 0, ',', '.') }}<br>
                  <i class="bi bi-people-fill"></i> {{ $event->kuota }}
                </h6>
              </div>
            </a>
          </div>
          <!-- End Card -->
          @endforeach
        </div>
        <!-- Swiper Pagination -->
        <div class="js-swiper-card-grid-pagination swiper-pagination swiper-pagination-dark mt-2"></div>
      </div>
      <!-- End Swiper Container -->
    </div>
  </div>
  <!-- End Event -->

  <!-- Gallery-->
  <div class="container text-center content-space-1" id="gallerySection">
    <!-- Heading -->
    <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
      <h2>Gallery</h2>
    </div>
    <!-- End Heading -->
    <div class="row mx-auto my-auto justify-content-center">
      <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          @foreach($galleries->chunk(4) as $chunk)
          <div class="carousel-item @if($loop->first) active @endif">
            @foreach($chunk as $gallery)
            <div class="col-md-3">
              <div class="card">
                <div class="card-img">
                  <h4 class="card-title">{{ $gallery->title }}</h4>
                  <a class="fancybox" data-fancybox="gallery" href="{{ Storage::url($gallery->image_path) }}">
                    <img src="{{ Storage::url($gallery->image_path) }}" class="img-fluid">
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <!-- End Gallery-->

  <!-- Team -->
  <div class="container content-space-1" id="teamSection">
    <!-- Heading -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
      <h2>Our Team</h2>
    </div>
    <!-- End Heading -->

    <div class="row mb-7">
      @foreach($teams as $team)
      <div class="col-sm-6 col-md-3 mb-5 mb-lg-0">
        <!-- Team -->
        <img class="card-img rounded-2" src="{{ Storage::url($team->image_path) }}" alt="{{ $team->name }}" />
        <div class="card card-sm text-center mt-n7 mx-3">
          <div class="card-body">
            <h4 class="card-title">{{ $team->name }}</h4>
            <p class="card-text">{{ $team->position }}</p>
          </div>
        </div>
        <!-- End Team -->
      </div>
      @endforeach
    </div>
    <!-- End Row -->
  </div>
  <!-- End Team -->

  <!-- Blog -->
  <div class="container content-space-1" id="blogSection">
    <!-- Heading -->
    <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
      <h2>Article</h2>
    </div>
    <!-- End Heading -->
    <div class="js-swiper-card-grid swiper">
      <div class="swiper-wrapper m-1">
        @foreach($blogs as $blog)
        <!-- Card -->
        <div class="swiper-slide w-25">
          <a class="card card-transition shadow-sm h-100" href="{{ route('detail.blogs', $blog->title) }}">
            <div class="d-flex justify-content-center mt-3">
              <img class="card-img w-85 rounded-1" src="{{ Storage::url($blog->cover_image) }}"
                alt="{{ $blog->title }}">
            </div>
            <div class="card-body text-start">
              <span class="badge bg-primary rounded-pill mb-2">{{ $blog->category->name }}</span>
              <h3 class="card-title text-inherit">{{ $blog->title }}</h3>
              <h6 class="d-block text-body mb-1">{{ Str::limit($blog->overview, 100) }}</h6>
            </div>
          </a>
        </div>
        <!-- End Card -->
        @endforeach
      </div>

      <!-- Swiper Pagination -->
      <div class="js-swiper-card-grid-pagination swiper-pagination swiper-pagination-dark"></div>

      <!-- Swiper Navigation -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
  <!-- End Blog -->


  {{-- Maps --}}
  <section class="container content-space-2 text-center " id="contactSection">
    <h2 class="mb-5 text-start">Contact us</h2>

    <div class="row">
      <div class="col-lg-5">
        {!! $config->gmaps_iframe !!}
      </div>

      <div class="col-lg-7">
        <form>
          <div class="row">
            <div class="col-md-9">
              <ul class="list-unstyled">
                <li>
                  <i class="bi bi-pin-map-fill fa-2x text-primary"></i>
                  <p><small>{{ $config->alamat_teks}}</small></p>
                </li>
                <li>
                  <i class="bi bi-phone fa-2x text-primary"></i>
                  <p><small>{{ $config->no_hp}}</small></p>
                </li>
                <li>
                  <i class="bi bi-envelope fa-2x text-primary"></i>
                  <p><small>{{ $config->email}}</small></p>
              </ul>
            </div>
          </div>
        </form>

      </div>
    </div>


  </section>

  <a href="{{ $config->link_whatsapp }}" class="float" target="_blank">
    <i class="fa fa-whatsapp wp-button"></i>
  </a>
  <!-- ========== END MAIN CONTENT ========== -->
</main>
@endsection