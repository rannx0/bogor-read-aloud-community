@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Sliders</h1>
    <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-3">Add New Slider</a>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <table class="table table-bordered border-primary table-centered mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $i => $slider)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="">
                        <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Slider Image" class="me-2 rounded" width="400" />
                    </td>
                    <td class="table-action text-center">
                        <a href="{{ route('sliders.edit', $slider) }}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                        <form action="{{ route('sliders.destroy', $slider) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-icon btn btn-link p-0"> <i class="mdi mdi-delete"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection