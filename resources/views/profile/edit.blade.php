@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white px-6 py-8 rounded-xl shadow-md space-y-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6 text-center sm:text-left">
        <!-- Avatar with image fallback-->
        <div class="w-20 h-20 rounded-full overflow-hidden shadow-inner border-2 border-yellow-400 mx-auto sm:mx-0">
            <img src="{{ asset('images/woman.png') }}" alt="Profile Avatar" class="object-cover w-full h-full" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div class="hidden bg-yellow-400 w-full h-full flex items-center justify-center text-3xl font-bold text-white">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
            <p class="text-sm text-gray-500">Part of CookLab since {{ \Carbon\Carbon::parse($user->created_at)->format('F Y') }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Username -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none" required>
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Bio -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Bio</label>
            <textarea name="bio" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">{{ old('bio', $user->bio) }}</textarea>
            @error('bio') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Action -->
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-yellow-600 transition">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
