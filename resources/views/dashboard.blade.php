@extends('Layout.master')

@section('title', 'Dashboard Page')

@section('content')
    <div class="text-center">
        <h1>Welcome to the Home Page</h1>
        <p>This is the content of the home page.</p>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
@endsection

