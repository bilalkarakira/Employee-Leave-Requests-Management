@extends('layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4">
  <div class="bg-white shadow-md rounded-lg p-10 w-full max-w-lg">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Leave Request</h1>

    @if(session('message'))
      <div class="mb-4 text-green-600 text-sm font-medium text-center">
        {{ session('message') }}
      </div>
    @endif

    @if($errors->any())
      <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <ul class="list-disc pl-5 text-sm">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('leave-request.store') }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
        <input type="date" id="start_date" name="start_date"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-laravel focus:outline-none"
               required>
      </div>

      <div>
        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
        <input type="date" id="end_date" name="end_date"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-laravel focus:outline-none"
               required>
      </div>

      <div>
        <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Reason</label>
        <textarea id="reason" name="reason" rows="4"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-laravel focus:outline-none resize-none"
                  required></textarea>
      </div>

      <div>
        <button type="submit"
                class="w-full bg-laravel text-white py-2 rounded-lg font-semibold hover:bg-black transition duration-300">
          Submit Leave Request
        </button>
      </div>
    </form>
  </div>
</div>
@endsection