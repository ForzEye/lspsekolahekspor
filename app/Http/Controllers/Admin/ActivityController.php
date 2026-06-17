<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('order')->orderBy('date', 'desc')->get();
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'type' => 'required|in:image,video',
            'media' => 'required_if:type,image|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'media_url' => 'required_if:type,video|nullable|url',
            'date' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->has('is_featured');

        if ($request->type === 'image') {
            $data['media_path'] = $request->file('media')->store('activities');
        } else {
            $data['media_path'] = $request->media_url;
        }

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'type' => 'required|in:image,video',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'media_url' => 'required_if:type,video|nullable|url',
            'date' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->has('is_featured');

        if ($request->type === 'image' && $request->hasFile('media')) {
            if ($activity->media_path && $activity->type === 'image') {
                Storage::delete($activity->media_path);
            }
            $data['media_path'] = $request->file('media')->store('activities');
        } elseif ($request->type === 'video') {
            $data['media_path'] = $request->media_url;
        }

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->type === 'image' && $activity->media_path) {
            Storage::delete($activity->media_path);
        }
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
