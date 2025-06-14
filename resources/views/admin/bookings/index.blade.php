@extends('layouts.adminApp')

@section('title', 'Manajemen Booking')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-6">Daftar Booking</h2>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-indigo-50">
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">#</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">Nama Pelanggan</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">Layanan</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">No.Telp</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">Alamat</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">Tanggal Booking</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">Bukti Bayar</th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-indigo-700">Status</th>
                    <th class="px-4 py-2 text-center text-xs font-semibold text-indigo-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse($bookings as $booking)
                <tr class="border-b hover:bg-indigo-50 transition">
                    <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $booking->user->name }}</td>
                    <td class="px-4 py-2">{{ $booking->service->name }}</td>
                    <td class="px-4 py-2">{{ $booking->phone }}</td>
                    <td class="px-4 py-2">{{ $booking->address }}</td>
                    <td class="px-4 py-2">{{ $booking->booking_date }}</td>
                    <td class="px-4 py-2">
                        @if($booking->payment_proof)
                            <a href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Bukti</a>
                        @else
                            <span class="text-gray-400 italic">Belum ada</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 capitalize">
                        @php
                            $statusColors = [
                                'pending' => 'bg-gray-200 text-gray-700',
                                'confirmed' => 'bg-blue-200 text-blue-800',
                                'ontheway' => 'bg-yellow-200 text-yellow-800',
                                'completed' => 'bg-green-200 text-green-800',
                                'cancelled' => 'bg-red-200 text-red-800',
                            ];
                        @endphp
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $statusColors[$booking->status] ?? 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-center">
                        <form method="POST" action="{{ route('admin.bookings.updateStatus', $booking) }}" class="flex items-center justify-center gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="border border-gray-300 rounded p-1 text-xs">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="ontheway" {{ $booking->status == 'ontheway' ? 'selected' : '' }}>On The Way</option>
                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-2 py-1 rounded text-xs font-semibold">Update</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500">Belum ada booking.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection