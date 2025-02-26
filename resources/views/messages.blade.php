@extends('layout.master')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Your Messages</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Message</th>
                <th class="border border-gray-300 px-4 py-2">Admin Reply</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $contact->Message }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    @if($contact->reply)
                        {{ $contact->reply }}
                    @else
                        <span class="text-gray-500">No reply yet</span>
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <span class="px-3 py-1 text-white rounded-lg {{ $contact->status == 'pending' ? 'bg-red-500' : 'bg-green-500' }}">
                        {{ ucfirst($contact->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
