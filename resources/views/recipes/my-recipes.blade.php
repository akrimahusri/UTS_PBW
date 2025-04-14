@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-2xl mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">My Recipes</h2>

    @if ($recipes->isEmpty())
        <p class="text-gray-600">You haven't added any recipes yet.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($recipes as $recipe)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    @if ($recipe->image_path)
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif
                    <h3 class="text-xl font-semibold text-gray-700">{{ $recipe->title }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ Str::limit($recipe->ingredients, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="text-blue-600 hover:underline">View Details</a>
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection