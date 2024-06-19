@extends('template.template')

@section('content')
<div class="max-w-3xl mx-auto shadow-md rounded-lg p-6 mb-4">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul class="flex">
            <li><a href="{{ url('/profile') }}" class="text-92d051">Profile</a></li>
            <li><span class="mx-2 text-gray-400">/</span></li>
            <li class="is-active"><a href="#" aria-current="page" class="text-white">User History</a></li>
        </ul>
    </nav>
    <p class="font-bold text-3xl text-center text-[#92d051] mb-4">User History</p>
    <p class="font-bold text-2xl text-center text-gray-300 mb-4">See all the series you've watched!</p>
    <div class="overflow-x-auto">
        <table class="w-full text-sm rtl:text-right bg-gray-800 text-white rounded-lg">
            <thead>
                <tr class="bg-black">
                    <th scope="col" class="px-6 py-3 text-left">Serie Title</th>
                    <th scope="col" class="px-6 py-3 text-left">Season ID</th>
                    <th scope="col" class="px-6 py-3 text-left">Episode Title</th>
                    <th scope="col" class="px-6 py-3 text-left">Date Watched</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $history)
                <tr class="bg-gray-900">
                    <td class="px-6 py-4">{{ $history['serie'] }}</td>
                    <td class="px-6 py-4">{{ $history['seizoen'] }}</td>
                    <td class="px-6 py-4">{{ $history['aflevering'] }}</td>
                    <td class="px-6 py-4">{{ $history['date']->format('jS F \a\t g:i A') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        @include('components.pagination', ['paginator' => $user_history, 'param' => 'user_id'])
    </div>
</div>
@stop
