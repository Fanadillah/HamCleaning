<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        $services = Service::all();
        return view('bookings.index', compact('bookings', 'services'));
    }    

    public function store(Request $request)
    {
       $request->validate([
        'service_id' => 'required|exists:services,id',
        'booking_date' => 'required|date|after:now',
        'address' => 'required|string|max:500',
        'phone' => 'required|string|max:20',
    ]);
    Booking::create([
        'user_id' => auth()->id(),
        'service_id' => $request->service_id,
        'booking_date' => $request->booking_date,
        'address' => $request->address,
        'phone' => $request->phone,
        'status' => 'pending',
        'payment_status' => 'pending',
    ]);
    return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat.');
    }

public function showPaymentForm(Booking $booking)
{
    if ($booking->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access.');
    }
    return view('bookings.payment', compact('booking'));
}

public function submitPaymentProof(Request $request, Booking $booking)
{
    if ($booking->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access.');
    }

    $request->validate([
        'payment_proof' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:5120',
    ]);

    if ($request->hasFile('payment_proof')) {
        if ($booking->payment_proof) {
            \Storage::disk('public')->delete($booking->payment_proof);
        }

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');
        $booking->payment_proof = $path;
        $booking->payment_status = 'pending';
        $booking->save();
    }

    return redirect()->route('bookings.index')->with('success', 'Bukti pembayaran berhasil dikirim.');
}


    public function showReceipt(Booking $booking)
{
    if ($booking->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access.');
    }

    if ($booking->payment_status !== 'Confirmed') {
        abort(403, 'Payment not confirmed yet.');
    }

    return view('bookings.receipt', compact('booking'));
}

}
