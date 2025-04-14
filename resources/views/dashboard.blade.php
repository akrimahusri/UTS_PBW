@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($recipes->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($recipes as $recipe)
                <div class="bg-white rounded shadow p-4">
                    @if ($recipe->image_path)
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="Recipe Image" class="w-full h-40 object-cover rounded mb-4">
                    @endif
                    <h2 class="text-xl font-semibold">{{ $recipe->title }}</h2>
                    <p class="text-sm text-gray-600 mb-2">{{ $recipe->category }}</p>
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="text-blue-600 hover:underline">View Details</a>
                </div>
            @endforeach
        </div>
        @else
            <div class="flex items-center justify-center h-96">
                <p class="text-gray-600 text-xl">Nothing here yet.</p>
            </div>
        @endif
</div>
@endsection
