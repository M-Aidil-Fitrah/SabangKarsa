<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\StrollController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProviderController;

// --- Provider-Specific Routes ---
Route::middleware(['auth', 'role:provider'])->group(function () {
    // Provider Dashboard
    Route::get('/dashboard/mitra', function () {
        return view('dashboard.mitra');
    })->name('dashboard.mitra');

    // Provider Profile Creation
    Route::get('/provider/create', [ProviderController::class, 'create'])->name('provider.create');
    Route::post('/provider', [ProviderController::class, 'store'])->name('provider.store');

    // Resource Management (Create, Store, Edit, Update, Destroy) for Providers
    Route::resource('accommodations', AccommodationController::class)->except(['index', 'show']);
    Route::resource('drivers', DriverController::class)->except(['index', 'show']);
    Route::resource('tour-guides', TourGuideController::class)->except(['index', 'show']);
    Route::resource('destinations', DestinationController::class)->except(['index', 'show']);
    Route::resource('agendas', AgendaController::class)->except(['index', 'show']);
    Route::resource('strolls', StrollController::class)->except(['index', 'show']);
});

// --- Public Routes ---
// Home and Static Pages
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/travelkit', function () {
    return view('travelkit');
})->name('travelkit');

// Publicly Accessible Resource Index and Show Pages
// Accommodations
Route::get('/accommodations', [AccommodationController::class, 'index'])->name('accommodations.index');
Route::get('/accommodations/{accommodation}', [AccommodationController::class, 'show'])->name('accommodations.show');

// Drivers
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/drivers/{driver}', [DriverController::class, 'show'])->name('drivers.show');

// Tour Guides
Route::get('/tour-guides', [TourGuideController::class, 'index'])->name('tour-guides.index');
Route::get('/tour-guides/{tour_guide}', [TourGuideController::class, 'show'])->name('tour-guides.show');

// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');

// Agendas
Route::get('/agendas', [AgendaController::class, 'index'])->name('agendas.index');
Route::get('/agendas/{agenda}', [AgendaController::class, 'show'])->name('agendas.show');

// Strolls
Route::get('/strolls', [StrollController::class, 'index'])->name('strolls.index');
Route::get('/strolls/{stroll}', [StrollController::class, 'show'])->name('strolls.show');

// --- Authentication Routes ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/loginp', [AuthController::class, 'showLoginPForm'])->name('loginp');
Route::post('/loginp', [AuthController::class, 'providerLogin'])->name('provider.login');
Route::get('/register', function () {
    return view('daftar');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Authenticated User Routes (General) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'provider') {
            return redirect()->route('dashboard.mitra');
        }
        return view('home');
    })->name('dashboard');

    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('role:user');
});

