@extends ('layouts.app')
@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection
@section('navegacion')
@include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nuevo Proyecto</h1>

<form enctype="multipart/form-data" class="max-w-lg mx-auto my-10" action="{{route('proyectos.store')}}" method="POST">

    @csrf


<div class="mb-5">
    <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo</label>
<input id="titulo" type="text" class="p-3 bg-gray-100 form-input w-full @error('password') is-invalid @enderror" name="titulo" placeholder="Titulo del Proyecto" value="{{old('titulo')}}">
    @error('titulo')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">

         <strong class="font-bold">Error!</strong>
         <span class="block">{{$message}}</span>
        </div>

        @enderror

</div>
<div class="mb-5">
<label for="categoria" class="block text-gray-700 text-sm mb-2">Tipo</label>
<select for="categoria" id="categoria" class="block appereance-none w-full border
border-gray-200 text-gray-700
rounded leading-tight focus:outline-none
focus:border-gray-500 p-3 bg-gray-100" name="categoria">
<option disabled selected>- Selecciona -</option>
@foreach($categorias as $categoria)
<option

  {{old('categoria')== $categoria->id ? 'selected' : ''}}
  value="{{ $categoria->id }}">
  {{$categoria->nombre}}
</option>
@endforeach
</select>
@error('categoria')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">

         <strong class="font-bold">Error!</strong>
         <span class="block">{{$message}}</span>
        </div>

        @enderror

<label for="ubicacion" class="mt-5 block text-gray-700 text-sm mb-2">Ubicación</label>
<select for="ubicacion" id="ubicacion" class="block appereance-none w-full border
border-gray-200 text-gray-700
rounded leading-tight focus:outline-none
focus:border-gray-500 p-3 bg-gray-100" name="ubicacion">
<option disabled selected>- Selecciona -</option>
@foreach($ubicaciones as $ubicacion)
<option
  {{old('ubicacion')== $ubicacion->id ? 'selected' : ''}}
  value="{{ $ubicacion->id }}">
  {{$ubicacion->nombre}}
</option>
@endforeach
</select>
@error('ubicacion')
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">

 <strong class="font-bold">Error!</strong>
 <span class="block">{{$message}}</span>
</div>

@enderror

</div>
<div class="mb-5">
  <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripción del Proyecto</label>
<div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 ">
</div>
  <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
  @error('descripcion')
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">

 <strong class="font-bold">Error!</strong>
 <span class="block">{{$message}}</span>
</div>

@enderror


</div>
<div class="mb-4">
    <label for="proyectopdf" class="block text-gray-700 text-sm font-bold mb-4">
       Subir archivo (opcional) :
    </label>
    <input
        id="proyectopdf"
        type="file"
        class="p-3 rounded form-input w-full @error('proyectopdf') border border-red-500 @enderror  "
        name="proyectopdf"
        {{-- accept="application/pdf" --}}
    />
    @error('proyectopdf')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
        <p>{{$message}}</p>
        </div>
    @enderror
</div>


<div class="mb-5">
  <label for="descripcion" class="block text-gray-700 text-sm mb-2">Imagen Opcional</label>
<div id="dropzoneUlatina" class="dropzone rounded bg-gray-100 ">
</div>
<input type="hidden" name="imagen" id="imagen" value="{{old('imagen')}}">

  <p id="error"></p>


</div>




<button type="submit" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
Publicar Proyecto
</button>
    </form>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
<script>
  Dropzone.autoDiscover = false;
  document.addEventListener('DOMContentLoaded',()=>{

    //Editor de texto
  const editor = new MediumEditor ('.editable',{
    toolbar :{
      buttons: ['bold','italic','underline','quote','anchor','justifyLeft','justifyRight','justifyCenter','justifyFull','orderedlist','unorderedlist','h2','h3'],
    static: true,
    sticky: true
    },
    placeholder:{
      text: 'Informacion del Proyecto'
    }
  });
  //agregar al inputhidden lo escrito en el editor

  editor.setContent( document.querySelector('#descripcion').value);

  //llena el editor con contenido



  //.
  editor.subscribe('editableInput', function(eventObj, editable){
    const contenido = editor.getContent();
    document.querySelector('#descripcion').value = contenido;
  })
  //Dropezone
  const dropzoneUlatina = new Dropzone('#dropzoneUlatina',{
    url:"/proyectos/imagen",
    dictDefaultMessage: 'Sube aquí tu archivo',
    //acceptedFiles: ".png,.jpg,.jpeg,.bmp,.pdf,",
    maxFiles: 1,
    addRemoveLinks: true,
    dictRemoveFile:'Borrar Archivo',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
    },
    //validacion de imagen
    init: function(){
      if (document.querySelector('#imagen').value.trim()){
        //console.log('si hay')
        let imagenPublicada = {};
        imagenPublicada.size =1234;
        imagenPublicada.name = document.querySelector('#imagen').value;

        this.options.addedfile.call(this, imagenPublicada);
        this.options.thumbnail.call(this, imagenPublicada,`/storage/proyectos/${imagenPublicada.name}`);

        imagenPublicada.previewElement.classList.add('dz-sucess');
        imagenPublicada.previewElement.classList.add('dz-complete');

      }
    },




    success: function(file, response){
      //console.log(response);
      console.log(response.correcto);
      document.querySelector('#error').textContent= '';

      //coloca la respuesta del servidor en el input hidden
      document.querySelector('#imagen').value= response.correcto;

      //añadir al objeto de achivo el nombre sel servidor
      file.nombreSevidor = response.correcto;



    },

    maxfilesexceeded: function(file){
      if(this.files[1] != null ){
        this.removeFile(this.files[0]); //eliminar archivo anterior
        this.addFile(file);
      }


    },
    removedfile: function(file, response){
     //console.log('el archivo borrado fue',file) ;

     file.previewElement.parentNode.removeChild(file.previewElement);


      params = {
        imagen: file.nombreSevidor ?? document.querySelector('#imagen').value
      }


      axios.post('/proyectos/borrarimagen', params)
      .then(respuesta => console.log(respuesta))
    }

  });
  })
</script>
@endsection
