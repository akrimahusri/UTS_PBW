<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
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

        return redirect()->route('dashboard')->with('success', 'Recipe created successfully!');
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::where('user_id', Auth::id())->findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
            $recipe->image_path = $imagePath;
        }

        $recipe->update([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'category' => $request->category,
        ]);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recipe updated!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::where('user_id', Auth::id())->findOrFail($id);
        $recipe->delete();

        return redirect()->route('dashboard')->with('success', 'Recipe deleted!');
    }
}