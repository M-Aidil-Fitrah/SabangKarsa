<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Import Storage untuk upload gambar

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all(); // Ambil semua driver
        // Mengarahkan ke view 'drivers/index.blade.php'
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // Memastikan user sudah login, memiliki role 'provider', DAN sudah memiliki profil provider
        if (!$user || $user->role !== 'provider' || !$user->provider) {
            // Redirect ke halaman login atau halaman lain dengan pesan error
            return redirect()->route('login')->with('error', 'You must be a registered provider with a profile to add drivers.');
        }
        // Mengarahkan ke view 'drivers/create.blade.php'
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        // Memastikan user sudah login, memiliki role 'provider', DAN sudah memiliki profil provider
        if (!$user || $user->role !== 'provider' || !$user->provider) {
            return redirect()->route('login')->with('error', 'You must be a registered provider with a profile to add drivers.');
        }

        // Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20', // Sesuaikan max length dengan kebutuhan
            'vehicle_type' => 'required|string|max:255',
            'price_per_day' => 'required|numeric|min:0', // Tambahkan min:0 untuk harga positif
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Tambahkan validasi mimes
        ]);

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar di folder 'driver_images' dalam disk 'public'
            $imagePath = $request->file('image')->store('driver_images', 'public');
        }

        // Buat instance Driver baru dan isi datanya
        $driver = new Driver();
        $driver->name = $validatedData['name'];
        $driver->phone = $validatedData['phone'];
        $driver->vehicle_type = $validatedData['vehicle_type'];
        $driver->price_per_day = $validatedData['price_per_day'];
        $driver->image = $imagePath; // Simpan path gambar

        // Set provider_id dari user yang sedang login
        $driver->provider_id = $user->id;

        $driver->save(); // Simpan driver ke database

        // Redirect ke halaman index driver dengan pesan sukses
        return redirect()->route('drivers.index')->with('success', 'Driver added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        // Laravel akan secara otomatis meng-inject instance Driver berdasarkan ID di URL
        return view('drivers.show', compact('driver'));
    }

    // Anda bisa menambahkan method edit, update, dan destroy di sini jika diperlukan
}
