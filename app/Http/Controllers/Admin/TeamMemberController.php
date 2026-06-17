<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->paginate(10);
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'photo'      => 'nullable|image|max:2048',
            'is_active'  => 'boolean',
        ]);

        $positionsOrder = [
            'Direktur Utama' => 1,
            'Direktur LSP' => 2,
            'Komite Skema' => 3,
            'Manajer Sertifikasi' => 4,
            'Manajer Mutu' => 5,
            'Manajer Administrasi' => 6,
        ];
        $validated['sort_order'] = $positionsOrder[$validated['position']] ?? 99;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Anggota Tim berhasil ditambahkan.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'photo'      => 'nullable|image|max:2048',
            'is_active'  => 'boolean',
        ]);

        $positionsOrder = [
            'Direktur Utama' => 1,
            'Direktur LSP' => 2,
            'Komite Skema' => 3,
            'Manajer Sertifikasi' => 4,
            'Manajer Mutu' => 5,
            'Manajer Administrasi' => 6,
        ];
        $validated['sort_order'] = $positionsOrder[$validated['position']] ?? 99;

        if ($request->hasFile('photo')) {
            if ($team->photo) {
                Storage::delete($team->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team');
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Anggota Tim berhasil diperbarui.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo) {
            Storage::delete($team->photo);
        }
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Anggota Tim berhasil dihapus.');
    }
}
