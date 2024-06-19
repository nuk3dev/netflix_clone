@extends('template.template')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-4">
        @if(count($series))
            <p class="text-3xl mr-4">Results:</p>
            <p class="text-3xl font-bold">{{ $request->search }}</p>
        @else
            <p class="text-3xl">No results with: "{{ $request->search }}"</p>
        @endif
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <tbody class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4 font-bold text-xl">
                @foreach($series as $serie)
                    <tr>
                        <td class="relative">
                            <a href="@if(Auth::check())/serie/{{ $serie->serie_id }} @else /login @endif" class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                                
                                <p class="p-2 font-bold text-base hover:text-[#92d051] ">{{ $serie->serie_titel }}</p>
                                <img class="rounded-lg w-96 h-96" src="{{ asset('images/' . $serie->image_name) }}" alt="{{ $serie->serie_titel }}">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        @include('components.pagination', ['paginator' => $series, 'param' => $param])
    </div>
</div>
@stop
