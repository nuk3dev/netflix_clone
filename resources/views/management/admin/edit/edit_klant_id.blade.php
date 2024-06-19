@extends('template.template')

@section('content')

@role('admin')
<div class="max-w-3xl mx-auto bg-gray-800 shadow-md rounded-lg px-8 py-6 mb-4">
    @foreach($users as $user)
    <form method="POST" action="{{ url('dashboard/manage_klanten/editKlantById/'.$user->id) }}">
        @csrf
        <div class="mb-4">
            <label for="klant_id" class="block text-sm font-medium text-gray-300 mb-1">Klant ID</label>
            <input type="text" id="klant_id" name="klant_id" value="{{ $user->klant_id }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="abo_id" class="block text-sm font-medium text-gray-300 mb-1">Abo ID</label>
            <input type="text" id="abo_id" name="abo_id" value="{{ $user->abo_id }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="voornaam" class="block text-sm font-medium text-gray-300 mb-1">Voornaam</label>
            <input type="text" id="voornaam" name="voornaam" value="{{ $user->voornaam }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="tussenvoegsel" class="block text-sm font-medium text-gray-300 mb-1">Tussenvoegsel</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" value="{{ $user->tussenvoegsel }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="achternaam" class="block text-sm font-medium text-gray-300 mb-1">Achternaam</label>
            <input type="text" id="achternaam" name="achternaam" value="{{ $user->achternaam }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="role_name" class="block text-sm font-medium text-gray-300 mb-1">Role Name</label>
            <input type="text" id="role_name" name="role_name" value="{{ $user->role_name }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
        </div>
        <div class="mb-4">
            <label for="genre_id" class="block text-sm font-bold text-gray-300 mb-1">Genre</label>
            <select name="genre_id" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-2 focus:ring-[#92d051] focus:border-[#92d051] block w-full p-2 dark:bg-gray-900 dark:border-gray-600 dark:text-white dark:focus:ring-[#92d051] dark:focus:border-[#92d051]">
                <option value="">Select genre</option>
                @foreach ($genre as $genres)
                <option value="{{ $genres->genre_id }}" {{ $genres->genre_id == old('genre_id', $user->genre_id) ? 'selected' : '' }}>
                    {{ $genres->genre }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-[#5b9bd5] text-white hover:bg-[#92d051] focus:ring-2 focus:ring-[#92d051] focus:outline-none rounded-lg text-sm w-full sm:w-auto px-5 py-2.5">Submit</button>
    </form>
    @endforeach
</div>
@endrole

@stop
