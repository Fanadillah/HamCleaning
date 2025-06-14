<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ServiceManagementController as AdminServiceManagementController;
use App\Http\Controllers\Admin\AuthController; // Tambahkan ini
use App\Http\Controllers\Admin\BookingManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk dashboard pengguna
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Middleware untuk pengguna yang sudah terautentikasi
Route::middleware('auth')->group(function () {
    // Route untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk layanan
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

    // Route untuk booking
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}/payment', [\App\Http\Controllers\BookingController::class, 'showPaymentForm'])
        ->name('bookings.payment.form');
    Route::post('/bookings/{booking}/payment', [\App\Http\Controllers\BookingController::class, 'submitPaymentProof'])
        ->name('bookings.payment.submit');
    
        Route::get('/bookings/{booking}/receipt', [\App\Http\Controllers\BookingController::class, 'showReceipt'])
        ->name('bookings.receipt');
});

// Middleware untuk admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    // Route untuk dashboard admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Route untuk manajemen layanan
    Route::resource('services', AdminServiceManagementController::class)->except(['show']);

    // Route daftarnya
    Route::get('/bookings', [BookingManagementController::class, 'index'])->name('bookings.index');
    // Route update status booking
    Route::patch('/bookings/{booking}/status', [BookingManagementController::class, 'updateStatus'])->name('bookings.updateStatus');

});

// Route untuk halaman login admin
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
// Route untuk proses login admin
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.post');
// Route untuk logout admin
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Mengimpor route autentikasi
require __DIR__.'/auth.php';
