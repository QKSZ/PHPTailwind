@extends ('layouts.app')
@section('navegacion')


@include('ui.adminnav')

@endsection
@section('content')




<h1 class="text-2xl text-center mt-5">Candidatos: {{$proyecto->titulo}}</h1>

{{-- <div class="container mx-auto text-center">
    <button type="submit"
        class="bg-gray-500 w-3/12 mt-5 hover:bg-gray-700 rounded text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
        Limpiar todas las solicitudes
    </button>



</div> --}}

{{-- @if ( count($proyecto->candidatos)>0) --}}


@if ( ($proyecto->candidatos->where('estado','=','0')->count()) > 0)
<ul class="max-w-md mx-auto mt-10">

    @foreach ($proyecto->candidatos as $candidato)
    @if ($candidato->estado == 0)

    <li class="p-5 border border-gray-400 mb-5">
        <p class="mb-4">Nombre:
        <span class="font-bold">{{$candidato->nombre}} {{$candidato->apellido}}</span>

        </p>

        <p class="mb-4">Carné:
            <span class="font-bold">{{$candidato->carne}}</span>

        </p>

        <p class="mb-4">Email:
            <span class="font-bold">{{$candidato->email}}</span>

        </p>
    <a class="bg-blue-500 p-3 inline-block text-xs font-bold uppercase text-white" href="/storage/anteproyecto/{{$candidato->anteproyecto}}">Ver Archivos</a>

    {{-- @if($candidato->estado != 1) --}}

    <aprobar-candidato
    candidato-id="{{$candidato->id}}"
    candidato-email="{{$candidato->email}}"
    candidato-ubicacion="{{$proyecto->ubicacion->email}}"

    ></aprobar-candidato>

    <rechazar-candidato candidato-id="{{$candidato->id}}" candidato-email="{{$candidato->email}}">
    </rechazar-candidato>
    {{-- @else
    <a class="bg-green-500 p-3 inline-block text-xs font-bold uppercase text-white" > Ya se encuentra aprobado</a>
    <eliminar-candidato
    candidato-id="{{$candidato->id}}"
    ></eliminar-candidato>
    @endif --}}

    </li>



    @endif
    @endforeach




</ul>

@else
    <p class="text-center mt-5">No hay candidatos</p>

@endif





@endsection
