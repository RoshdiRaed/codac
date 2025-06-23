<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function show($id)
    {
        $track = Track::findOrFail($id);
        return view('public.track.index', compact('track'));
    }
}