@extends('layout.master')
@section('title')
    Events Management
@endsection

@section('content')
<div class="mt-10"></div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Manage Events</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" required/>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" required/>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" required/>
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" required/>
                    @error('location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>All Events</h4>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($events as $event)
                    <li class="list-group-item">
                        <form action="{{ route('events.update', $event->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" value="{{ $event->title }}" required/>
                            </div>
                            <div class="mb-3">
                                <input type="number" step="0.01" name="price" class="form-control" value="{{ $event->price }}" required/>
                            </div>
                            <div class="mb-3">
                                <input type="date" name="date" class="form-control" value="{{ $event->date }}" required/>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="location" class="form-control" value="{{ $event->location }}" required/>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="3" required>{{ $event->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                        <form action="{{ route('events.delete', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
