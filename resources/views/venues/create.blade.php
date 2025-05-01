@extends('layout.adminMaster')

@section('content')
<h1>Add New Venue</h1>

<form action="{{ route('venues.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required class="form-control">
    
    <label>Price:</label>
    <input type="number" name="price" step="0.01" required class="form-control">
    
    <label>Image:</label>
    <input type="file" name="image" class="form-control">
    
    <button type="submit" class="btn btn-success">Add Venue</button>
</form>
@endsection
