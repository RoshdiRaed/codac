<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\TipController;
use App\Http\Controllers\Public\AdvancedTechniqueController;
use Illuminate\Support\Facades\DB;

use App\Models\Tip;
use App\Models\AdvancedTechnique;

Route::get('/', function () {
    DB::table('page_views')->insert([
        'page' => 'home',
        'ip_address' => request()->ip(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $tips = Tip::latest()->take(5)->get();
    $advancedTechniques = AdvancedTechnique::latest()->take(5)->get();

    return view('public.home', compact('tips', 'advancedTechniques'));
})->name('home');

Route::get('/tips', [TipController::class, 'index'])->name('tips.index');
Route::get('/tips/{id}', [TipController::class, 'show'])->name('tips.show');

Route::get('/advanced', [AdvancedTechniqueController::class, 'index'])->name('advanced.index');
Route::get('/advanced/{id}', [AdvancedTechniqueController::class, 'show'])->name('advanced.show');

// Route::get('/', [HomeController::class, 'index'])->name('home');
