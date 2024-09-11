@extends('backend.layouts.app')

@section('content')
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 mt-2">Create New Category</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-sm table-bordered w-50 mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $i => $category)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-center">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="h3 mdi mdi-delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
