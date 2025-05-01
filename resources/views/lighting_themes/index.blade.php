@extends('layout.adminMaster')

@section('title', 'Lighting Themes')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold">Lighting Themes</h1>

    <a href="{{ route('lighting-themes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg mb-4 inline-block">Add New Lighting Theme</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lightingThemes as $lightingTheme)
                <tr>
                    <td>{{ $lightingTheme->name }}</td>
                    <td>${{ $lightingTheme->price }}</td>
                    <td><img src="{{$lightingTheme->image}}" width="50" alt="Image"></td>
                    <td>
                        <a href="{{ route('lighting-themes.edit', $lightingTheme->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('lighting-themes.destroy', $lightingTheme->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
