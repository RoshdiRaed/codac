<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::latest()->paginate(15);
        return view('admin.tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('admin.tracks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
        ]);

        Track::create($validated);

        return redirect()->route('admin.tracks.index')->with('success', 'تم إنشاء المسار بنجاح.');
    }

    public function show(Track $track)
    {
        return view('admin.tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        return view('admin.tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
        ]);

        $track->update($validated);

        return redirect()->route('admin.tracks.index')->with('success', 'تم تحديث المسار بنجاح.');
    }

    public function destroy(Track $track)
    {
        // Add check if has subtracks or enrollments, maybe prevent deletion
        if ($track->subTracks()->count() > 0 || $track->enrollments()->count() > 0) {
            return redirect()->route('admin.tracks.index')->with('error', 'لا يمكن حذف المسار لوجود بيانات مرتبطة به.');
        }

        $track->delete();

        return redirect()->route('admin.tracks.index')->with('success', 'تم حذف المسار بنجاح.');
    }
}
