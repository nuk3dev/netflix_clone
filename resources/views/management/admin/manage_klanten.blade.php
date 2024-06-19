@extends('template.template')

@section('content')
<div class=" shadow-md rounded-lg p-6 mb-4">
    <p class="font-bold text-3xl text-center text-[#92d051] mb-4">Manage klanten</p>
    <p class="font-bold text-2xl text-center text-[#92d051] mb-4">Manage all the klanten here, edit or delete them.</p>
    <div class="overflow-x-auto">
        <table class="w-full text-sm rtl:text-right">
            <thead>
                <tr class="bg-black text-[#92d051]">
                    <th scope="col" class="px-6 py-3">Klant ID</th>
                    <th scope="col" class="px-6 py-3">Abo ID</th>
                    <th scope="col" class="px-6 py-3">Voornaam</th>
                    <th scope="col" class="px-6 py-3">Tussenvoegsel</th>
                    <th scope="col" class="px-6 py-3">Achternaam</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Genre</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $user->klant_id }}</td>
                <td class="px-6 py-4">{{ $user->abo_id }}</td>
                <td class="px-6 py-4">{{ $user->voornaam }}</td>
                <td class="px-6 py-4">{{ $user->tussenvoegsel }}</td>
                <td class="px-6 py-4">{{ $user->achternaam }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">{{ $user->genre_id }}</td>
                <td class="px-6 py-4">
                    <a href="{{ url('dashboard/manage_klanten/showKlantById/' . $user->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Edit</a>
                    <a href="{{ url('dashboard/manage_klanten/deleteKlantById/' . $user->id)}}" class="font-medium text-blue-600 dark:text-red-500 hover:underline p-2">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        @include('components.pagination', ['paginator' => $users, 'param' => 'genre_id'])
    </div>
</div>
@stop
