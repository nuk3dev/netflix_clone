@extends('template.template')
@section('content')

@role('contentmanager')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
<p class="flex justify-center p-4 font-bold text-xl text-[#92d051] border-b border-[#92d051]">Manage Content</p>
<p class="flex justify-center p-4 text-xl">Manage all your content here, from series, seasons in series, and episodes.</p>

    
    <div class="flex justify-between items-center px-6 py-4">
    <button class="text-white bg-transparent hover:bg-[#92d051] dark:hover:bg-transparent dark:bg-black focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 border border-[#92d051] dark:border-[#92d051] dark:text-[#5b9bd5] dark:bg-transparent focus:outline-none dark:focus:ring-blue-800">
    <a href="{{ url('dashboard/manage_content/createSerieView') }}" class="text-[#92d051]">Create New Series</a>
</button>


<form method="GET" action="{{ url('dashboard/manage_content') }}" class="flex justify-end">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="px-4 py-2 border border-[#92d051] rounded-l-lg text-gray-700 dark:border-[#92d051] dark:bg-black dark:text-gray-300">
    <button type="submit" class="px-4 py-2 bg-transparent text-white rounded-r-lg hover:bg-transparent border border-[#92d051] dark:border-[#92d051] dark:text-[#92d051] dark:bg-black dark:hover:bg-transparent">Search</button>
</form>




    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-[#92d051] uppercase bg-gray-900 ">
        <tr>
            <th scope="col" class="px-6 py-3">Serie ID</th>
            <th scope="col" class="px-6 py-3">Serie Titel</th>
            <th scope="col" class="px-6 py-3">Image Naam</th>
            <th scope="col" class="px-6 py-3">IMDB Link</th>
            <th scope="col" class="px-6 py-3">Genre</th>
            <th scope="col" class="px-6 py-3">Actief</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
    </thead>

    <tbody class="text-[#5b9bd5] bg-black">
    @foreach ($serie as $series)
    <tr class="odd:bg-black  border-b border-gray-700">
        <td class="px-6 py-4">{{ $series->id }}</td>
        <td class="px-6 py-4">{{ $series->serie_titel }}</td>
        <td class="px-6 py-4">
            <img src="{{ asset('images/' . $series->image_name) }}" class="h-24">
        </td>
        <td class="px-6 py-4">{{ $series->IMDB_Link }}</td>
        <td class="px-6 py-4">{{ $series->genre_id }}</td>
        <td class="px-6 py-4">{{ $series->actief }}</td>
        <td class="px-6 py-4">
            <div class="flex flex-col">
                <a href="{{ url('dashboard/manage_content/showEditSerie/'.$series->serie_id)}}" class="font-medium text-[#5b9bd5] hover:underline p-2">Edit Serie</a>
                <a href="{{ url('dashboard/manage_content/getAllseizoenBySerieId/'.$series->serie_id)}}" class="font-medium text-[#5b9bd5] hover:underline p-2">Edit Seizoen</a>
                <a href="{{ url('dashboard/manage_content/deleteSerieById/' . $series->serie_id)}}" class="font-medium text-red-500 hover:underline p-2">Delete Serie</a>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>
    <div class="px-3 py-10">
        @include('components.pagination', ['paginator' => $serie, 'param' => 'genre_id'])
    </div>
@endrole
@stop
