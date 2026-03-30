<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip;
use App\Models\Track;
use App\Models\DevTool;
use App\Models\OpenSourceProject;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch dynamic data from database
        $tips = Tip::latest()->take(6)->get();
        $tracks = Track::with('subTracks')->latest()->get();
        $tools = DevTool::orderBy('order')->get();
        $projects = OpenSourceProject::latest()->take(6)->get();

        // Advanced Techniques and Articles (fallback to arrays until their models/CRUD are fully populated)
        $advancedTechniques = collect([]);
        $allArticles = collect([]);

        return view('pages.home', compact('tips', 'tracks', 'advancedTechniques', 'allArticles', 'tools', 'projects'));
    }
}
