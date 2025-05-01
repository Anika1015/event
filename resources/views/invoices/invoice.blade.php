<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .invoice-container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            border: 2px solid #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .details, .footer {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .signature p {
            border-top: 1px solid #000;
            display: inline-block;
            padding-top: 5px;
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="header">
        <h2>Event Booking Invoice</h2>
        <p><strong>Invoice No:</strong> {{ $booking->BookingID }}</p>
        <p><strong>Payment Date:</strong> {{ now()->format('Y-m-d') }}</p>
        
    </div>

    <div class="details">
        <p><strong>Event Date:</strong> {{ $booking->event_date }}</p>
        <p><strong>Time Slot:</strong> {{ $booking->time_slot }}</p>
        <p><strong>Number of Guests:</strong> {{ $booking->number_of_guests }}</p>
    </div>

    <table class="table">
        <tr>
            <th>Item</th>
            <th>Details</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>Venue</td>
            <td>{{ $booking->venue->name }}</td>
            <td>${{ number_format($booking->venue->price, 2) }}</td>
        </tr>
        <tr>
            <td>Dish Package</td>
            <td>{{ $booking->dishPackage->name }}</td>
            <td>${{ number_format($booking->dishPackage->price_per_guest * $booking->number_of_guests, 2) }}</td>
        </tr>
        <tr>
            <td>Lighting & Theme</td>
            <td>{{ $booking->lightingTheme->name }}</td>
            <td>${{ number_format($booking->lightingTheme->price, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Total Paid</strong></td>
            <td><strong>${{ number_format($booking->amount, 2) }}</strong></td>
        </tr>
    </table>

    

    <div class="footer">
        <p>Thank you for choosing our event services!</p>
    </div>
</div>

</body>
</html>

