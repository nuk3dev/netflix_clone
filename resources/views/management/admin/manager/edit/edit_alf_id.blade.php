@extends('template.template')
@section('content')

@role('contentmanager')
    @foreach($aflevering as $afleverings)
    <form class="max-w-sm mx-auto" method="POST" action="{{url('dashboard/manage_content/editAflBySeizoenId/'.$afleverings->seizoen_id)}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="aflevering_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aflevering id</label>
            <input type="text" id="aflevering_id" name="aflevering_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$afleverings->aflevering_id}}" />
        </div>
        <div class="mb-5">
            <label for="seizoen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seizoen id</label>
            <input type="text" id="seizoen_id" name="seizoen_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$afleverings->seizoen_id}}" />
        </div>
        <div class="mb-5">
            <label for="rang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rang</label>
            <input type="text" id="rang" name="rang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$afleverings->rang}}" />
        </div>
        <div class="mb-5">
            <label for="aflevering_titel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aflevering titel</label>
            <input type="text" id="aflevering_titel" name="aflevering_titel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$afleverings->aflevering_titel}}" />
        </div>
        <div class="mb-5">
            <label for="duur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duur</label>
            <input type="text" id="duur" name="duur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$afleverings->duur}}" />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    @endforeach
@endrole

@stop
