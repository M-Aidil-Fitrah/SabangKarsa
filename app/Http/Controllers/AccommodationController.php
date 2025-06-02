<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::with('provider')->get(); // Fetch all accommodations
        return view('accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role !== 'provider') {
            return redirect()->back()->with('error', 'Only providers can add accommodations.');
        }
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'type' => 'required|string|max:255', // Validasi untuk kolom 'type'
            'description' => 'nullable|string',
            'amenities' => 'nullable|string', // Awalnya terima sebagai string
            'owner_phone' => 'nullable|string|max:20', // Validasi untuk kolom 'owner_phone'
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // 2. Konversi Amenities dari String ke Array
        if (!empty($validatedData['amenities'])) {
            // Pisahkan string berdasarkan koma, trim spasi, dan filter nilai kosong
            $amenitiesArray = array_map('trim', explode(',', $validatedData['amenities']));
            $amenitiesArray = array_filter($amenitiesArray); // Hapus elemen kosong jika ada
        } else {
            $amenitiesArray = []; // Jika kosong, set array kosong
        }

        // 3. Upload Gambar (Jika Ada)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('accommodation_images', 'public');
            // 'accommodation_images' adalah folder di dalam storage/app/public
            // 'public' adalah disk yang digunakan
        }

        // 4. Buat Akomodasi Baru
        $accommodation = new Accommodation();
        $accommodation->name = $validatedData['name'];
        $accommodation->price_per_night = $validatedData['price_per_night'];
        $accommodation->type = $validatedData['type']; // Simpan kolom 'type'
        $accommodation->description = $validatedData['description'];
        $accommodation->amenities = $amenitiesArray; // Simpan sebagai array (akan di-cast ke JSON otomatis)
        $accommodation->owner_phone = $validatedData['owner_phone']; // Simpan kolom 'owner_phone'
        $accommodation->location = $validatedData['location'];
        $accommodation->image = $imagePath; // Simpan path gambar

        // Asumsi provider_id diambil dari user yang sedang login
        $accommodation->provider_id = Auth::user()->provider->id; // Pastikan user sudah login

        $accommodation->save();

        return redirect()->route('accommodations.index')->with('success', 'Accommodation added successfully!');
    }
    public function edit(Accommodation $accommodation)
    {
        $this->authorizeProvider($accommodation);
        return view('accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        $this->authorizeProvider($accommodation);

        $request->validate([
            'nama_penginapan' => 'required|string|max:255',
            'harga_per_malam' => 'required|numeric|min:0',
            'tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'amenities' => 'nullable|array',
            'owner_phone' => 'nullable|string|max:20',
            'location' => 'nullable|string',
        ]);

        $accommodation->update([
            'nama_penginapan' => $request->nama_penginapan,
            'harga_per_malam' => $request->harga_per_malam,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'amenities' => $request->amenities ? json_encode($request->amenities) : $accommodation->amenities,
            'owner_phone' => $request->owner_phone,
            'location' => $request->location,
        ]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation updated successfully!');
    }

    public function destroy(Accommodation $accommodation)
    {
        $this->authorizeProvider($accommodation);
        $accommodation->delete();
        return redirect()->route('accommodations.index')->with('success', 'Accommodation deleted successfully!');
    }

    private function authorizeProvider(Accommodation $accommodation)
    {
        if ($accommodation->provider_id !== Auth::user()->provider->id) {
            abort(403, 'Unauthorized action.');
        }
    }
        public function show(Accommodation $accommodation)
    {
        // Laravel akan secara otomatis meng-inject instance Accommodation berdasarkan ID di URL
        return view('accommodations.show', compact('accommodation'));
    }
}