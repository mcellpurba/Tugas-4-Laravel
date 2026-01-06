<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\prodi;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::with('Prodi.Fakultas')->get();
        return view('Mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodi::with('Fakultas')->get();
        return view('Mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'nama_mahasiswa' => 'required|string|max:255',
            'prodi' => 'required|exists:prodis,id_prodi',
            'fakultas' => 'required|exists:fakultas,id_fakultas',
            'email' => 'required|email|unique:mahasiswas,email',
            'no_hp' => 'required|string|max:20',
        ]);

        mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = mahasiswa::with('Prodi.Fakultas')->findOrFail($id);
        return view('Mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $prodi = prodi::with('Fakultas')->get();
        return view('Mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $id . ',id_mahasiswa',
            'nama_mahasiswa' => 'required|string|max:255',
            'prodi' => 'required|exists:prodis,id_prodi',
            'fakultas' => 'required|exists:fakultas,id_fakultas',
            'email' => 'required|email|unique:mahasiswas,email,' . $id . ',id_mahasiswa',
            'no_hp' => 'required|string|max:20',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
