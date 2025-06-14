@extends('layouts.adminApp')

@section('title', 'Admin Dashboard')

@section('content')
<div>
    <h2 class="text-3xl font-bold mb-6 text-indigo-700">Dashboard Admin</h2>
    <p class="mb-8 text-gray-700">Selamat datang, <span class="font-semibold text-indigo-700">{{ auth()->user()->name }}</span>! Anda masuk sebagai admin.</p>

    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg p-6 shadow flex items-center gap-4 border-t-4 border-indigo-600">
            <div class="bg-indigo-100 text-indigo-700 rounded-full p-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 17v-2a4 4 0 0 1 8 0v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-1 text-indigo-700">Jumlah Layanan</h3>
                <p class="text-3xl font-bold text-indigo-800">{{ $serviceCount ?? '...' }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg p-6 shadow flex items-center gap-4 border-t-4 border-green-600">
            <div class="bg-green-100 text-green-700 rounded-full p-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 7v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7"></path>
                    <path d="M5 21h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-1 text-green-700">Jumlah Booking</h3>
                <p class="text-3xl font-bold text-green-800">{{ $bookingCount ?? '...' }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg p-6 shadow flex items-center gap-4 border-t-4 border-yellow-500">
            <div class="bg-yellow-100 text-yellow-700 rounded-full p-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 20h5v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M9 20H4v-2a4 4 0 0 1 3-3.87"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-1 text-yellow-700">Jumlah User</h3>
                <p class="text-3xl font-bold text-yellow-800">{{ $userCount ?? '...' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection