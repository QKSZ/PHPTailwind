<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $fillable = [
        'titulo','imagen','descripcion','categoria_id','ubicacion_id','proyectopdf',
    ];


    //Relaciones 1:1
    public function categoria(){

        return $this->belongsTo(Categoria::class);

    }
    public function ubicacion(){

        return $this->belongsTo(Ubicacion::class);

    }
    public function reclutador(){

        return $this->belongsTo(User::class, 'user_id');

    }
    //relacion 1::n
    public function candidatos(){

        return $this->hasMany(Candidato::class);

    }
}
