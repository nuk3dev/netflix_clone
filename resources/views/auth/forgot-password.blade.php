<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-8 bg-gray-900 rounded-lg shadow-lg">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/HOBO_logo.png') }}" alt="Logo" class="h-12">
        </div>

        <!-- Forgot Password Explanation -->
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Password Reset Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                    Email Password Reset Link
                </button>
            </div>
        </form>

        <!-- Back to Login Link -->
        <div class="mt-6 flex justify-center text-sm">
            <a href="{{ route('login') }}"
                class="text-blue-500 hover:text-blue-600 focus:outline-none focus:underline">Back to login</a>
        </div>
    </div>

    <!-- Include app.js for any JavaScript functionality -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
