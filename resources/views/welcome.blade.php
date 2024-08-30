@extends('layouts.app')

@section('content')
<main id="content" role="main">
  <!-- ========== MAIN CONTENT ========== -->
  <!-- Hero -->
  <!-- Slider -->

  <!-- Content -->
  <div class="position-relative content">
    <div id="carouselExampleIndicators" class="carousel slide carousel-wrapper">
      <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <img src="{{ Storage::url($slider->image_path) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
          {{-- <p>{{ Storage::url($slider->image_path) }}</p> <!-- Debugging line --> --}}
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="container d-lg-flex align-items-lg-center content-space-t-3 content-space-lg-0 min-vh-lg-100">
      <!-- Heading -->
      <div class="w-100">
        <div class="row">
          <div class="col-lg-5">
            <div class="mb-5">
              <h1 class="display-4 mb-3">
                Turn your ideas into a
                <span class="text-primary text-highlight-warning">
                  <span class="js-typedjs" data-hs-typed-options='{
                    "strings": ["startup.", "future.", "success."],
                    "typeSpeed": 90,
                    "loop": true,
                    "backSpeed": 30,
                    "backDelay": 2500
                    }'></span>
                </span>
              </h1>
              <p class="lead">Front's feature-rich designed demo pages help you create the best
                possible product.</p>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Title & Description -->
    </div>
  </div>
  <!-- End Slider -->
  <!-- End Hero -->

  <!-- AboutUs -->
  <div class="container content-space-2 content-space-lg-3">
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
  <div class="container content-space-2">
    <!-- Heading -->
    <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
      <h2 class="text-dark">EVENT</h2>
    </div>
    <!-- End Heading -->

    <!-- Swiper Container -->
    <div class="js-swiper-card-grid swiper">
      <div class="swiper-wrapper m-3">
        @foreach ($events as $event)
        <!-- Card -->
        <div class="swiper-slide w-25">
          <a class="card card-transition shadow-lg h-100" href="{{ route('detail.events', $event->judul) }}">
            <div class="d-flex justify-content-center mt-3">
              <img class="card-img w-85 rounded-1" src="{{ Storage::url($event->thumbnail) }}"
                alt="{{ $event->judul }}">
            </div>
            <div class="card-body text-start">
              <span class="badge bg-primary rounded-pill mb-2">{{ $event->tema }}</span>
              <h3 class="card-title text-inherit">{{ $event->judul }}</h3>
              <h6 class="d-block text-body mb-3">
                <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($event->tanggal_dilaksanakan)->format('d M Y') }}<br>
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
      <div class="js-swiper-card-grid-pagination swiper-pagination swiper-pagination-dark"></div>

    </div>
    <!-- End Swiper Container -->
  </div>
  <!-- End Event -->




  <!-- Gallery-->
  <div class="container text-center content-space-md-2">
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
  <div class="container content-space-2">
    <!-- Heading -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
      <span class="d-block small font-weight-bold text-cap mb-2">Our Team</span>
      <h2>Trust the professionals</h2>
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
  <div class="container content-space-2">
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
  <section class="container content-space-2 text-center ">


    <h2 class="mb-5 text-start">Contact us</h2>

    <div class="row">
      <div class="col-lg-5">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12094.57348593182!2d-74.00599512526003!3d40.72586666928451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2598f988156a9%3A0xd54629bdf9d61d68!2sBroadway-Lafayette%20St!5e0!3m2!1spl!2spl!4v1624523797308!5m2!1spl!2spl"
          class="h-100 w-100" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div class="col-lg-7">
        <form>
          <div class="row">
            <div class="col-md-9">
              <ul class="list-unstyled">
                <li>
                  <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                  <p><small>New York, NY 10012, USA</small></p>
                </li>
                <li>
                  <i class="fas fa-phone fa-2x text-primary"></i>
                  <p><small>+ 01 234 567 89</small></p>
                </li>
                <li>
                  <i class="fas fa-envelope fa-2x text-primary"></i>
                  <p><small>contact@gmail.com</small></p>
                </li>
              </ul>
            </div>
          </div>
        </form>

      </div>
    </div>


  </section>

  <!-- ========== END MAIN CONTENT ========== -->
</main>
@endsection