@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow space-y-6">
    <h2 class="text-2xl font-bold text-center text-gray-800">My Profile</h2>

    @if(session('success'))
        <div class="p-4 text-green-600 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        <div>
            <label class="text-gray-600">Username:</label>
            <p class="font-medium">{{ $user->name }}</p>
        </div>
        <div>
            <label class="text-gray-600">Phone Number:</label>
            <p class="font-medium">{{ $user->phone ?? '-' }}</p>
        </div>
        <div>
            <label class="text-gray-600">Email:</label>
            <p class="font-medium">{{ $user->email }}</p>
        </div>
        <div>
            <label class="text-gray-600">Bio:</label>
            <p class="font-medium">{{ $user->bio ?? '-' }}</p>
        </div>
    </div>

    <div class="text-right">
        <a href="{{ route('profile.edit') }}" class="text-white bg-teal-500 px-4 py-2 rounded hover:bg-teal-600">Edit Profile</a>
    </div>
</div>
@endsection
