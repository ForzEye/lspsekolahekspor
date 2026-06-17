<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::ordered()->paginate(15);
        return view('admin.programs.index', compact('programs'));
    }

    public function create(): View
    {
        return view('admin.programs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'icon'        => 'nullable|string|max:10',
            'description' => 'required|string',
            'duration'    => 'nullable|string|max:50',
            'mode'        => 'nullable|in:Online,Offline,Hybrid',
            'slug'        => 'nullable|string|unique:programs,slug',
            'sort_order'  => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active'   => 'nullable|boolean',
            'icon_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data['slug']       = $data['slug'] ?? Str::slug($data['title']);
        $data['is_active']  = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['icon']       = $data['icon'] ?? '🎓';

        if ($request->hasFile('icon_image')) {
            $data['icon_image'] = $request->file('icon_image')->store('programs');
        }

        Program::create($data);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil ditambahkan!');
    }

    public function edit(Program $program): View
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program): RedirectResponse
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'icon'        => 'nullable|string|max:10',
            'description' => 'required|string',
            'duration'    => 'nullable|string|max:50',
            'mode'        => 'nullable|in:Online,Offline,Hybrid',
            'slug'        => 'nullable|string|unique:programs,slug,' . $program->id,
            'sort_order'  => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active'   => 'nullable|boolean',
            'icon_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data['slug']        = $data['slug'] ?? Str::slug($data['title']);
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('icon_image')) {
            if ($program->icon_image) {
                Storage::delete($program->icon_image);
            }
            $data['icon_image'] = $request->file('icon_image')->store('programs');
        }

        $program->update($data);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy(Program $program): RedirectResponse
    {
        if ($program->icon_image) {
            Storage::delete($program->icon_image);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil dihapus!');
    }
}
