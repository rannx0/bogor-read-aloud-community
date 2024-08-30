@extends('layouts.app')

@section('content')
<!-- Article Description -->
<div class="container content-space-2 content-space-lg-3">
    <div class="w-lg-65 mx-lg-auto">
        <div class="mb-4">
            <h1 class="h2">{{ $blog->title }}</h1>        
            <h5 class="mb-0">
                <a class="text-dark" href="#">{{ $blog->category->name }}</a>
            </h5>
        </div>

        <p>{{ $blog->overview }}</p>
    </div>

    <div class="my-4 my-sm-8 w-75">
        {{-- Image cover --}}
        <img class="img-fluid rounded-lg" src="{{ Storage::url($blog->cover_image) }}" alt="{{ $blog->title }}">
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <p>{!! $blog->description !!}</p>
    </div>

    <div class="w-lg-65 mx-lg-auto">
        <p>Follow us on <a class="link" href="#">Medium</a>, <a class="link" href="#">Twitter</a>, <a class="link"
                href="#">Facebook</a>, <a class="link" href="#">YouTube</a>, and <a class="link" href="#">Dribbble</a>.
        </p>

        <!-- Tags -->
        <div class="mt-5">
            @foreach($blog->tags as $tag)
                <button class="btn btn-soft-secondary btn-xs m-1 btn-block">{{ $tag->name }}</button>
            @endforeach
        </div>
        <!-- End Tags -->

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

            <div class="col-sm-auto">
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle " href="#" data-toggle="tooltip"
                    data-placement="top" title="Bookmark story">
                    <i class="bi-bookmark"></i>
                </a>
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#" data-toggle="tooltip"
                    data-placement="top" title="Report story">
                    <i class="bi-flag"></i>
                </a>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>
<!-- End Article Description -->
@endsection
