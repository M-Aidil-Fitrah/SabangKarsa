<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::paginate(6); // Paginasi, 6 item per halaman
        return view('destination', compact('destinations'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add destinations.');
        }
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add destinations.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'category' => 'required|in:pantai,gunung,diving,sejarah',
            'rating' => 'required|numeric|between:0,5', // Rating antara 0-5
            'distance_from_city_center' => 'required|string|max:50', // Jarak, misalnya "15 km"
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $data['provider_id'] = $user->id;
        Destination::create($data);

        return redirect()->route('destination')->with('success', 'Destination added successfully.');
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));
    }
}