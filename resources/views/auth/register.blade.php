<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-6">Hi, Friend!</h2>
            <p class="text-center text-gray-500 mb-6">No account yet? Sign up to get started!</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" name="name" type="text" required autofocus
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1"
                        value="{{ old('name') }}">
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" required
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1"
                        value="{{ old('username') }}">
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input id="phone_number" name="phone_number" type="text"
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1"
                        value="{{ old('phone_number') }}">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1"
                        value="{{ old('email') }}">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1">
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1">
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-xl hover:bg-blue-700 transition">
                        Sign Up
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sign In</a>
            </p>
        </div>
    </div>
</x-guest-layout>
