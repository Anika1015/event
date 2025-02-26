@extends('layout.adminMaster')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Payments</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="table-auto w-full text-left text-gray-600">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Event</th>
                        <th class="py-3 px-4">Transaction ID</th>
                        <th class="py-3 px-4">Amount</th>
                        <th class="py-3 px-4">Currency</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $payment->id }}</td>
                            <td class="py-3 px-4">{{ $payment->event->title ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $payment->transaction_id }}</td>
                            <td class="py-3 px-4">${{ number_format($payment->amount, 2) }}</td>
                            <td class="py-3 px-4">{{ $payment->currency }}</td>
                            <td class="py-3 px-4">{{ ucfirst($payment->status) }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.payments.show', $payment->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-all">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $payments->links() }}
        </div>
    </div>
@endsection

