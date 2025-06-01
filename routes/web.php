<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;

Route::get('/accommodations/create', [AccommodationController::class, 'create'])->name('accommodations.create')->middleware('auth', 'role:provider');
Route::post('/accommodations', [AccommodationController::class, 'store'])->name('accommodations.store')->middleware('auth', 'role:provider');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/destination', function () {
    return view('destination');
})->name('destination');

Route::get('/drivers', function () {
    return view('drivers');
})->name('drivers');

Route::get('/accommodations', function () {
    return view('accommodations');
})->name('accommodations');

Route::get('/tourguide', function () {
    return view('tourguide');
})->name('tourguide');

Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');

Route::get('/stroll', function () {
    return view('stroll');
})->name('stroll');

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

Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/dashboard/mitra', function () {
        return view('dashboard.mitra');
    })->name('dashboard.mitra');
});