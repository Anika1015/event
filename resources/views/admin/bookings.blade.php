@extends('layout.adminMaster')

@section('content')
<div class="container">
    <h2 class="mt-4">Booking Requests</h2>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Event Name</th>
                <th>User Name</th>
                <th>Event Date</th>
                <th>Location</th>
                <th>Time Slot</th>
                <th>Number of Guests</th>
                <th>Description</th>
                <th>Admin Decision</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->BookingID }}</td>
                <td>{{ $booking->event_name }}</td>
                <td>{{ $booking->user->name }}</td> <!-- Assuming you have the user relationship -->
                <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('d-m-Y') }}</td>
                <td>{{ $booking->location }}</td>
                <td>{{ ucfirst($booking->time_slot) }}</td>
                <td>{{ $booking->number_of_guests }}</td>
                <td>{{ $booking->description }}</td>
                <td>
                    @if($booking->admin_decision == 'pending')
                        <span class="badge badge-warning">Pending</span>
                    @elseif($booking->admin_decision == 'approved')
                        <span class="badge badge-success">Approved</span>
                    @elseif($booking->admin_decision == 'rejected')
                        <span class="badge badge-danger">Rejected</span>
                    @endif
                </td>
                <td>
                    @if ($booking->admin_decision == 'pending')
                        <form action="{{ route('admin.bookings.approve', $booking->BookingID) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('admin.bookings.reject', $booking->BookingID) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>Action Completed</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
