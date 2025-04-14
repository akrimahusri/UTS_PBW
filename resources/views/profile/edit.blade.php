@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow space-y-6">
    <h2 class="text-2xl font-bold text-center text-gray-800">Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block text-gray-600">Username</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full px-4 py-2 border rounded" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-600">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full px-4 py-2 border rounded">
            @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-600">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full px-4 py-2 border rounded" required>
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-600">Bio</label>
            <textarea name="bio" rows="4" class="w-full px-4 py-2 border rounded">{{ old('bio', $user->bio) }}</textarea>
            @error('bio') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('profile') }}" class="text-gray-600 hover:underline">Cancel</a>
            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">Save</button>
        </div>
    </form>
</div>
@endsection
