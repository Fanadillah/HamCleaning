@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white dark:bg-gray-800 rounded shadow p-6">
    <div class="flex items-center mb-6">
        <div class="bg-indigo-600 text-white rounded-full h-12 w-12 flex items-center justify-center text-2xl mr-4">
            <i class="fas fa-user"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold">Halo, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-600 dark:text-gray-300">Selamat datang di layanan kebersihan kami.</p>
        </div>
    </div>
    <div class="mb-4">
        <p class="text-gray-700 dark:text-gray-200">
            Anda dapat melakukan pemesanan layanan kebersihan, melihat status booking, dan mengelola data Anda melalui menu di atas.
        </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <a href="{{ route('services.index') }}" class="block bg-indigo-100 hover:bg-indigo-200 text-indigo-700 font-semibold rounded p-4 text-center transition">
            Lihat Layanan
        </a>
        <a href="{{ route('bookings.index') }}" class="block bg-green-100 hover:bg-green-200 text-green-700 font-semibold rounded p-4 text-center transition">
            Riwayat Booking
        </a>
    </div>
</div>
@endsection
