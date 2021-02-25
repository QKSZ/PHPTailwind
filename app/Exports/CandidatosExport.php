<?php

namespace App\Exports;

use App\Candidato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CandidatosExport implements FromQuery, WithHeadings
{
    use Exportable;



    public function __construct($valor)
    {
        $this->valor = $valor;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

        return Candidato::where("proyecto_id","=", $this->valor)->select("nombre","apellido","email","carne","condicion");
    }


    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Email',
            'Carné',
            'Condición',
        ];
    }




}
