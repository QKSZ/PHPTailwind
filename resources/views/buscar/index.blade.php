@extends ('layouts.app')


@if (auth::user()->admin != 2)
@section('navegacion')


@include('ui.adminnav')

@endsection
@section('content')
    <div class="my-10 bg-gray-100 p-10 shadow">

        <h1 class="text-2xl text-gray-700 m-0">

            <span class="font-bold"> Proyectos Disponibles</span>

        </h1>
        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($proyectos as $proyecto)
                <li class="p-10 border border-gray-300 bg-white shadow" >
                   <h2 class="text-2xl font-bold text-green-700 "> {{$proyecto->titulo}}</h2>
                    <p class="block text-gray-700 font-normal my-2 ">
                        {{$proyecto->categoria->nombre}}
                    </p>
                    <p class="block text-gray-700 font-normal my-2 ">
                       Ubicación:
                        <span class="font-bold"> {{$proyecto->ubicacion->nombre}} </span>
                    </p>
                <a
                class="bg-green-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm "
                href="{{route('proyectos.show',['proyecto'=> $proyecto->id])}}">
                Ver proyecto
                </a>
                </li>

            @endforeach


        </ul>
        {{$proyectos->links()}}

    </div>
@endsection
@endif
@section('content')
@include('SuperUsuario.usuario')
@endsection
