<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">
                    Welcome, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-gray-600 mb-6">Ready to explore some delicious recipes?</p>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Card Example -->
                    <div class="bg-blue-100 p-6 rounded-xl shadow hover:shadow-md transition">
                        <h2 class="text-xl font-semibold mb-2 text-blue-800">Explore Recipes</h2>
                        <p class="text-sm text-blue-700">Browse and find something yummy today.</p>
                    </div>

                    <div class="bg-green-100 p-6 rounded-xl shadow hover:shadow-md transition">
                        <h2 class="text-xl font-semibold mb-2 text-green-800">My Profile</h2>
                        <p class="text-sm text-green-700">View or edit your profile details.</p>
                    </div>

                    <div class="bg-yellow-100 p-6 rounded-xl shadow hover:shadow-md transition">
                        <h2 class="text-xl font-semibold mb-2 text-yellow-800">Create Recipe</h2>
                        <p class="text-sm text-yellow-700">Share your own cooking creations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
