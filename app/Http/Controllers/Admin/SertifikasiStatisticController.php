<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SertifikasiStatistic;
use Illuminate\Http\Request;

class SertifikasiStatisticController extends Controller
{
    public function index()
    {
        $statistics = SertifikasiStatistic::orderBy('sort_order')->paginate(10);
        return view('admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.statistics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'peserta_kompeten' => 'required|integer|min:0',
            'peserta_belum_kompeten' => 'required|integer|min:0',
            'sort_order' => 'nullable|integer',
        ]);

        if (empty($validated['sort_order'])) {
            $validated['sort_order'] = 0;
        }

        SertifikasiStatistic::create($validated);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistik skema berhasil ditambahkan.');
    }

    public function edit(SertifikasiStatistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, SertifikasiStatistic $statistic)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'peserta_kompeten' => 'required|integer|min:0',
            'peserta_belum_kompeten' => 'required|integer|min:0',
            'sort_order' => 'nullable|integer',
        ]);

        if (empty($validated['sort_order'])) {
            $validated['sort_order'] = 0;
        }

        $statistic->update($validated);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistik skema berhasil diperbarui.');
    }

    public function destroy(SertifikasiStatistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('admin.statistics.index')->with('success', 'Statistik skema berhasil dihapus.');
    }
}
