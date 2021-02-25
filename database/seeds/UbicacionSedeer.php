<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacions')->insert([
            'nombre'=>'Heredia',
            'email' => 'serviciosestudiantiles.heredia@ulatina.cr',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

          ]);
          DB::table('ubicacions')->insert([
            'nombre'=>'San Pedro',
            'email' => 'serviciosestudiantilessp@ulatina.cr',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

          ]);

        //
    }
}
