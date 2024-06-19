<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-8 bg-gray-900 rounded-lg shadow-lg">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/HOBO_logo.png') }}" alt="Logo" class="h-12">
        </div>

        <!-- Session Status -->
        @if (session('status'))
        <div class="mb-4 text-sm text-green-400">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                @error('email')
                <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                @error('password')
                <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded text-blue-500 shadow-sm focus:ring-1 focus:ring-blue-500">
                    <span class="ml-2 text-sm">Remember me</span>
                </label>

                <!-- Login Button -->
                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                    Log in
                </button>
            </div>

            <!-- Register and Forgot Password Links -->
            <div class="mt-6 flex justify-between text-sm">
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-600">No account? Register</a>
                <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-600">Forgot your
                    password?</a>
            </div>
        </form>
    </div>

    <!-- Include app.js for any JavaScript functionality -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
