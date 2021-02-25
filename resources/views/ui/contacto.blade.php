<aside class="md:w-2/5 bg-green-500 p-5 rounded m-3">
    <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Aplicar</h2>
<form enctype="multipart/form-data" action="{{route('candidatos.store')}}" method="POST">
    @csrf

        <div class="mb-4">
            <label for="anteproyecto" class="block text-white text-sm font-bold mb-4">
               Anteproyecto (PDF):
            </label>
            <input
                id="anteproyecto"
                type="file"
                class="p-3 rounded form-input w-full @error('anteproyecto') border border-red-500 @enderror  "
                name="anteproyecto"
                accept="application/pdf"
            />
            @error('anteproyecto')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                <p>{{$message}}</p>
                </div>
            @enderror
        </div>
    <input type="hidden" name="proyecto_id" value="{{$proyecto->id}}">
    <input type="hidden" name="user_id" value="{{Auth::user()->name}}">
    <input type="hidden" name= "user_email" value="{{Auth::user()->email}}">
    <input type="hidden" name= "carne" value="{{Auth::user()->carne}}">
    <input type="hidden" name= "apellido" value="{{Auth::user()->apellido}}">
    <input
        type="submit"
        class="bg-green-600 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase"
        value="Enviar"

    >
    </form>

</aside>
