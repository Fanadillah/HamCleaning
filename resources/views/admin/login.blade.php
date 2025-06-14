@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="max-w-md mx-auto mt-20 p-6 bg-white dark:bg-gray-800 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>
    @if(session('error'))
        <div class="mb-4 text-red-600">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input type="email" id="email" name="email" required autofocus
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-1 font-medium">Password</label>
            <input type="password" id="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Login</button>
    </form>
</div>
@endsection

