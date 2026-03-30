<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::latest()->paginate(15);
        return view('admin.communities.index', compact('communities'));
    }

    public function create()
    {
        return view('admin.communities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('communities', 'public');
        }

        Community::create($validated);

        return redirect()->route('admin.communities.index')->with('success', 'تم إنشاء المجتمع بنجاح.');
    }

    public function show(Community $community)
    {
        return view('admin.communities.show', compact('community'));
    }

    public function edit(Community $community)
    {
        return view('admin.communities.edit', compact('community'));
    }

    public function update(Request $request, Community $community)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Model handles old image deletion via booted method
            $validated['image'] = $request->file('image')->store('communities', 'public');
        }

        $community->update($validated);

        return redirect()->route('admin.communities.index')->with('success', 'تم تحديث المجتمع بنجاح.');
    }

    public function destroy(Community $community)
    {
        // Model handles image deletion via booted method
        $community->delete();

        return redirect()->route('admin.communities.index')->with('success', 'تم حذف المجتمع بنجاح.');
    }
}
