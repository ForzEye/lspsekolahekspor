<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsesorController extends Controller
{
    public function index()
    {
        $asesors = Asesor::orderBy('sort_order')->paginate(10);
        return view('admin.asesors.index', compact('asesors'));
    }

    public function create()
    {
        return view('admin.asesors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('asesors');
        }

        Asesor::create($validated);

        return redirect()->route('admin.asesors.index')->with('success', 'Asesor berhasil ditambahkan.');
    }

    public function edit(Asesor $asesor)
    {
        return view('admin.asesors.edit', compact('asesor'));
    }

    public function update(Request $request, Asesor $asesor)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
            'sort_order'  => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            if ($asesor->photo) {
                Storage::delete($asesor->photo);
            }
            $validated['photo'] = $request->file('photo')->store('asesors');
        }

        $asesor->update($validated);

        return redirect()->route('admin.asesors.index')->with('success', 'Asesor berhasil diperbarui.');
    }

    public function destroy(Asesor $asesor)
    {
        if ($asesor->photo) {
            Storage::delete($asesor->photo);
        }
        $asesor->delete();
        return redirect()->route('admin.asesors.index')->with('success', 'Asesor berhasil dihapus.');
    }
}
