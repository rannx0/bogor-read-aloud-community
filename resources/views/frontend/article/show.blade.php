@extends('layouts.app')

@section('content')
<!-- Article Description -->
<div class="container content-space-2">

    <div class="mx-lg-auto p-4 bg-white shadow-sm rounded-lg">
        <div class="w-lg-85 mx-lg-auto">
            <!-- Title and Category -->
            <div class="mb-4">
                <h1 class="display-5">{{ $blog->title }}</h1>        
                <h5 class="text-muted mb-0">
                    <a class="text-decoration-none text-secondary" href="#">{{ $blog->category->name }}</a>
                </h5>
            </div>
        </div>

        <!-- Image Cover -->
        <div class="my-3 w-100">
            <img class="img-fluid rounded" src="{{ Storage::url($blog->cover_image) }}" alt="{{ $blog->title }}">
        </div>
    
        <!-- Description -->
        <div class="w-lg-80 mx-lg-auto">
            <p class="lead">{!! $blog->description !!}</p>
        </div>
    
        <!-- Tags -->
        <div class="w-lg-80 mx-lg-auto mt-4">
            <div class="mt-5 mb-4 d-flex align-items-center">
                <span class="text-muted me-3">Tags:</span>
                @foreach($blog->tags as $tag)
                    <button class="btn btn-outline-primary btn-sm m-1 rounded-pill px-3">{{ $tag->name }}</button>
                @endforeach
            </div>
        </div>

        <!-- Share Section -->
        <div class="w-lg-80 mx-lg-auto mt-5">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0 text-center">
                    <div class="d-flex align-items-center">
                        <span class="text-muted me-3">Share:</span>
                        
                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                        target="_blank">
                        <i class="bi-facebook"></i>
                        </a>

                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" 
                        target="_blank">
                         <i class="bi-twitter"></i>
                        </a>
 

                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://www.instagram.com/" 
                        target="_blank">
                         <i class="bi-instagram"></i>
                        </a>

                        <a class="btn btn-outline-secondary btn-sm btn-icon rounded-circle mx-1" 
                        href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" 
                        target="_blank">
                         <i class="bi-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- Recent Blogs -->
    <div class="container content-space-2 mt-5">
        <h2 class="text-center mb-4">Recent Blogs</h2>
        <div class="row">
            @foreach($recentBlogs as $recentBlog)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img class="card-img-top rounded-top" src="{{ Storage::url($recentBlog->cover_image) }}" alt="{{ $recentBlog->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recentBlog->title }}</h5>
                            <p class="text-muted mb-1">{{ $recentBlog->category->name }}</p>
                            <a href="{{ route('detail.blogs', $recentBlog->id) }}" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Recent Blogs --> --}}
</div>
<!-- End Article Description -->
@endsection
