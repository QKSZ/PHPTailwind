<?php

namespace App\Http\Controllers;

use COM;
use App\User;
use App\Proyecto;
use App\Candidato;
use Illuminate\Http\Request;
use App\Mail\CandidatoAprobado;
use App\Mail\CandidatoRechazado;
use App\Exports\CandidatosExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //obteneridactual
        //dd($request->route('id'));
        $id_proyecto = $request->route('id');

        //obtener candidatos
        $proyecto = Proyecto::findOrFail($id_proyecto);

        $this->authorize('view', $proyecto);
        //dd($proyecto);
        return view('candidatos.index', compact('proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data = $request->validate(
        [
            'user_id'=> 'required',
            'user_email' => 'required',
            'apellido' => 'required',
            'carne' => 'required',
            'anteproyecto' => 'required|mimes:pdf|max:1000',
           'proyecto_id'=> 'required'
        ]

        );
        if($request->file('anteproyecto'))
        {
            $archivo = $request->file('anteproyecto');
            $nombreArchivo = time ().".". $request->file('anteproyecto')->extension();
            $ubicacion = public_path('/storage/anteproyecto');
            $archivo->move($ubicacion, $nombreArchivo);

        }
        $proyecto = Proyecto::find($data['proyecto_id']);
        $proyecto->candidatos()->create([
            'nombre'=> $data['user_id'],
            'email'=> $data['user_email'],
            'apellido'=> $data['apellido'],
            'carne'=> $data['carne'],
            'anteproyecto'=> $nombreArchivo,
        ]

        );
        $reclutador = $proyecto->reclutador;
        $reclutador->notify( new NuevoCandidato($proyecto->titulo, $proyecto->id) );


        //Almacenar archivo PDF






        //$candidato = new Candidato();
        //$candidato->nombre=$data['nombre'];
        //$candidato->email=$data['email'];
        //$candidato->proyecto_id=$data['proyecto_id'];
        //$candidato->cv= "123.pdf";
        //$candidato = new Candidato($data);
        //$candidato->cv= $nombreArchivo;
        //$candidato->save();
        return back()->with('estado','Tus datos se enviaron correctamente');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */

    public function administrador (Request $Request){
         $test = json_decode($Request->email);

        $User= User::findOrFail($test->id);

        $User->admin = 1;
        $User->save();

    return back()->with('estado','El usuario ya es administrador');





    }





    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        $candidato->estado = $request->estado1;
        $candidato->condicion = $request->condicion1;
        $candidato->save();
        $remitente = Auth::user();
        $correo =[$request->candidatoe,$request->ubicacioncandi];
        foreach($correo as $correo){
            Mail::to($correo)->send(new CandidatoAprobado($candidato,$remitente));
        }





        //
    }
    public function rechazar(Request $request, Candidato $candidato)
    {

        $candidato->estado = $request->estado2;
        $candidato->descripcion = $request->descripcion;
        $candidato->condicion = $request->condicion2;
        $candidato->save();

        $remitente = Auth::user();
        Mail::to($request->candidatoa)->send(new CandidatoRechazado($candidato,$remitente));
        //
    }
    public function eliminar(Request $request, Candidato $candidato)
    {

        $candidato->estado = $request->estado3;
        $candidato->save();
        //
    }


    //**Metodo para hacer un excel de los candidatos */

    public function excel(Request $request){
        $valor = $request->proyecto;

      return (new CandidatosExport($valor))->download('Reporte.xlsx');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
