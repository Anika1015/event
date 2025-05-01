@extends('layout.adminMaster')

@section('content')
<h1>Manage Dish Packages</h1>
<a href="{{ route('dish-packages.create') }}" class="btn btn-primary">Add New Package</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price Per Guest</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dishPackages as $package)
        <tr>
            <td>{{ $package->name }}</td>
            <td>${{ $package->price_per_guest }}</td>
            <td><img src="{{$package->image}}" width="50"></td>
            <td>
                <a href="{{ route('dish-packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('dish-packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
