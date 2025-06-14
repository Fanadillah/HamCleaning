@extends('layouts.app')

@section('title', 'Upload Bukti Pembayaran')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-4">Upload Bukti Pembayaran</h2>

        <!-- Informasi Pembayaran -->
    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded">
        <p class="text-lg font-semibold mb-2">Total Pembayaran:</p>
        <p class="text-2xl font-bold text-indigo-700 mb-4">
            Rp {{ number_format($booking->service->price, 0, ',', '.') }}
        </p>
        <p class="text-lg font-semibold mb-2">Transfer ke Rekening:</p>
        <div class="bg-white p-3 rounded border border-gray-200">
            <span class="block font-medium">BANK BCA</span>
            <span class="block">No. Rekening: <span class="font-mono">1234567890</span></span>
            <span class="block">a.n. PT. Cleaning Service Ilham</span>
        </div>
    </div>
    <!-- End Informasi Pembayaran -->

    <form method="POST" action="{{ route('bookings.payment.submit', $booking) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="payment_proof" class="block text-sm font-medium mb-1">Bukti Pembayaran (gambar/pdf)</label>
            <input type="file" name="payment_proof" id="payment_proof" accept="image/*,.pdf" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('payment_proof')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Kirim Bukti</button>
    </form>
</div>
@endsection