<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/dashboard', [RecipeController::class, 'index'])->name('dashboard');
    Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

Route::post('/recipes/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy')->middleware('auth');

Route::get('/reviews', [ReviewController::class, 'index']);

require __DIR__.'/auth.php';
