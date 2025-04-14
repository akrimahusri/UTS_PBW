@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-2xl mt-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $recipe->title }}</h2>

    @if($recipe->image_path)
        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}"
            class="w-full max-h-[400px] object-cover rounded-xl mb-6">
    @endif

    <div class="mb-4">
        <span class="inline-block bg-green-100 text-green-700 text-sm font-medium px-3 py-1 rounded-full">
            {{ $recipe->category ?? 'Uncategorized' }}
        </span>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Ingredients</h3>
        <p class="whitespace-pre-line text-gray-800">{{ $recipe->ingredients }}</p>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Instructions</h3>
        <p class="whitespace-pre-line text-gray-800">{{ $recipe->instructions }}</p>
    </div>

    <a href="{{ route('dashboard') }}"
       class="inline-block mt-4 text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

@auth
<form action="{{ route('reviews.store', $recipe->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
    @csrf

    <!-- Rating -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Rating:</label>
        <div class="flex flex-row-reverse justify-end">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required />
                <label for="star{{ $i }}" class="text-2xl cursor-pointer peer-checked:text-yellow-400 text-gray-300">
                    ★
                </label>
            @endfor
        </div>
    </div>

    <!-- Comment -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Comment:</label>
        <textarea name="comment" rows="3" class="w-full border p-2 rounded"></textarea>
    </div>

    <!-- Image Upload -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Upload Image (optional):</label>
        <input type="file" name="image" accept="image/*" class="w-full border p-2 rounded">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Kirim Review
    </button>
</form>
@endauth

<h3 class="font-bold text-lg mt-6">Reviews:</h3>
@forelse ($recipe->reviews as $review)
    <div class="border-t py-4">
        <div class="flex justify-between items-center">
            <p>
                <strong>{{ $review->user->name }}</strong> - {{ $review->rating }} ⭐
            </p>
            @auth
                @if(auth()->id() === $review->user_id)
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm hover:underline">Hapus</button>
                    </form>
                @endif
            @endauth
        </div>
        <p class="mt-1">{{ $review->comment }}</p>

        @if($review->image_path)
            <img src="{{ asset('storage/' . $review->image_path) }}" alt="Review image" class="mt-2 w-40 rounded shadow">
        @endif
    </div>
@empty
    <p>No reviews yet.</p>
@endforelse

@endsection
