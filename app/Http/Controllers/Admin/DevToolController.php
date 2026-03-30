<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DevTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DevToolController extends Controller
{
    public function index()
    {
        $devTools = DevTool::orderBy('order')->paginate(15);
        return view('admin.dev-tools.index', compact('devTools'));
    }

    public function create()
    {
        return view('admin.dev-tools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
            'order' => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('dev_tools', 'public');
        }

        if (!isset($validated['order'])) {
            $validated['order'] = 0;
        }

        DevTool::create($validated);

        return redirect()->route('admin.dev-tools.index')->with('success', 'تم إضافة أداة المطور بنجاح.');
    }

    public function show(DevTool $devTool)
    {
        return view('admin.dev-tools.show', compact('devTool'));
    }

    public function edit(DevTool $devTool)
    {
        return view('admin.dev-tools.edit', compact('devTool'));
    }

    public function update(Request $request, DevTool $devTool)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
            'order' => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($devTool->image) {
                Storage::disk('public')->delete($devTool->image);
            }
            $validated['image'] = $request->file('image')->store('dev_tools', 'public');
        }

        $devTool->update($validated);

        return redirect()->route('admin.dev-tools.index')->with('success', 'تم تحديث أداة المطور بنجاح.');
    }

    public function destroy(DevTool $devTool)
    {
        if ($devTool->image) {
            Storage::disk('public')->delete($devTool->image);
        }
        $devTool->delete();

        return redirect()->route('admin.dev-tools.index')->with('success', 'تم حذف الأداة بنجاح.');
    }
}
