<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-6">Welcome Back!</h2>
            <p class="text-center text-gray-500 mb-6">Returning user? Login to explore CookLab!</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1"
                        value="{{ old('email') }}">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="block w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm text-sm py-2 px-3 mt-1">
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-xl hover:bg-blue-700 transition">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                New to CookLab?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Create an account</a>
            </p>
        </div>
    </div>
</x-guest-layout>
