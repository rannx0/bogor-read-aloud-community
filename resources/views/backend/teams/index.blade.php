@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Team</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-primary">Add New</a>
    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    <div class="row mt-4">
        @foreach($teams as $team)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ Storage::url($team->image_path) }}" class="card-img-top" alt="{{ $team->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $team->name }}</h5>
                        <p class="card-text">{{ $team->position }}</p>
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
