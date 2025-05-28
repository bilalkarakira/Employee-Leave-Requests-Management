@extends('layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-md">
    <header class="text-center mb-6">
      <h2 class="text-3xl font-bold text-gray-800 uppercase mb-2">Register</h2>
      <p class="text-gray-600">Create an account to post gigs</p>
    </header>

    <form action="/users" method="POST">
      @csrf

      <div class="mb-5">
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name') }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
        @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
        <select name="role" value="{{ old('role') }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
          <option value="employee">Employee</option>
          <option value="manager">Manager</option>
        </select>
      </div>

      <div class="mb-5">
        <label for="department" class="block text-sm font-semibold text-gray-700 mb-2">Department</label>
        <select name="department" value="{{ old('department') }}"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
          <option value="Human Resources">Human Resources</option>
          <option value="IT">IT</option>
          <option value="Sales">Sales</option>
          <option value="Marketing">Marketing</option>
          <option value="Finance">Finance</option>
          <option value="Operations">Operations</option>
          <option value="Customer Service">Customer Service</option>
          <option value="Research and Development">Research and Development</option>
          <option value="Legal">Legal</option>
          <option value="Administration">Administration</option>
        </select>
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
        <label for="password2" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-laravel">
        @error('password_confirmation')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit"
          class="w-full bg-laravel text-white font-semibold py-2 rounded-lg hover:bg-black transition duration-300">
          Sign Up
        </button>
      </div>

      <div class="text-center">
        <p class="text-sm text-gray-600">
          Already have an account?
          <a href="/login" class="text-laravel font-medium hover:underline">Login</a>
        </p>
      </div>
    </form>
  </div>
</div>
@endsection
