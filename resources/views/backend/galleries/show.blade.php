@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $gallery->title }}</h1>
    <img src="{{ Storage::url($gallery->image_path) }}" class="img-fluid" alt="{{ $gallery->title }}">
</div>
@endsection