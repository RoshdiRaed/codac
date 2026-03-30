<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::latest()->paginate(15);
        return view('admin.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('admin.tips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('tips', 'public');
        }

        Tip::create($validated);

        return redirect()->route('admin.tips.index')->with('success', 'تم إنشاء النصيحة بنجاح.');
    }

    public function show(Tip $tip)
    {
        return view('admin.tips.show', compact('tip'));
    }

    public function edit(Tip $tip)
    {
        return view('admin.tips.edit', compact('tip'));
    }

    public function update(Request $request, Tip $tip)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'content' => 'required|string',
            'category' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($tip->image) {
                Storage::disk('public')->delete($tip->image);
            }
            $validated['image'] = $request->file('image')->store('tips', 'public');
        }

        $tip->update($validated);

        return redirect()->route('admin.tips.index')->with('success', 'تم تحديث النصيحة بنجاح.');
    }

    public function destroy(Tip $tip)
    {
        if ($tip->image) {
            Storage::disk('public')->delete($tip->image);
        }
        $tip->delete();

        return redirect()->route('admin.tips.index')->with('success', 'تم حذف النصيحة بنجاح.');
    }
}
