<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow">
            <h2 class="text-2xl font-bold mb-6">Create New Recipe</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium">Title</label>
                    <input type="text" name="title" id="title" required
                        class="w-full border rounded-xl px-3 py-2 mt-1">
                </div>

                <div class="mb-4">
                    <label for="ingredients" class="block text-sm font-medium">Ingredients</label>
                    <textarea name="ingredients" id="ingredients" rows="4"
                        class="w-full border rounded-xl px-3 py-2 mt-1"></textarea>
                </div>

                <div class="mb-4">
                    <label for="instructions" class="block text-sm font-medium">Instructions</label>
                    <textarea name="instructions" id="instructions" rows="5"
                        class="w-full border rounded-xl px-3 py-2 mt-1"></textarea>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium">Category</label>
                    <select name="category" id="category"
                        class="w-full border rounded-xl px-3 py-2 mt-1">
                        <option value="">Select</option>
                        <option value="Quick & Easy">Quick & Easy</option>
                        <option value="Main Course">Main Course</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Drink">Drink</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium">Upload Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full mt-1">
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                        Save Recipe
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
