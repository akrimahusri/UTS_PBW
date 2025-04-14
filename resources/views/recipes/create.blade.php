@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-2xl mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create New Recipe</h2>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded-md">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label for="title" class="block font-semibold text-gray-700">Recipe Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full p-2 border border-gray-300 rounded-lg" placeholder="e.g. Waffles" required>
        </div>

        <div>
            <label for="ingredients" class="block font-semibold text-gray-700">Ingredients</label>
            <textarea name="ingredients" id="ingredients" rows="4"
                class="w-full p-2 border border-gray-300 rounded-lg"
                placeholder="List your ingredients here..." required>{{ old('ingredients') }}</textarea>
        </div>

        <div>
            <label for="instructions" class="block font-semibold text-gray-700">Instructions</label>
            <textarea name="instructions" id="instructions" rows="5"
                class="w-full p-2 border border-gray-300 rounded-lg"
                placeholder="Write the cooking steps..." required>{{ old('instructions') }}</textarea>
        </div>

        <div>
            <label for="category" class="block font-semibold text-gray-700">Category</label>
            <select name="category" id="category"
                class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="">Select Category</option>
                <option value="Quick & Easy" {{ old('category') == 'Quick & Easy' ? 'selected' : '' }}>Quick & Easy</option>
                <option value="Main Course" {{ old('category') == 'Main Course' ? 'selected' : '' }}>Main Course</option>
                <option value="Sauce & Dip" {{ old('category') == 'Sauce & Dip' ? 'selected' : '' }}>Sauce & Dip</option>
                <option value="Drink" {{ old('category') == 'Drink' ? 'selected' : '' }}>Drink</option>
                <option value="Vegan" {{ old('category') == 'Vegan' ? 'selected' : '' }}>Vegan</option>
                <option value="Dessert" {{ old('category') == 'Dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <div>
            <label for="image" class="block font-semibold text-gray-700">Upload Image</label>
            <input type="file" name="image" id="image"
                class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-xl transition">
                Save Recipe
            </button>
        </div>
    </form>
</div>
@endsection
