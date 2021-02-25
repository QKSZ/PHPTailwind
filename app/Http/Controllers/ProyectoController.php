<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Categoria;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProyectoController extends Controller
{
    public function __construct()
    {
        //revisar que el usuario este auth
       // $this->middleware(['auth', 'verified']);//
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //$proyectos = auth()->user()->proyectos;
        $proyectos = Proyecto::where('user_id',auth()->user()->id)->simplePaginate(10);
        //dd($proyectos);



        return view('proyectos.index', compact('proyectos'));



        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //consultas
        $categorias = Categoria::all();
        $ubicaciones = Ubicacion::all();

        //
        return view('proyectos.create')
                    ->with('categorias',$categorias)
                    ->with('ubicaciones',$ubicaciones);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validadcion
        $data = $request-> validate([
            'titulo'=> 'required|min:6',
            'categoria'=> 'required',
            'ubicacion'=> 'required',
            'descripcion'=> 'required',
            'imagen'=> 'nullable',
            'proyectopdf'=>'nullable',

        ]);

        if($request->file('proyectopdf'))
        {
            $archivo = $request->file('proyectopdf');
            $nombreArchivo = time ().".". $request->file('proyectopdf')->extension();
            $ubicacion = public_path('/storage/proyectopdf');
            $archivo->move($ubicacion, $nombreArchivo);

        }
        else{
            $nombreArchivo = null;
        }


            //almacenar en la base de datos
            auth()->user()->proyectos()->create([
             'titulo' => $data ['titulo'],
             'imagen' => $data ['imagen'],
             'descripcion'=> $data['descripcion'],
             'categoria_id'=> $data['categoria'],
             'ubicacion_id'=> $data['ubicacion'],
             'proyectopdf' => $nombreArchivo

            ]);

        return redirect()->action('ProyectoController@index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
        return view('proyectos.show')->with('proyecto', $proyecto);


    }

    //show vista de buscar

    public function buscar(Request $request)
    {
        $proyectos = Proyecto::where('activa', true)->paginate(6);

        return view('buscar.index', compact('proyectos'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $this->authorize('view', $proyecto);
        //consultas
        $categorias = Categoria::all();
        $ubicaciones = Ubicacion::all();

        //
        return view('proyectos.edit')
                    ->with('categorias',$categorias)
                    ->with('ubicaciones',$ubicaciones)
                    ->with('proyecto', $proyecto);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $this->authorize('update', $proyecto);
        //dd($request->all());
            //validadcion
            $data = $request-> validate([
                'titulo'=> 'required|min:6',
                'categoria'=> 'required',
                'ubicacion'=> 'required',
                'descripcion'=> 'required',
                'imagen'=> 'nullable',

            ]);
            $proyecto->titulo = $data['titulo'];
            $proyecto->imagen = $data['imagen'];
            $proyecto->descripcion = $data['descripcion'];
            $proyecto->categoria_id = $data['categoria'];
            $proyecto->ubicacion_id = $data['ubicacion'];
            $proyecto->save();
            return redirect()->action('ProyectoController@index');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $this->authorize('delete', $proyecto);
        $proyecto->delete();
        return response()->json(['mensaje'=>'Se elimino el proyecto'. $proyecto->titulo]);
    }

    //campos extras
    public function imagen (Request $request){
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/proyectos'), $nombreImagen);
        return response()->json(['correcto'=> $nombreImagen ]);
    }



    //borrar imagen via ajax
    public function borrarimagen(Request $request)
    {
        if($request->ajax()){
           $imagen = $request->get('imagen');
           if (File::exists('storage/proyectos/'. $imagen)){
               File::delete('storage/proyectos/'. $imagen);
           }
           return response('Imagen Eliminada',200);
        }
    }

}
