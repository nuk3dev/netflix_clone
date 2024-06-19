@extends('template.template')
@section('content')
@role('admin')
<div class="container flex justify-center">
<div class=" p-4">
<div class="p-4 bg-indigo-600 h-28  m-4 rounded">
    <p class="text-xl font-medium ">Klanten beheren</p>
    <p>Klik hier om klanten te beheren</p>
    <button>
        <a href="{{ url('dashboard/manage_klanten') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Klanten beheren</a>
    </button>
</div>
@endrole
@role('contentmanager')
<div class="p-4 bg-indigo-600 h-28 m-4 rounded">
    <p class="text-xl font-medium">Content beheren</p>
    <p class>Klik hier om content beheren</p>
    <button>
        <a href="{{ url('dashboard/manage_content') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Content beheren</a>
    </button>
    </div>
@endrole
<div class="p-4 bg-[#5b9bd5] h-28 m-4 rounded">
    <p class="text-xl text- font-medium">Mijn geschiedenis</p>
    <p class>Klik hier om uw geschiedenis te bekijken.</p>
    <button>
        <a href="{{ url('user_history/') }}" class="font-medium text-white-600  hover:underline p-2">Geschiedenis Bekijken</a>
    </button>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="border: 2px solid #92d051; padding: 10px;">
        <div class="p-4 sm:p-8 bg-white dark:bg-black shadow sm:rounded-lg">
            <div class="max-w-xl">
                <p class="block font-bold text-2xl p-2" style="color: #92d051;">Set your favorite genre</p>
                <p class="block p-2 text-xl text-white">This genre will be above all series</p>
                <form action="{{ route('update.genre') }}" method="POST">
                    @csrf
                    <label for="genre_id" class="block font-bold text-white">Genre</label>
                    <select class="bg-black text-white p-2 rounded-lg" name="genre_id" onchange="this.form.submit()" style="border: 2px solid #92d051;">
                    @if ($user_genre)
                <option value="{{$user_genre->genre_id}}">{{$user_genre->genre}}</option>
                    @endif
                    @foreach ($genres as $genre)
                <option value="{{ $genre->genre_id }}" {{ $genre->genre_id == $user_genre_id ? 'selected' : '' }}>
                    {{ $genre->genre }}
                </option>
                @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>




<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-black shadow sm:rounded-lg" style="border: 2px solid #92d051;">
            <div class="max-w-xl">
                @include('components.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-black shadow sm:rounded-lg" style="border: 2px solid #92d051;">
            <div class="max-w-xl">
                @include('components.update-password-form')
            </div>
        </div>
    </div>
</div>
@stop




