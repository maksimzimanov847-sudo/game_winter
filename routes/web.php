<?php

use App\Http\Controllers\ArticlerticleController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReviewsController;






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [GameController::class, 'index'])->name('game.index');
Route::post('/articles/{article}/increment-rating', [ArticlerticleController::class, 'incrementRating'])
    ->name('articles.incrementRating');
Route::post('/articles/{article}/decrement-rating', [ArticlerticleController::class, 'decrementRating'])
    ->name('articles.decrementRating');
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('articles',ArticlerticleController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
