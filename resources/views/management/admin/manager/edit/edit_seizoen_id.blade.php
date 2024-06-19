@extends('template.template')
@section('content')

@role('contentmanager')
    @foreach($seizoen as $seizoens)
    <form class="max-w-sm mx-auto" method="POST" action="{{url('dashboard/manage_content/editSeizoenBySerieId/'.$seizoens->serie_id)}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="seizoen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seizoen id</label>
            <input type="text" id="seizoen_id" name="seizoen_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$seizoens->seizoen_id}}" />
        </div>
        <div class="mb-5">
            <label for="serie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie id</label>
            <input type="text" id="serie_id" name="serie_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$seizoens->serie_id}}" />
        </div>
        <div class="mb-5">
            <label for="rang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rang</label>
            <input type="text" id="rang" name="rang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$seizoens->rang}}" />
        </div>
        <div class="mb-5">
            <label for="jaar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jaar</label>
            <input type="text" id="jaar" name="jaar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$seizoens->jaar}}" />
        </div>
        <div class="mb-5">
            <label for="IMDBRating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IMBDRating</label>
            <input type="text" id="IMDBRating" name="IMDBRating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$seizoens->IMDBRating}}" />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    @endforeach
@endrole

@stop
