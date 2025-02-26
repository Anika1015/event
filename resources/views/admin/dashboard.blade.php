@extends('layout.adminMaster')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-6">
        <!-- Total Users -->
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
            <h3 class="text-2xl font-bold">{{ $totalUsers }}</h3>
            <p class="text-lg">Total Users</p>
        </div>

        <!-- Total Contacts 
        <div class="bg-green-500 text-white p-6 rounded-lg shadow">
            <h3 class="text-2xl font-bold">{{ $totalContacts }}</h3>
            <p class="text-lg">Total Contacts</p>
        </div>-->

        <!--
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
        <h3 class="text-2xl font-semibold text-gray-800">Total Income</h3>
        <p class="text-3xl font-bold text-purple-500">${{ number_format($totalIncome, 2) }}</p>
        </div>-->

        <!-- Pending Requests 
        <div class="bg-red-500 text-white p-6 rounded-lg shadow">
            <h3 class="text-2xl font-bold">{{ $pendingRequests }}</h3>
            <p class="text-lg">Pending Requests</p>
        </div>
    </div> -->

    <!-- Recent Contact Messages 
    <table class="w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2">Name</th>
            <th class="border border-gray-300 px-4 py-2">Email</th>
            <th class="border border-gray-300 px-4 py-2">Message</th>
            <th class="border border-gray-300 px-4 py-2">Status</th>
            <th class="border border-gray-300 px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td class="border border-gray-300 px-4 py-2">{{ $contact->Name }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $contact->Email }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ Str::limit($contact->Message, 50) }}</td>
            <td class="border border-gray-300 px-4 py-2">
                <span class="px-3 py-1 text-white rounded-lg {{ $contact->status == 'pending' ? 'bg-red-500' : 'bg-green-500' }}">
                    {{ ucfirst($contact->status) }}
                </span>
            </td>
            <td class="border border-gray-300 px-4 py-2">
                <form action="{{ route('admin.contact.update', $contact->ContactID) }}" method="POST">
                    @csrf
                    <select name="status" onchange="this.form.submit()" class="p-2 border rounded">
                        <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="resolved" {{ $contact->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                    
                    @if($contact->status == 'resolved')
                    <textarea name="reply" class="p-2 border rounded mt-2" placeholder="Admin's Reply" rows="2">{{ $contact->reply }}</textarea>
                    @endif

                    <button type="submit" class="p-2 mt-2 bg-blue-500 text-white rounded">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>-->
</table>

           
    </div>
</div>
@endsection

