<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use App\Models\Recipe;

Route::get('/', function () {
    return view('home');
});

// Dashboard: menampilkan resep publik
Route::get('/dashboard', function () {
    $recipes = Recipe::where('user_id', auth()->id())->get();
    return view('dashboard', compact('recipes'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profil pengguna
    // Lihat profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Edit profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resep milik user
    Route::get('/my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.my');

    // CRUD Resep
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Review
    Route::post('/recipes/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Review publik
Route::get('/reviews', [ReviewController::class, 'index']);


require __DIR__.'/auth.php';