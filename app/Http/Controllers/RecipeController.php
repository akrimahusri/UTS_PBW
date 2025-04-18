<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class RecipeController extends Controller
{
    // Menampilkan resep publik di dashboard
    public function index()
    {
        $recipes = Recipe::where('user_id', Auth::id())->with('ratings', 'reviews')->get();
        return view('recipes.my-recipes', compact('recipes'));
    }

    // Menampilkan resep milik user sendiri
    public function myRecipes()
    {
        $recipes = Recipe::where('user_id', Auth::id())->latest()->get();
        return view('recipes.my-recipes', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'ingredients' => 'required|string',
        'instructions' => 'required|string',
        'category' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'is_public' => 'nullable|boolean',
    ]);

    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('recipes', 'public');
    }

    // Simpan resep
        $recipe = new Recipe();
        $recipe->user_id = Auth::id();
        $recipe->title = $validated['title'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->instructions = $validated['instructions'];
        $recipe->category = $validated['category'] ?? null;
        $recipe->image_path = $path;
        $recipe->is_public = $request->has('is_public') ? true : false;
        $recipe->save();

        return redirect()->route('recipes.my')->with('success', 'Recipe created successfully!');
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
            'is_public' => 'nullable|boolean',
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
            'is_public' => $request->has('is_public'),
        ]);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recipe updated!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::where('user_id', Auth::id())->findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.my')->with('success', 'Recipe deleted!');
    }
}