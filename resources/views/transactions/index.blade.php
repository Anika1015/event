@extends('layout.adminMaster')

@section('content')
<div class="max-w-6xl mx-auto mt-12 p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center">Transaction Records</h2>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 shadow-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-lg">
                    <th class="border p-4 text-left">Transaction ID</th>
                    <th class="border p-4 text-left">User Name</th>
                    <th class="border p-4 text-left">Venue</th>
                    <th class="border p-4 text-left">Lighting Theme</th>
                    <th class="border p-4 text-left">Dish Package</th>
                    <th class="border p-4 text-left">Guests</th>
                    <th class="border p-4 text-left">Time Slot</th>
                    <th class="border p-4 text-left">Event Date</th>
                    <th class="border p-4 text-left">Amount</th>
                    <th class="border p-4 text-left">Currency</th>
                    <th class="border p-4 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr class="border text-gray-800 text-lg even:bg-gray-100 hover:bg-gray-50">
                    <td class="border p-4">{{ $transaction->transaction_id }}</td>
                    <td class="border p-4">{{ $transaction->booking->user->name ?? 'N/A' }}</td>
                    <td class="border p-4">{{ $transaction->booking->venue->name ?? 'N/A' }}</td>
                    <td class="border p-4">{{ $transaction->booking->lightingTheme->name ?? 'N/A' }}</td>
                    <td class="border p-4">{{ $transaction->booking->dishPackage->name ?? 'N/A' }}</td>
                    <td class="border p-4 text-center">{{ $transaction->booking->number_of_guests ?? 'N/A' }}</td>
                    <td class="border p-4 capitalize text-center">{{ $transaction->booking->time_slot ?? 'N/A' }}</td>
                    <td class="border p-4 text-center">{{ $transaction->booking->event_date ?? 'N/A' }}</td>
                    <td class="border p-4 text-green-600 font-semibold text-center">${{ number_format($transaction->amount, 2) }}</td>
                    <td class="border p-4 text-center">{{ ucfirst($transaction->currency) }}</td>
                    <td class="border p-4 text-center">{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $transactions->links() }}
    </div>
</div>
@endsection


