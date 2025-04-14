@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-2xl mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Recipe</h2>

    {{-- Display Errors --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded-md">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Update --}}
    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $recipe->title) }}" class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold">Ingredients</label>
            <textarea name="ingredients" rows="4" class="w-full p-2 border border-gray-300 rounded-lg">{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Instructions</label>
            <textarea name="instructions" rows="5" class="w-full p-2 border border-gray-300 rounded-lg">{{ old('instructions', $recipe->instructions) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Category</label>
            <input type="text" name="category" value="{{ old('category', $recipe->category) }}" class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold">Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-lg">
            @if($recipe->image_path)
                <p class="mt-2">Current image:</p>
                <img src="{{ asset('storage/' . $recipe->image_path) }}" class="w-40 rounded-md mt-1">
            @endif
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg">
                Update
            </button>
            <button type="button" onclick="openModal()" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg">
                Delete
            </button>
        </div>
    </form>

    {{-- Modal Delete --}}
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Delete Recipe?</h2>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this recipe? This action cannot be undone.</p>

            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-center space-x-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JS Modal --}}
<script>
    function openModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection
