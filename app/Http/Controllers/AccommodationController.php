<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    public function create()
    {
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'description' => 'required|string',
            'amenities' => 'required|array',
            'amenities.*' => 'string|in:WiFi,Kolam Renang,Restoran,Sarapan Pagi,Spa,Diving Center,Sewa Motor',
            'owner_phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
        ]);
        // Assuming you have an Accommodation model
        Auth::user()->accommodations()->create($validated);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation added successfully!');
    }
}