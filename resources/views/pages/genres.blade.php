@extends('template.template')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-3xl mx-auto p-6 rounded-lg shadow-lg">
        <div class="p-4 text-center">
            <p class="font-bold text-4xl mb-6 text-[#92d051]">Genres</p>
            <p class="text-lg text-white mb-8">Here you can find all series by genres!</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($genres as $genre)
                <a href="{{ url('/serieByGenre/'.$genre->genre_id) }}" class="flex items-center justify-center bg-black rounded-lg shadow-md hover:bg-[#92d051] hover:text-black transition duration-300 transform hover:scale-105">
                    <p class="text-lg font-bold p-4 text-white">{{ $genre->genre }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
