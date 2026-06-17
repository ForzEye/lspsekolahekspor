<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first() ?? new About();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first() ?? new About();

        $validated = $request->validate([
            'label'           => 'nullable|string|max:255',
            'heading'         => 'required|string|max:255',
            'description'     => 'required|string',
            'highlights'      => 'nullable|array',
            'image'           => 'nullable|image|max:2048',
            'image_profil'    => 'nullable|image|max:2048',
            'vision_title'    => 'nullable|string|max:255',
            'vision_content'  => 'nullable|string',
            'mission_title'   => 'nullable|string|max:255',
            'mission_items'   => 'nullable|array',
            'values'          => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image) { Storage::delete($about->image); }
            $validated['image'] = $request->file('image')->store('about');
        }

        if ($request->hasFile('image_profil')) {
            if ($about->image_profil) { Storage::delete($about->image_profil); }
            $validated['image_profil'] = $request->file('image_profil')->store('about');
        }

        $about->fill($validated);
        $about->save();

        return redirect()->back()->with('success', 'Informasi Tentang Kami berhasil diperbarui.');
    }
}
