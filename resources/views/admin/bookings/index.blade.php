<!-- resources/views/admin/bookings/index.blade.php -->

@extends('layout.Master')

@section('content')
<h2>Booking List</h2>

<table class="table">
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Event Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr id="booking-{{ $booking->BookingID }}">
                <td>{{ $booking->BookingID }}</td>
                <td>{{ $booking->event_name }}</td>
                <td class="status">{{ $booking->status }}</td>
                <td>
                    <!-- Approve Button -->
                    <button class="btn btn-success approve" data-id="{{ $booking->BookingID }}">Approve</button>

                    <!-- Reject Button -->
                    <button class="btn btn-danger reject" data-id="{{ $booking->BookingID }}">Reject</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')
<script>
    $(document).on('click', '.approve', function() {
        var bookingID = $(this).data('id');
        
        $.ajax({
            url: '/admin/bookings/' + bookingID + '/approve',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#booking-' + bookingID + ' .status').text(response.status);
            },
            error: function() {
                alert('Something went wrong.');
            }
        });
    });

    $(document).on('click', '.reject', function() {
        var bookingID = $(this).data('id');
        
        $.ajax({
            url: '/admin/bookings/' + bookingID + '/reject',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#booking-' + bookingID + ' .status').text(response.status);
            },
            error: function() {
                alert('Something went wrong.');
            }
        });
    });
</script>
@endsection
