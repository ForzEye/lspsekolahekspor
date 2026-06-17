<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SertifikasiSkema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SertifikasiSkemaController extends Controller
{
    public function index()
    {
        $skemas = SertifikasiSkema::orderBy('sort_order')->paginate(10);
        return view('admin.sertifikasi.skemas.index', compact('skemas'));
    }

    public function create()
    {
        return view('admin.sertifikasi.skemas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'               => 'required|string|max:50',
            'nama'               => 'required|string|max:255',
            'description'        => 'nullable|string',
            'level'              => 'required|in:Muda,Madya,Utama',
            'requirements'       => 'nullable|array',
            'sort_order'         => 'nullable|integer',
            'is_active'          => 'boolean',
            'metode_pelaksanaan' => 'nullable|string|max:255',
            'masa_berlaku'       => 'nullable|string|max:255',
            'jumlah_unit'        => 'nullable|integer',
            'harga'              => 'nullable|numeric|min:0',
            'units'              => 'nullable|array',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Clean requirements and units (remove null or empty rows)
        if (isset($validated['requirements'])) {
            $validated['requirements'] = array_values(array_filter($validated['requirements']));
        }
        if (isset($validated['units'])) {
            $validated['units'] = array_values(array_filter($validated['units'], function($unit) {
                return !empty($unit['kode']) || !empty($unit['nama']);
            }));
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('skemas');
        }

        SertifikasiSkema::create($validated);

        return redirect()->route('admin.sertifikasi.skemas.index')->with('success', 'Skema Sertifikasi berhasil ditambahkan.');
    }

    public function edit(SertifikasiSkema $skema)
    {
        return view('admin.sertifikasi.skemas.edit', compact('skema'));
    }

    public function update(Request $request, SertifikasiSkema $skema)
    {
        $validated = $request->validate([
            'kode'               => 'required|string|max:50',
            'nama'               => 'required|string|max:255',
            'description'        => 'nullable|string',
            'level'              => 'required|in:Muda,Madya,Utama',
            'requirements'       => 'nullable|array',
            'sort_order'         => 'nullable|integer',
            'is_active'          => 'boolean',
            'metode_pelaksanaan' => 'nullable|string|max:255',
            'masa_berlaku'       => 'nullable|string|max:255',
            'jumlah_unit'        => 'nullable|integer',
            'harga'              => 'nullable|numeric|min:0',
            'units'              => 'nullable|array',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Clean requirements and units (remove null or empty rows)
        if (isset($validated['requirements'])) {
            $validated['requirements'] = array_values(array_filter($validated['requirements']));
        }
        if (isset($validated['units'])) {
            $validated['units'] = array_values(array_filter($validated['units'], function($unit) {
                return !empty($unit['kode']) || !empty($unit['nama']);
            }));
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($skema->image) {
                Storage::delete($skema->image);
            }
            $validated['image'] = $request->file('image')->store('skemas');
        }

        $skema->update($validated);

        return redirect()->route('admin.sertifikasi.skemas.index')->with('success', 'Skema Sertifikasi berhasil diperbarui.');
    }

    public function destroy(SertifikasiSkema $skema)
    {
        if ($skema->image) {
            Storage::delete($skema->image);
        }
        $skema->delete();
        return redirect()->route('admin.sertifikasi.skemas.index')->with('success', 'Skema Sertifikasi berhasil dihapus.');
    }
}
