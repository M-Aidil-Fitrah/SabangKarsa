<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('accommodations', compact('accommodations'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add accommodations.');
        }
        return view('accommodations'); // Form tambah ada di view accommodations
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add accommodations.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'price_per_night' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('accommodations', 'public');
        }

        $data['provider_id'] = $user->id;
        Accommodation::create($data);

        return redirect()->route('accommodations')->with('success', 'Accommodation added successfully.');
    }
}