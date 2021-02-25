
<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('/') ? 'bg-green-500' : ''}}"  href="{{ url('/') }}">Inicio</a>

@if (Auth::user()->admin != 0)
<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('proyectos') ? 'bg-green-500' : ''}}"  href="{{ route ('proyectos.index') }}">Ver proyectos</a>
<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('proyectos/create') ? 'bg-green-500' : ''}}" href="{{ route ('proyectos.create') }}">Nuevo Proyecto</a>
@endif
<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('tcu/buscar') ? 'bg-green-500' : ''}}"  href="{{ route ('proyectos.buscar') }}">Proyectos Disponibles</a>
