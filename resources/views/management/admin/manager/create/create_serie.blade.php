@extends('template.template')
@section('content')

@role('contentmanager')
    <form class="max-w-sm mx-auto" method="POST" action="{{url('dashboard/manage_content/createSerie')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="serie_titel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie titel</label>
            <input type="text" id="serie_titel" name="serie_titel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="IMDB_Link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IMBD link</label>
            <input type="text" id="IMDB_Link" name="IMDB_Link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
            <select id="genre_id" name="genre_id" class="bg-black text-white p-2 rounded-lg" style="border: 2px solid #92d051;" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->genre_id }}">{{ $genre->genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="actief" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actief</label>
            <input type="text" id="actief" name="actief" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endrole

@stop
