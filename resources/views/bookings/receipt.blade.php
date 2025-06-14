@extends('layouts.app')

@section('title', 'Kwitansi Pembayaran')

@section('content')
<style>
@media print {
    .navbar, nav, header {
        display: none !important;
    }
}
</style>
<div class="max-w-lg mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Kwitansi Pembayaran</h2>

    <div class="mb-4">
        <strong>Nama:</strong> {{ $booking->user->name }}
    </div>
    <div class="mb-4">
        <strong>Email:</strong> {{ $booking->user->email }}
    </div>
    <div class="mb-4">
        <strong>Layanan:</strong> {{ $booking->service->name }}
    </div>
    <div class="mb-4">
        <strong>Tanggal Booking:</strong> {{ $booking->booking_date }}
    </div>
    <div class="mb-4">
        <strong>Alamat:</strong> {{ $booking->address }}
    </div>
    <div class="mb-4">
        <strong>Nomor Telepon:</strong> {{ $booking->phone }}
    </div>
    <div class="mb-4">
        <strong>Harga:</strong> Rp {{ number_format($booking->service->price, 0, ',', '.') }}
    </div>
    <div class="mb-4">
        <strong>Status Pembayaran:</strong> {{ ucfirst($booking->payment_status) }}
    </div>

    @if($booking->payment_proof)
        <div class="mb-4">
            <strong>Bukti Pembayaran:</strong><br>
            <a href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
        </div>
    @endif

    <div class="mt-6 text-center">
        <button onclick="window.print()" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Cetak Kwitansi</button>
    </div>
</div>
@endsection