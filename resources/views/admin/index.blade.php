@extends('layout.adminMaster')

@section('content')
<div class="container my-5">
    <h2 class="mb-4" style="font-size: 32px;">Booking Requests</h2>

    <!-- Display Success or Error Messages -->
    @if(session('success'))
        <div class="alert alert-success mb-4" style="font-size: 18px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mb-4" style="font-size: 18px;">{{ session('error') }}</div>
    @endif

    <!-- Booking Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="font-size: 18px; table-layout: fixed;">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 10%;">User</th>
                    <th style="width: 15%;">Event</th>
                    <th style="width: 12%;">Event Date</th>
                    <th style="width: 12%;">Location</th>
                    <th style="width: 12%;">Time Slot</th>
                    <th style="width: 10%;">Number of Guests</th>
                    <th style="width: 18%;">Description</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->event->title }}</td>   
                        <td>{{ $booking->event_date }}</td>
                        <td>{{ $booking->location }}</td>
                        <td>{{ $booking->time_slot }}</td>
                        <td>{{ $booking->number_of_guests }}</td>
                        <td>{{ $booking->description }}</td>
                        
                        <!-- Display Booking Status -->
                        <td class="text-center">
                            @if($booking->status == 'pending')
                                <span class="badge badge-warning" style="font-size: 18px; padding: 8px 15px;">Pending</span>
                            @elseif($booking->status == 'accepted')
                                <span class="badge badge-success" style="font-size: 18px; padding: 8px 15px;">Accepted</span>
                            @else
                                <span class="badge badge-danger" style="font-size: 18px; padding: 8px 15px;">Rejected</span>
                            @endif
                        </td>

                        <!-- Display Action Buttons if the booking is pending -->
                        <td class="text-center d-flex justify-content-between" style="gap: 20px;">
                            @if($booking->status == 'pending')
                                <form action="{{ route('admin.booking.accept', ['id' => $booking->BookingID]) }}" method="POST" class="mr-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg">Accept</button>
                                </form>

                                <form action="{{ route('admin.booking.reject', ['id' => $booking->BookingID]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg">Reject</button>
                                </form>
                            @else
                                <span class="text-muted" style="font-size: 18px;">No action available</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


