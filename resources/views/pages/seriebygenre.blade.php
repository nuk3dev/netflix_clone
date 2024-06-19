@extends('template.template')

@section('content')
<div class="relative overflow-x-auto">
    <div class="p-4">
        <p class="font-bold text-2xl mb-4">{{$genre[0]['genre']}}</p>
        <div class="grid grid-cols-3 gap-4">
            @foreach($serie as $series)
            <div class="border border-[#92d051] rounded-lg overflow-hidden shadow-lg">
                <a href="@if(Auth::check())/serie/{{$series->serie_id}} @else /login @endif" class="block">
                    <img class="rounded-t-lg object-cover h-64 w-full" src="{{asset('images/'.$series->image_name)}}" alt="{{$series->serie_titel}}">
                    <div class="p-4">
                        <p class="font-bold text-xl hover:text-[#92d051]">{{$series->serie_titel}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="pb-4">
        @include('components.pagination', ['paginator' => $serie, 'param' => $param])
    </div>
</div>
@stop
