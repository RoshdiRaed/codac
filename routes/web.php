<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\TipController;
use App\Http\Controllers\Public\AdvancedTechniqueController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\NewsletterController;
use App\Models\Tip;
use App\Models\AdvancedTechnique;
use App\Models\Track;

Route::get('/', function () {
    DB::table('page_views')->insert([
        'page' => 'home',
        'ip_address' => request()->ip(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $tips = Tip::latest()->take(6)->get();
    $allTips = Tip::latest()->get();
    $advancedTechniques = AdvancedTechnique::latest()->take(6)->get();
    $allArticles = AdvancedTechnique::latest()->get();
    $tracks = Track::all();

    return view('public.home', compact('tips', 'advancedTechniques', 'allArticles', 'allTips', 'tracks'));
});

Route::get('/tracks/{id}', function ($id) {
    $track = Track::findOrFail($id);
    return view('public.track.index', compact('track'));
})->name('track.show');


Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');

Route::post('/subscribe-newsletter', [NewsletterController::class, 'subscribe'])->name('subscribe-newsletter');


Route::get('/tips', [TipController::class, 'index'])->name('tips.index');
Route::get('/tips/{id}', [TipController::class, 'show'])->name('tips.show');

Route::get('/advanced', [AdvancedTechniqueController::class, 'index'])->name('advanced.index');
Route::get('/advanced/{id}', [AdvancedTechniqueController::class, 'show'])->name('advanced.show');

// Route::get('/', [HomeController::class, 'index'])->name('home');
