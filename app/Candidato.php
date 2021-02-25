<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable =[
        'nombre','email','cv','proyecto_id','anteproyecto','carne','apellido',
    ];
}
