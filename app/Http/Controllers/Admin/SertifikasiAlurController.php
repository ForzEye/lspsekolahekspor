<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SertifikasiAlur;
use Illuminate\Http\Request;

class SertifikasiAlurController extends Controller
{
    public function index()
    {
        $alurs = SertifikasiAlur::orderBy('type')->orderBy('step_number')->get();
        return view('admin.sertifikasi.alurs.index', compact('alurs'));
    }

    public function create()
    {
        return view('admin.sertifikasi.alurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'          => 'required|in:tatap_muka,jarak_jauh',
            'step_number'   => 'required|integer',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'icon'          => 'nullable|string|max:50',
            'extra_label'   => 'nullable|string|max:255',
            'extra_content' => 'nullable|string',
        ]);

        SertifikasiAlur::create($validated);

        return redirect()->route('admin.sertifikasi.alurs.index')->with('success', 'Alur Sertifikasi berhasil ditambahkan.');
    }

    public function edit(SertifikasiAlur $alur)
    {
        return view('admin.sertifikasi.alurs.edit', compact('alur'));
    }

    public function update(Request $request, SertifikasiAlur $alur)
    {
        $validated = $request->validate([
            'type'          => 'required|in:tatap_muka,jarak_jauh',
            'step_number'   => 'required|integer',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'icon'          => 'nullable|string|max:50',
            'extra_label'   => 'nullable|string|max:255',
            'extra_content' => 'nullable|string',
        ]);

        $alur->update($validated);

        return redirect()->route('admin.sertifikasi.alurs.index')->with('success', 'Alur Sertifikasi berhasil diperbarui.');
    }

    public function destroy(SertifikasiAlur $alur)
    {
        $alur->delete();
        return redirect()->route('admin.sertifikasi.alurs.index')->with('success', 'Alur Sertifikasi berhasil dihapus.');
    }
}
