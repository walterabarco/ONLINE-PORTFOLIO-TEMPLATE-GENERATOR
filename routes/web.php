
<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public portfolio page — published portfolios only
Route::get('/p/{slug}', [PortfolioController::class, 'show'])
    ->name('portfolios.show');

// Dashboard
Route::get('/dashboard', function () {
    return redirect()->route('portfolios.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Portfolio preview — works for drafts owned by the logged-in user
    Route::get('/portfolios/{portfolio}/preview', [PortfolioController::class, 'preview'])
        ->name('portfolios.preview');

    // Portfolio management
    Route::resource('portfolios', PortfolioController::class)
        ->except(['show']);

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
