@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md space-y-6">
    <h2 class="text-2xl font-bold text-center text-gray-800">My Profile</h2>

    <div class="space-y-4">
        <div>
            <label class="block text-gray-600">Username:</label>
            <p class="font-medium">{{ $user->name }}</p>
        </div>
        <div>
            <label class="block text-gray-600">Phone Number:</label>
            <p class="font-medium">{{ $user->phone ?? '-' }}</p>
        </div>
        <div>
            <label class="block text-gray-600">Email:</label>
            <p class="font-medium">{{ $user->email }}</p>
        </div>
        <div>
            <label class="block text-gray-600">Bio:</label>
            <p class="font-medium">{{ $user->bio ?? '-' }}</p>
        </div>
    </div>

    <!-- Tombol Edit -->
    <div class="pt-6 flex justify-end overflow-visible">
    <a href="{{ route('profile.edit') }}"
       class="bg-yellow-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-yellow-600 transition">
        Edit Profile
    </a>
    </div>
</div>
@endsection
