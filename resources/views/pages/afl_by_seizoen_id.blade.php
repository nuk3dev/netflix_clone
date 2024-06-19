@extends('template.template')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul class="flex">
                <li><a href="{{ url('/') }}" class="text-[#92d051]">Home</a></li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li><a href="{{ url('/serie/'.$serie->serie_id) }}" class="text-[#92d051]">{{ $serie->serie_titel }}</a></li>
                @if($afl->isNotEmpty())
                    <li><span class="mx-2 text-gray-400">/</span></li>
                    <li class="is-active"><a href="{{ url('/aflBySeizoenId/'.$afl->first()->seizoen_id.'/'.$serie->serie_id) }}" aria-current="page" class="text-white">Season {{ $afl->first()->seizoen_id }}</a></li>
                @else
                    <li><span class="mx-2 text-gray-400">/</span></li>
                    <li class="is-active"><a href="#" aria-current="page" class="text-white">No seasons found</a></li>
                @endif
            </ul>
        </nav>
        <p class="font-bold text-3xl mb-6 text-center text-[#92d051] py-5">{{ $serie->serie_titel }}</p>
        @if ($afl->isNotEmpty())
        <p class="font-bold text-xl mb-4 text-center">Season {{ $afl->first()->seizoen_id }}</p>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($afl as $afls)
            <a class="block bg-black rounded-lg shadow-md p-6 border border-[#5b9bd5] hover:border-transparent hover:bg-[#5b9bd5] hover:text-black transition duration-300 ease-in-out"
                href="{{ url('videoByAflSeizoen_id/'.$afls->aflevering_id.'/'.$afls->seizoen_id)}}">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <p class="text-lg font-bold">{{ $afls->aflevering_titel }}</p>
                    <p class="text-md">Duration: {{ $afls->duur }} minutes</p>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            <x-pagination :paginator="$afl" />
        </div>
    </div>
</div>
@stop
