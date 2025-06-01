<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\Driver;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'user') {
            return redirect()->route('login')->with('message', 'Please login as a user to make a booking.');
        }

        $request->validate([
            'bookable_id' => 'required|exists:accommodations,id,drivers,id,tour_guides,id',
            'bookable_type' => 'required|in:App\\Models\\Accommodation,App\\Models\\Driver,App\\Models\\TourGuide',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $bookable = $request->bookable_type::find($request->bookable_id);
        $total_price = $bookable->price_per_day * (now()->parse($request->end_date)->diffInDays(now()->parse($request->start_date)));

        Booking::create([
            'user_id' => $user->id,
            'bookable_id' => $request->bookable_id,
            'bookable_type' => $request->bookable_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $total_price,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Booking created successfully.');
    }
}