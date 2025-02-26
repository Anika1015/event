@extends('layout.adminMaster')

@section('content')
    <h3>Event Requests</h3>

    @foreach($requests as $request)
        <div>
            <p><strong>Event:</strong> {{ $request->event_name }}</p>
            <p><strong>Date:</strong> {{ $request->event_date }}</p>
            <p><strong>Status:</strong> {{ $request->status }}</p>

            <form action="{{ route('admin.approve', $request->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Approve</button>
            </form>

            <form action="{{ route('admin.reject', $request->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </div>
    @endforeach
@endsection


