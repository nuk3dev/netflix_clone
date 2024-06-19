@extends('template.template')

@section('content')
@if (Auth::check())
<div class="container mx-auto flex justify-center py-8">
    <div class="w-full md:w-3/4 lg:w-1/2">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul class="flex">
            <li><a href="{{ url('/') }}" class="text-[#92d051] hover:underline">Home</a></li>
            <li><span class="mx-2 text-gray-400">/</span></li>
            <li><a href="{{ url('/series') }}" class="text-[#92d051] hover:underline">Series</a></li>
            <li><span class="mx-2 text-gray-400">/</span></li>
            <li><a href="{{ url('/serie/'.$serie->serie_id) }}" class="text-[#92d051] hover:underline">{{ $serie->serie_titel }}</a></li>
            <li><span class="mx-2 text-gray-400">/</span></li>
            <li class="is-active"><a href="#" aria-current="page" class="text-white">Season {{ $seizoen[0]->seizoen_id }}</a></li>
        </ul>
    </nav>
        <p class="font-bold text-3xl mb-6 text-center text-[#92d051]">{{$serie->serie_titel}}</p>
        @foreach($seizoen as $seizoens)
        <a class="block bg-black rounded-lg shadow-md p-6 mb-6 border border-[#92d051] hover:border-transparent hover:bg-[#92d051] hover:text-black transition duration-300 ease-in-out" href="{{url('aflBySeizoenId/'.$seizoens->seizoen_id."/".$serie->serie_id)}}">
            <div class="flex items-center justify-center space-x-4">
                <p class="text-lg font-bold text-left">Seizoen: {{$seizoens->seizoen_id}}</p>
                <p class="text-lg font-bold text-left">Rang: {{$seizoens->rang}}</p>
                <p class="text-lg font-bold text-left">Release date: {{$seizoens->jaar}}</p>
                <p class="text-lg font-bold text-left">IMBD Rating: {{$seizoens->IMBDRating}}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif
@stop
