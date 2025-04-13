<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

class RecipeController extends Controller
{
    public function create()
    {
        return view('recipes.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipes', 'public');
        }
    
        Recipe::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'category' => $request->category,
            'image_path' => $path,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Recipe created!');
    }
}
