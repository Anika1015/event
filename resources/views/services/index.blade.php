@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Event Management Services</h1>
    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                        <p class="card-text">Price: ${{ $service->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection




