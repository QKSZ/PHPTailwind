@extends('layouts.app')
@section('navegacion')
@include('ui.adminnav')
@endsection
@section('content')
<h1 class="text-3xl text-center mt-10">{{$proyecto->titulo}}</h1>

<div class="mt-10 mb-20 md:flex items-start">
    <div class="md:w-3/5">
        <p class="block text-gray-700 font-bold my-2">
        Publicado: <span class="font-normal">{{$proyecto->created_at->diffForHumans()}}</span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
        Categoría: <span class="font-normal">{{$proyecto->categoria->nombre}}</span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Ubicación: <span class="font-normal">{{$proyecto->ubicacion->nombre}}</span>
        </p>



@if ($proyecto->proyectopdf != Null)
<a class="bg-blue-500 p-3 inline-block text-xs font-bold uppercase text-white" href="/storage/proyectopdf/{{$proyecto->proyectopdf}}">Archivos Adjuntos</a>
@endif
@if ($proyecto->imagen != Null)
<img src="/storage/proyectos/{{$proyecto->imagen}}" class="w-40 mt-10">
@endif

<h2 class="text-2xl text-center text-gray-700 mb-5">Descripción</h2>

    <div class="descripcion mt-10 mb-5">
    {!! $proyecto->descripcion !!}

    </div>

    </div>

    @include('ui.contacto')
</div>




@endsection
