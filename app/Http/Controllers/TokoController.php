<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $tokos = Toko::withCount('stoks')->get();
        return view('tokos.index', compact('tokos'));
    }

    public function create()
    {
        return view('tokos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Toko::create($request->all());
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil ditambahkan!');
    }

    public function show(Toko $toko)
    {
        $toko->load(['stoks.product']);
        return view('tokos.show', compact('toko'));
    }

    public function edit(Toko $toko)
    {
        return view('tokos.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $toko->update($request->all());
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil diperbarui!');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil dihapus!');
    }
}
