<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SebaranPeserta;
use Illuminate\Http\Request;

class SebaranPesertaController extends Controller
{
    public function index()
    {
        $sebarans = SebaranPeserta::orderBy('nama_wilayah')->paginate(10);
        return view('admin.sebaran.index', compact('sebarans'));
    }

    public function create()
    {
        return view('admin.sebaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_wilayah' => 'required|string|max:255|unique:sebaran_pesertas,nama_wilayah',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'jumlah_peserta' => 'required|integer|min:0',
        ]);

        SebaranPeserta::create($validated);

        return redirect()->route('admin.sebaran.index')->with('success', 'Sebaran wilayah berhasil ditambahkan.');
    }

    public function edit(SebaranPeserta $sebaran)
    {
        return view('admin.sebaran.edit', compact('sebaran'));
    }

    public function update(Request $request, SebaranPeserta $sebaran)
    {
        $validated = $request->validate([
            'nama_wilayah' => 'required|string|max:255|unique:sebaran_pesertas,nama_wilayah,' . $sebaran->id,
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'jumlah_peserta' => 'required|integer|min:0',
        ]);

        $sebaran->update($validated);

        return redirect()->route('admin.sebaran.index')->with('success', 'Sebaran wilayah berhasil diperbarui.');
    }

    public function destroy(SebaranPeserta $sebaran)
    {
        $sebaran->delete();
        return redirect()->route('admin.sebaran.index')->with('success', 'Sebaran wilayah berhasil dihapus.');
    }
}
