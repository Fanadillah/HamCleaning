@extends('layouts.app')

@section('title', 'Booking')

@section('content')
<div class="max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-700">Booking Anda</h2>

    <!-- Tombol Buat Booking Baru -->
    <div class="flex justify-end mb-6">
        <button onclick="document.getElementById('bookingModal').classList.remove('hidden')" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded font-semibold transition">
            + Buat Booking Baru
        </button>
    </div>

    <!-- Modal Pop Up Booking Baru -->
    <div id="bookingModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg relative">
            <button onclick="document.getElementById('bookingModal').classList.add('hidden')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            <h3 class="text-lg font-bold mb-4 text-indigo-700">Buat Booking Baru</h3>
            <form method="POST" action="{{ route('bookings.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="service_id" class="block text-sm font-medium mb-1">Pilih Layanan</label>
                    <select name="service_id" id="modal_service_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" onchange="updateModalPrice()" required>
                        <option value="" disabled selected>Pilih layanan</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}" data-price="{{ $service->price }}">{{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="booking_date" class="block text-sm font-medium mb-1">Tanggal Booking</label>
                    <input type="date" name="booking_date" id="modal_booking_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium mb-1">Alamat</label>
                    <textarea name="address" id="modal_address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium mb-1">Nomor Telepon</label>
                    <input type="text" name="phone" id="modal_phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Jumlah Harga yang harus dibayar</label>
                    <p id="modal-total-price" class="font-bold text-lg text-indigo-700">Rp 0</p>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded font-semibold transition">Buat Booking</button>
            </form>
        </div>
    </div>

    <div class="space-y-6 mb-10">
        @forelse($bookings as $booking)
        <div class="bg-white rounded-lg shadow p-5 flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded font-semibold">{{ $booking->service->name }}</span>
                    <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">{{ $booking->booking_date }}</span>
                </div>
                <div class="text-sm text-gray-600 mb-1"><strong>Alamat:</strong> {{ $booking->address ?? '-' }}</div>
                <div class="text-sm text-gray-600 mb-1"><strong>Telepon:</strong> {{ $booking->phone ?? '-' }}</div>
                <div class="flex flex-wrap gap-2 mt-2">
                    <span class="inline-block bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">Status: {{ ucfirst($booking->status) }}</span>
                    <span class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">Pembayaran: {{ ucfirst($booking->payment_status) }}</span>
                </div>
            </div>
            <div class="flex flex-col items-end mt-4 md:mt-0 md:ml-6 gap-2">
                @if(!$booking->payment_proof)
                    @auth
                    <a href="{{ route('bookings.payment.form', $booking) }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded font-semibold text-sm transition">
                        Bayar Sekarang
                    </a>
                    @endauth
                @else
                    <span class="text-green-600 font-semibold text-sm">Bukti pembayaran sudah dikirim.</span>
                @endif

                @if($booking->payment_status !== 'pending')
                    <a href="{{ route('bookings.receipt', $booking) }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold text-sm transition">
                        Lihat Kwitansi
                    </a>
                @endif
            </div>
        </div>
        @empty
        <div class="text-center text-gray-500">Belum ada booking.</div>
        @endforelse
    </div>
</div>

<script>
function updateModalPrice() {
    const select = document.getElementById('modal_service_id');
    const price = select.options[select.selectedIndex]?.dataset.price || 0;
    const formattedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
    document.getElementById('modal-total-price').innerText = formattedPrice;
}
</script>
@endsection