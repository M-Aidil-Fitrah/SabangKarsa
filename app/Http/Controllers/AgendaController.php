<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::paginate(3); // Paginasi, 3 item per halaman
        return view('agenda', compact('agendas'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add agendas.');
        }
        return view('agendas.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'provider') {
            return redirect()->route('login')->with('message', 'Only providers can add agendas.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('agendas', 'public');
            $data['image'] = $path; // Simpan path relatif seperti 'agendas/nama_gambar.jpg'
        }

        $data['provider_id'] = $user->id;
        Agenda::create($data);

        return redirect()->route('agendas.index')->with('success', 'Agenda added successfully.');
    }

    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agendas.show', compact('agenda'));
    }
}