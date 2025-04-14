<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Recipe; // Pastikan Recipe model juga diimport

class ReviewController extends Controller
{
    public function store(Request $request, $recipeId)
    {
        // Validasi input dari form
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',  // Rating antara 1 dan 5
            'comment' => 'nullable|string',  // Comment opsional, bisa kosong
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cek apakah resep dengan ID $recipeId ada
        $recipe = Recipe::find($recipeId);
        if (!$recipe) {
            return redirect()->back()->with('error', 'Recipe not found!');
        }

        // Membuat review baru
        Review::create([
            'user_id' => auth()->id(),  // ID pengguna yang sedang login
            'recipe_id' => $recipeId,   // ID resep yang diberikan review
            'rating' => $request->rating,  // Rating yang diberikan
            'comment' => $request->comment, // Komentar (opsional)
        ]);

        // Simpan review
        $review = new Review();
        $review->recipe_id = $recipeId;
        $review->user_id = auth()->id();
        $review->rating = $request->rating;
        $review->comment = $request->comment;

         // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reviews', 'public');
            $review->image_path = $imagePath;
        }

    $review->save();

    return redirect()->route('recipes.show', $recipeId)->with('success', 'Review added successfully.');
    }

    public function destroy($id)
{
    $review = Review::findOrFail($id);

    // Pastikan hanya pemilik review yang bisa hapus
    if (auth()->id() !== $review->user_id) {
        abort(403);
    }

    // Hapus file gambar jika ada
    if ($review->image_path && \Storage::exists($review->image_path)) {
        \Storage::delete($review->image_path);
    }

    $review->delete();

    return back()->with('success', 'Review berhasil dihapus.');
}

}

