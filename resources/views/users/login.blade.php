@extends('layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-md">
    <header class="text-center mb-6">
      <h2 class="text-3xl font-bold text-gray-800 uppercase mb-2">Login</h2>
      <p class="text-gray-600">Log into your account to post gigs</p>
    </header>

    <form method="POST" action="/users/authenticate">
      @csrf

      <div class="mb-5">
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
        <input type="password" name="password" value="{{ old('password') }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit"
          class="w-full bg-laravel text-white font-semibold py-2 rounded-lg hover:bg-black transition duration-300">
          Sign In
        </button>
      </div>

      <div class="text-center">
        <p class="text-sm text-gray-600">
          Don't have an account?
          <a href="/register" class="text-laravel font-medium hover:underline">Register</a>
        </p>
      </div>
    </form>
  </div>
</div>
@endsection
