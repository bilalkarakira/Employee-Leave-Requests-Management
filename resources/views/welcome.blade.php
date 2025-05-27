@extends('layout')

@section('content')
    <div class="text-center mt-12">
        <h1 class="text-4xl font-bold">Welcome to the Leave Request Platform</h1>
        <p class="mt-4 text-lg">Submit and manage your leave requests easily.</p>

        @auth
            @if(auth()->user()->role === 'manager')
                <a href="/leave-requests" class="mt-6 inline-block bg-blue-500 text-black px-6 py-3 rounded hover:bg-blue-700">View All Leave Requests</a>
            @else
                <a href="/leave-request/create" class="mt-6 inline-block bg-green-500 text-black px-6 py-3 rounded hover:bg-green-700">Create Leave Request</a>
                <a href="/leave-requests" class="mt-6 ml-4 inline-block bg-gray-500 text-black px-6 py-3 rounded hover:bg-gray-700">My Leave Requests</a>
            @endif
        @endauth
    </div>
@endsection