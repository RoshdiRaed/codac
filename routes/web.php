<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Communities
Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');

// Newsletter Subscription
Route::post('/subscribe-newsletter', [NewsletterController::class, 'subscribe'])->name('subscribe-newsletter');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add your protected routes here
    // Example: Route::resource('posts', PostController::class);
});

// Authentication Routes (login, register, etc.)
require __DIR__.'/auth.php';
