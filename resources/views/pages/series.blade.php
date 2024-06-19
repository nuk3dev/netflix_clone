@extends('template.template')
@section('content')
<div class="container mx-auto px-4 lg:px-8 py-5">
    @if(Auth::check() && $allSeries['most_recent_watched_series']->total() > 0)
    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Most recently watched</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['most_recent_watched_series'] as $most_recent_watched_series)
                <a href="{{ Auth::check() ? '/serie/'.$most_recent_watched_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$most_recent_watched_series->image_name) }}"
                        alt="{{ $most_recent_watched_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $most_recent_watched_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['most_recent_watched_series'], 'param' => 'most_recent_watched_series_page'])
    </div>
    @endif

    @if(Auth::check() && $allSeries['user_favorite_genre']->total() > 0)
        <div class="p-4">
            <p class="font-bold text-md text-2xl py-5">Your favorite genre</p>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($allSeries['user_favorite_genre'] as $user_favorite_genre)
                    <a href="{{ Auth::check() ? '/serie/'.$user_favorite_genre->serie_id : '/login' }}"
                        class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                        <img class="object-cover w-full h-full" src="{{ asset('images/'.$user_favorite_genre->image_name) }}"
                            alt="{{ $user_favorite_genre->serie_titel }}">
                        <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                            {{ $user_favorite_genre->serie_titel }}
                        </p>
                    </a>
                @endforeach
            </div>
            @include('components.pagination', ['paginator' => $allSeries['user_favorite_genre'], 'param' => 'user_favorite_genre_page'])
        </div>
    @endif

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Popular series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['popular_series'] as $popular_serie)
                <a href="{{ Auth::check() ? '/serie/'.$popular_serie->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$popular_serie->image_name) }}"
                        alt="{{ $popular_serie->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $popular_serie->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['popular_series'], 'param' => 'popular_series_page'])
    </div>

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Science series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['science_series'] as $science_series)
                <a href="{{ Auth::check() ? '/serie/'.$science_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$science_series->image_name) }}"
                        alt="{{ $science_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $science_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['science_series'], 'param' => 'science_series_page'])
    </div>

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Horror series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['horror_series'] as $horror_series)
                <a href="{{ Auth::check() ? '/serie/'.$horror_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$horror_series->image_name) }}"
                        alt="{{ $horror_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $horror_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['horror_series'], 'param' => 'horror_series_page'])
    </div>

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">History series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['history_series'] as $history_series)
                <a href="{{ Auth::check() ? '/serie/'.$history_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$history_series->image_name) }}"
                        alt="{{ $history_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $history_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['history_series'], 'param' => 'history_series_page'])
    </div>

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Crime series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['crime_series'] as $crime_series)
                <a href="{{ Auth::check() ? '/serie/'.$crime_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$crime_series->image_name) }}"
                        alt="{{ $crime_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $crime_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['crime_series'], 'param' => 'crime_series_page'])
    </div>

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Drama series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['drama_series'] as $drama_series)
                <a href="{{ Auth::check() ? '/serie/'.$drama_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$drama_series->image_name) }}"
                        alt="{{ $drama_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $drama_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['drama_series'], 'param' => 'drama_series_page'])
    </div>

    <div class="p-4">
        <p class="font-bold text-md text-2xl py-5">Fantasy series</p>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($allSeries['fantasy_series'] as $fantasy_series)
                <a href="{{ Auth::check() ? '/serie/'.$fantasy_series->serie_id : '/login' }}"
                    class="relative flex flex-col items-center overflow-hidden rounded-lg shadow-md group max-w-70 h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('images/'.$fantasy_series->image_name) }}"
                        alt="{{ $fantasy_series->serie_titel }}">
                    <p class="absolute inset-x-0 bottom-0 p-2 text-center font-bold text-lg text-white bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
                        {{ $fantasy_series->serie_titel }}
                    </p>
                </a>
            @endforeach
        </div>
        @include('components.pagination', ['paginator' => $allSeries['fantasy_series'], 'param' => 'fantasy_series_page'])
    </div>
</div>
@stop
