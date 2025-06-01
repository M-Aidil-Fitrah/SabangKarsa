<?php

namespace App\Http\Controllers;

use App\Models\Stroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StrollController extends Controller
{
    public function index()
    {
        $strolls = Stroll::all();
        return view('stroll', compact('strolls'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add strolls.');
        }
        return view('stroll'); // Form tambah ada di view stroll
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add strolls.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'category' => 'required|in:kuliner,jalan-jalan',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('strolls', 'public');
        }

        $data['provider_id'] = $user->id;
        Stroll::create($data);

        return redirect()->route('stroll')->with('success', 'Stroll added successfully.');
    }
}