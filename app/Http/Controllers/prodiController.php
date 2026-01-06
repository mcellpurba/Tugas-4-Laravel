<?php

namespace App\Http\Controllers;

use App\Models\prodi;
use App\Models\fakultas;
use Illuminate\Http\Request;

class prodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = prodi::with('Fakultas')->get();
        return view('Prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = fakultas::all();
        return view('Prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'nama_fakultas' => 'required|exists:fakultas,id_fakultas',
        ]);

        prodi::create($validated);

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodi = prodi::with('Fakultas')->findOrFail($id);
        return view('Prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = prodi::findOrFail($id);
        $fakultas = fakultas::all();
        return view('Prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prodi = prodi::findOrFail($id);

        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'nama_fakultas' => 'required|exists:fakultas,id_fakultas',
        ]);

        $prodi->update($validated);

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus!');
    }
}
