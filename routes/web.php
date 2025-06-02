<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\StrollController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

// ... route-route lainnya

Route::get('/accommodations/{accommodation}', [AccommodationController::class, 'show'])->name('accommodations.show');
Route::resource('drivers', DriverController::class); // Pastikan baris ini ada dan tidak dikomentari


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store')->middleware('auth', 'role:provider');

Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');

Route::get('/travelkit', function () {
    return view('travelkit');
})->name('travelkit');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Provider login route
Route::get('/loginp', [AuthController::class, 'showLoginPForm'])->name('loginp');
Route::post('/loginp', [AuthController::class, 'providerLogin'])->name('provider.login');

// Register routes
Route::get('/register', function () {
    return view('daftar');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route for all authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

// Layanan routes (dengan Route::resource untuk CRUD lengkap)
Route::middleware(['auth'])->group(function () {
    Route::resource('accommodations', AccommodationController::class)->except(['show']);
    Route::resource('tour-guides', TourGuideController::class)->except(['show']);
    Route::resource('drivers', DriverController::class)->except(['show']);
    Route::resource('strolls', StrollController::class)->except(['show']);
});

// Provider-specific routes
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/provider/create', [ProviderController::class, 'create'])->name('provider.create'); // Ensure this is present
    Route::post('/provider', [ProviderController::class, 'store'])->name('provider.store');
});

// Booking route for users
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth', 'role:user');

// Add a specific dashboard for mitra (provider)
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/dashboard/mitra', function () {
        return view('dashboard.mitra');
    })->name('dashboard.mitra');
});