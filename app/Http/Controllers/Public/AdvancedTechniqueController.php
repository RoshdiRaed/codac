<?php

namespace App\Http\Controllers\Public;

use App\Models\AdvancedTechnique;
use App\Http\Controllers\Controller;

class AdvancedTechniqueController extends Controller
{
    public function index()
    {
        $advancedTechniques = AdvancedTechnique::latest()->paginate(6);
        return view('public.advanced.index', compact('advancedTechniques'));
    }

    public function show($id)
    {
        $technique = AdvancedTechnique::findOrFail($id);
        return view('public.advanced.show', compact('technique'));
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    AdvancedTechnique::create($validated);

    return redirect()->route('advanced.index')->with('success', 'تمت الإضافة بنجاح');
}

}
