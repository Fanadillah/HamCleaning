<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingManagementController extends Controller
{
    // Tampilkan semua booking
    public function index()
    {
        $bookings = Booking::with(['user', 'service'])->orderBy('booking_date', 'desc')->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Update status booking
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,ontheway,completed,cancelled',
        ]);

    $booking->status = $request->status;

    // Jika status diubah menjadi confirmed, payment_status juga ikut confirmed
    if ($request->status === 'confirmed') {
        $booking->payment_status = 'Confirmed';
    }
        $booking->save();

        return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
    }
}
