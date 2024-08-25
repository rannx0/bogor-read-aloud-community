@extends('layouts.app')

@section('content')
<!-- Article Description -->
<div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
    <div class="w-lg-65 mx-lg-auto">
        <div class="mb-4">
            <h1 class="h1">Judul</h1>
        </div>

        <div class="row align-items-sm-center mb-5">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <!-- Media -->
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 ms-1">
                        <h4 class=" h4 mb-2">Tema</h4>
                        <h6 class="mb-0">
                            <span class="text-body">1 day ago</span>
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
                        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                            <i class="bi-facebook"></i>
                        </a>
                        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                            <i class="bi-twitter"></i>
                        </a>
                        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                            <i class="bi-instagram"></i>
                        </a>
                        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                            <i class="bi-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
        <div class="my-4 my-sm-8">
            <img class="img-fluid rounded-lg" src="{{ asset('assets/img/1920x800/img5.jpg')}}" alt="Image Description">
        </div>
    </div>
    <div class="d-flex justify-content-center w-lg-65 mx-lg-auto">
        <div class="w-lg-65 mx-lg-auto">
            <h5>Akhir Pendaftaran : </h5>
            <p>
                13 Juli 2024
            </p>
        </div>

    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h5>Dilaksanakan Pada: </h5>
        <ul>
            <li>13 Juli 2024</li>
            <li>03:05 - 03:15</li>
        </ul>
    </div>
    
    <div class="w-lg-65 mx-lg-auto">
        <h5>Lokasi : </h5>
        <p>
            Cigombong, Bogor, Jawa Barat
        </p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h5>HTM : </h5>
        <p>
            Rp. 500.000
        </p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <h4>Kegiatan</h4>
        <p>As we've grown, we've seen how Front has helped companies such as Spotify, Microsoft, Airbnb, Facebook, and
            Intercom bring their designers closer together to create amazing things. We've also learned that when the
            culture of sharing is brought in earlier, the better teams adapt and communicate with one another.</p>


        <h3>Deskripsi</h3>

        <p>We know the power of sharing is real, and we want to create an opportunity for everyone to try Front and
            explore how transformative open communication can be. Now you can have a team of one or two designers and
            unlimited spectators (think PMs, management, marketing, etc.) share work and explore the design process
            earlier.</p>

        <ul class="list-py-2">
            <li>Front allows us to collaborate in real time and is a really great way for leadership on the team to stay
                up-to-date with what everybody is working on," <a class="link" href="#">said</a> Stewart Scott-Curran,
                Intercom's Director of Brand Design.</li>
            <li>Front opened a new way of sharing. It's a persistent way for everyone to see and absorb each other's
                work," said David Scott, Creative Director at <a class="link" href="#">Eventbrite</a>.</li>
        </ul>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <!-- Card -->
        <div class="card bg-dark text-center my-4"
            style="background-image: url(assets/svg/components/wave-pattern-light.svg);">
            <div class="card-body">
                <h4 class="text-white mb-4">Like what you're reading? Subscribe to our top stories.</h4>

                <div class="w-lg-75 mx-lg-auto">
                    <form>
                        <!-- Input Card -->
                        <div class="input-card input-card-sm border">
                            <div class="input-card-form">
                                <label for="subscribeForm" class="form-label visually-hidden">Enter email</label>
                                <input type="text" class="form-control" id="subscribeForm" placeholder="Enter email"
                                    aria-label="Enter email">
                            </div>
                            <button type="button" class="btn btn-primary">Subscribe</button>
                        </div>
                        <!-- End Input Card -->
                    </form>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <p>Follow us on <a class="link" href="#">Instagram</a>
        </p>

        {{--
        <!-- Badges -->
        <div class="mt-5">
            <a class="btn btn-soft-secondary btn-xs m-1" href="#">Ecommerce</a>
            <a class="btn btn-soft-secondary btn-xs m-1" href="#">Website</a>
            <a class="btn btn-soft-secondary btn-xs m-1" href="#">Bootstrap</a>
            <a class="btn btn-soft-secondary btn-xs m-1" href="#">Startup</a>
            <a class="btn btn-soft-secondary btn-xs m-1" href="#">Free</a>
        </div>
        <!-- End Badges --> --}}

        <div class="row justify-content-sm-between align-items-sm-center mt-5">
            <div class="col-sm mb-2 mb-sm-0">
                <div class="d-flex align-items-center">
                    <span class="text-cap mb-0 me-2">Share:</span>

                    <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href="#">
                        <i class="bi-facebook"></i>
                    </a>
                    <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href="#">
                        <i class="bi-twitter"></i>
                    </a>
                    <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href="#">
                        <i class="bi-instagram"></i>
                    </a>
                    <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href="#">
                        <i class="bi-telegram"></i>
                    </a>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>
<!-- End Article Description -->
@endsection