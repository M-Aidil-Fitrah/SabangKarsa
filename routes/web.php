<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\StrollController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store')->middleware('auth', 'role:provider');

Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store')->middleware('auth', 'role:provider');

Route::get('/accommodations', [AccommodationController::class, 'index'])->name('accommodations');
Route::get('/accommodations/create', [AccommodationController::class, 'create'])->name('accommodations.create')->middleware('auth', 'role:provider');
Route::post('/accommodations', [AccommodationController::class, 'store'])->name('accommodations.store')->middleware('auth', 'role:provider');

Route::get('/tourguide', [TourGuideController::class, 'index'])->name('tourguide');
Route::post('/tour-guides', [TourGuideController::class, 'store'])->name('tour-guides.store')->middleware('auth', 'role:provider');

Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');

Route::get('/stroll', [StrollController::class, 'index'])->name('stroll');
Route::post('/strolls', [StrollController::class, 'store'])->name('strolls.store')->middleware('auth', 'role:provider');

Route::get('/travelkit', function () {
    return view('travelkit');
})->name('travelkit');

// Booking route for users
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('auth', 'role:user');

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

// Dashboard route (using home.blade.php for both roles)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});