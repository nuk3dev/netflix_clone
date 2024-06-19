@extends('template.template')
@section('content')

@role('contentmanager')
    <form class="max-w-sm mx-auto" method="POST" action="{{url('dashboard/manage_content/editSerieById/'.$serie->serie_id)}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="serie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie ID</label>
            <input type="text" id="serie_id" name="serie_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$serie->serie_id}}" readonly />
        </div>
        <div class="mb-5">
            <label for="serie_titel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie titel</label>
            <input type="text" id="serie_titel" name="serie_titel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$serie->serie_titel}}" />
        </div>
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image name</label>
            <p class="p-4">{{$serie->image_name}}</p>
            <img class="h-24" src="{{asset('images/'.$serie->image_name)}}">
            <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
        </div>
        <div class="mb-5">
            <label for="IMBD_Link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IMBD link</label>
            <input type="text" id="IMBD_Link" name="IMBD_Link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$serie->IMDB_Link}}" />
        </div>
        <div class="mb-5">
            <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
            <select class="bg-black text-white p-2 rounded-lg" name="genre_id" style="border: 2px solid #92d051;">
                @if ($serie_genre)
                    <option value="{{ $serie_genre->genre_id }}">{{ $serie_genre->genre }}</option>
                @endif
                @foreach ($genres as $genre)
                    <option value="{{ $genre->genre_id }}" {{ $genre->genre_id == $serie_genre_id ? 'selected' : '' }}>
                        {{ $genre->genre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="actief" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actief</label>
            <input type="text" id="actief" name="actief" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$serie->actief}}" />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endrole

@stop
