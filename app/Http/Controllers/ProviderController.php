<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function create()
    {
        return view('provider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kontak' => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $user = Auth::user();
        if ($user->provider) {
            return redirect()->route('dashboard.mitra')->with('error', 'You already have a provider profile.');
        }

        $user->provider()->create([
            'nama_usaha' => $request->nama_usaha,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'is_verified' => false,
        ]);

        return redirect()->route('dashboard.mitra')->with('success', 'Provider profile created successfully!');
    }
}