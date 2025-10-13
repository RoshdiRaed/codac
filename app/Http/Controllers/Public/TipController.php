<?php

namespace App\Http\Controllers\Public;

use App\Models\Tip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::latest()->take(3)->get(); // آخر 3 نصائح
        return view('public.home', compact('tips'));
    }

    public function show($id)
    {
        $tip = Tip::findOrFail($id);
        return view('public.tips.show', compact('tip'));
    }
}
