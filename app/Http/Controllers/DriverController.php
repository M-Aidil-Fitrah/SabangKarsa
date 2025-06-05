<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers', compact('drivers'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add drivers.');
        }
        return view('drivers'); // Form tambah ada di view drivers
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add drivers.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'vehicle_type' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('drivers', 'public');
        }

        $data['provider_id'] = $user->id;
        Driver::create($data);

        return redirect()->route('drivers')->with('success', 'Driver added successfully.');
    }
}