@extends('template.template')
@section('content')
@role('admin')
<div class="py-6 sm:px-6 lg:px-8 fle">
<div class="p-4">
    <p class="text-xl font-medium ">Klanten beheren</p>
    <p>Klik hier om klanten te beheren</p>
    <button>
        <a href="{{ url('dashboard/manage_klanten') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Klanten beheren</a>
    </button>
</div>
@endrole
@role('admin')
<div class="p-4">
    <p class="text-xl font-medium">Content beheren</p>
    <p class>Klik hier om content beheren</p>
    <button>
        <a href="{{ url('dashboard/manage_content') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-2">Content beheren</a>
    </button>
    </div>
</div>
@endrole
@stop

