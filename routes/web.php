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
use App\Http\Controllers\ProviderController; // Pastikan ini di-import

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
// Destinations
Route::get('/destination', [DestinationController::class, 'index'])->name('destination'); // Custom index name
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

// Drivers - FIX: Explicitly define index and show to ensure 'show' is available
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers'); // Custom index name
Route::get('/drivers/{driver}', [DriverController::class, 'show'])->name('drivers.show'); // Explicit show route for drivers

// Accommodations
Route::get('/accommodations', [AccommodationController::class, 'index'])->name('accommodations'); // Custom index name
Route::get('/accommodations/{accommodation}', [AccommodationController::class, 'show'])->name('accommodations.show');

// Tour Guides (Note: Using 'tourguide' for index route name as per your previous code)
Route::get('/tourguide', [TourGuideController::class, 'index'])->name('tourguide');
// If you need a show page for tour guides, uncomment/add this:
// Route::get('/tour-guides/{tour_guide}', [TourGuideController::class, 'show'])->name('tour-guides.show');

// Agenda
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda'); // Custom index name
Route::get('/agendas/{id}', [AgendaController::class, 'show'])->name('agendas.show');

// Strolls
Route::get('/stroll', [StrollController::class, 'index'])->name('stroll'); // Custom index name
Route::get('/strolls/{id}', [StrollController::class, 'show'])->name('strolls.show');


// --- Authentication Routes ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Changed name to avoid conflict with GET login

Route::get('/loginp', [AuthController::class, 'showLoginPForm'])->name('loginp');
Route::post('/loginp', [AuthController::class, 'providerLogin'])->name('provider.login');

Route::get('/register', function () {
    return view('daftar');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- Authenticated User Routes (General) ---
Route::middleware(['auth'])->group(function () {
    // Dashboard redirection based on role (optional, adjust as needed)
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'provider') {
            return redirect()->route('dashboard.mitra');
        }
        return view('home'); // Default dashboard for regular users
    })->name('dashboard');

    // Booking route for regular users
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store')->middleware('role:user');
});


// --- Provider-Specific Routes ---
Route::middleware(['auth', 'role:provider'])->group(function () {
    // Provider Dashboard
    Route::get('/dashboard/mitra', function () {
        return view('dashboard.mitra'); // Pastikan view ini ada
    })->name('dashboard.mitra');

    // Provider Profile Creation
    Route::get('/provider/create', [ProviderController::class, 'create'])->name('provider.create');
    Route::post('/provider', [ProviderController::class, 'store'])->name('provider.store');

    // Resource Management (Create, Store, Edit, Update, Destroy) for Providers
    // Note: 'index' and 'show' are defined as public routes above.
    Route::resource('accommodations', AccommodationController::class)->except(['index', 'show']);
    Route::resource('drivers', DriverController::class)->except(['index', 'show']);
    Route::resource('tour-guides', TourGuideController::class)->except(['index', 'show']); // Using 'tour-guides' as resource name
    Route::resource('destinations', DestinationController::class)->except(['index', 'show']);
    Route::resource('agendas', AgendaController::class)->except(['index', 'show']);
    Route::resource('strolls', StrollController::class)->except(['index', 'show']);
});
