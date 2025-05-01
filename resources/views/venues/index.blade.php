@extends('layout.adminMaster')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Manage Venues</h1>
    <div class="mb-4 text-right">
        <a href="{{ route('venues.create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus-circle"></i> Add New Venue
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venues as $venue)
                <tr>
                    <td>{{ $venue->name }}</td>
                    <td>${{ number_format($venue->price, 2) }}</td>
                    <td><img src="{{ $venue->image }}" class="img-fluid" style="max-width: 100px; height: auto;"></td>
                    <td class="d-flex">
                        <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning mr-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this venue?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
