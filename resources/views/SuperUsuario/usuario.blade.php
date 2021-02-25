<h1 class="text-2xl text-center mt-10">Crear un nuevo administrador</h1>





<form class="max-w-lg mx-auto my-10" action="{{route('register.administrador')}}" method="POST">

    @csrf




    <div class="mb-5">
        <label for="email" class="block text-gray-700 text-sm mb-2">Email</label>
        <select for="email" id="email" class="block appereance-none w-full border
                border-gray-200 text-gray-700
                rounded leading-tight focus:outline-none
                focus:border-gray-500 p-3 bg-gray-100" name="email">
            <option disabled selected>- Selecciona -</option>
            @foreach ((auth::user()->all('id','name','email')) as $usuario)
            @if(($usuario->email) != 'administrador')
    <option {{ old('email') == $usuario->id ? 'selected' : '' }} value="{{ $usuario }}">
                    {{ $usuario->email }}
                </option>
            @endif
            @endforeach
        </select>


    </div>


    <button type="submit"
        class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
        Agregar permisos
    </button>
</form>
