<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destination', compact('destinations'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add destinations.');
        }
        return view('destination'); // Form tambah ada di view destination
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
}