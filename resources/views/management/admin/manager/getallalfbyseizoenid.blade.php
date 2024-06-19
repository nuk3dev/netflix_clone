@extends('template.template')
@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full m-4"><a href="{{url('dashboard/manage_content/')}}">go back?</a></button>
<button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg
    text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
    focus:outline-none dark:focus:ring-blue-800"><a href="{{url('dashboard/manage_content/createAflView/'.$id)}}">create new aflevering</a></button>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Aflevering id</th>
                <th scope="col" class="px-6 py-3">Seizoen id</th>
                <th scope="col" class="px-6 py-3">Rang</th>
                <th scope="col" class="px-6 py-3">Aflevering titel</th>
                <th scope="col" class="px-6 py-3">Duur</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alf as $alfs)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $alfs->aflevering_id }}</td>
                <td class="px-6 py-4">{{$alfs->seizoen_id }}</td>
                <td class="px-6 py-4">{{ $alfs->rang }}</td>
                <td class="px-6 py-4">{{ $alfs->aflevering_titel }}</td>
                <td class="px-6 py-4">{{ $alfs->duur }}</td>
                <td class="px-6 py-4">
                    <div class="flex flex-col">
                    <a href="{{ url('dashboard/manage_content/showAflBySeizoenId/' . $alfs->aflevering_id."/".$alfs->seizoen_id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Edit Aflevering</a>
                    <a href="{{ url('dashboard/manage_content/deleteAflBySeizoenId/' . $alfs->aflevering_id."/".$alfs->seizoen_id)}}" class="font-medium text-blue-600 dark:text-red-500 hover:underline p-2">Delete Aflevering</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-4">
    @include('components.pagination', ['paginator' => $alf, 'param' => 'aflevering_id'])
    </div>
</div>

@stop
