<?php

namespace App\Http\Controllers;

use App\Models\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourGuideController extends Controller
{
    public function index()
    {
        $tour_guides = TourGuide::all();
        return view('tourguide', compact('tour_guides'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add tour guides.');
        }
        return view('tourguide'); // Form tambah ada di view tourguide
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add tour guides.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'experience' => 'required|string',
            'price_per_day' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('tour_guides', 'public');
        }

        $data['provider_id'] = $user->id;
        TourGuide::create($data);

        return redirect()->route('tourguide')->with('success', 'Tour guide added successfully.');
    }
}