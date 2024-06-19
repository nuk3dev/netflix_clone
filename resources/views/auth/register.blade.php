<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-8 bg-gray-900 rounded-lg shadow-lg">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/HOBO_logo.png') }}" alt="Logo" class="h-12">
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Voornaam -->
            <div>
                <label for="voornaam" class="block text-sm font-medium">Voornaam</label>
                <input id="voornaam" type="text" name="voornaam" :value="old('voornaam')" required autofocus autocomplete="voornaam"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('voornaam')" class="mt-2" />
            </div>

            <!-- Tussenvoegsel -->
            <div>
                <label for="tussenvoegsel" class="block text-sm font-medium">Tussenvoegsel</label>
                <input id="tussenvoegsel" type="text" name="tussenvoegsel" :value="old('tussenvoegsel')" autocomplete="tussenvoegsel"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('tussenvoegsel')" class="mt-2" />
            </div>

            <!-- Achternaam -->
            <div>
                <label for="achternaam" class="block text-sm font-medium">Achternaam</label>
                <input id="achternaam" type="text" name="achternaam" :value="old('achternaam')" required autocomplete="achternaam"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('achternaam')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="genre_id" class="block font-bold">Genre</label>
                <select class="bg-gray-800 text-white p-2 rounded-lg" name="genre_id">
                    <option value="">Select genre</option>
                    @foreach ($genre as $genres)
                        <option value="{{ $genres->genre_id }}" {{ $genres->genre_id == old('genre_id') ? 'selected' : '' }}>
                            {{ $genres->genre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('genre_id')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register Button -->
            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">
                    Already registered?
                </a>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                    Register
                </button>
            </div>
        </form>
    </div>

    <!-- Include app.js for any JavaScript functionality -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
