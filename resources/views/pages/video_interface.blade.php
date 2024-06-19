@extends('template.template')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul class="flex">
                <li><a href="{{ url('/') }}" class="text-[#92d051] hover:underline">Home</a></li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li><a href="{{ url('/serie/'.$serie[0]->serie_id) }}" class="text-[#92d051] hover:underline">{{ $serie[0]->serie_titel }}</a></li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li><a href="{{ url('/aflBySeizoenId/'.$seizoen[0]->seizoen_id.'/'.$serie[0]->serie_id) }}" class="text-[#92d051] hover:underline">Season {{ $seizoen[0]->seizoen_id }}</a></li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li class="is-active">{{ $video[0]->aflevering_titel }}</li>
            </ul>
        </nav>

        <h1 class="font-bold text-4xl text-white my-4">{{ $serie[0]->serie_titel }}</h1>
        <div class="flex justify-between text-lg text-gray-400 mb-4">
            <p>Season: {{ $seizoen[0]->seizoen_id }}</p>
            <p>{{ $video[0]->aflevering_titel }}</p>
        </div>

        <div class="flex justify-center mb-8">
            <video id="myVideo" width="640" height="360" class="rounded-lg shadow-lg" controls>
                <source src="{{ asset('video/videoplayback.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>
@stop
