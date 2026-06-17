<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HeroController extends Controller
{
    public function edit(): View
    {
        $hero = Hero::first() ?? new Hero();
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'badge_text'          => 'nullable|string|max:255',
            'headline'            => 'required|string|max:500',
            'subheadline'         => 'nullable|string',
            'btn_primary_text'    => 'nullable|string|max:100',
            'btn_primary_url'     => 'nullable|string|max:255',
            'btn_secondary_text'  => 'nullable|string|max:100',
            'btn_secondary_url'   => 'nullable|string|max:255',
            'stat_1_value'        => 'nullable|string|max:20',
            'stat_1_label'        => 'nullable|string|max:100',
            'stat_2_value'        => 'nullable|string|max:20',
            'stat_2_label'        => 'nullable|string|max:100',
            'stat_3_value'        => 'nullable|string|max:20',
            'stat_3_label'        => 'nullable|string|max:100',
            'is_active'           => 'nullable|boolean',
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sk_pdf'              => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $hero = Hero::first();
        if ($request->hasFile('image')) {
            if ($hero && $hero->image) {
                Storage::delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('hero');
        }

        if ($request->hasFile('sk_pdf')) {
            if ($hero && $hero->sk_pdf) {
                Storage::delete($hero->sk_pdf);
            }
            $data['sk_pdf'] = $request->file('sk_pdf')->store('hero_sk');
        }

        if ($hero) {
            $hero->update($data);
        } else {
            Hero::create($data);
        }

        return redirect()->route('admin.hero.edit')
            ->with('success', 'Hero section berhasil diperbarui!');
    }
}
