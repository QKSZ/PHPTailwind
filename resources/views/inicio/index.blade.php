@extends ('layouts.app')



@section('navegacion')
@if (auth::user() == true)
@include('ui.adminnav')
@endif


@endsection
@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-3xl text-gray-700 font-bold">
                Ulatina <span class="font-bold text-green-500">TCU</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">
                Envia tu ante-proyecto de TCU a revisión
                <span class="text-green-500 block">Debes tener completado al menos el 50% de tu carrera</span>
            </h1>
        </div>
        <div class="block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('img/4321.jpg')}}" alt="ulatina">
        </div>
    </div>
@endsection

