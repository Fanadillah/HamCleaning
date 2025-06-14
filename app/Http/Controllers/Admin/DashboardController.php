<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() 
    {
        $serviceCount = Service::count();
        $bookingCount = Booking::count();
        $userCount = User::count();

        return view('admin.dashboard', compact('serviceCount', 'bookingCount', 'userCount'));
    }
}
