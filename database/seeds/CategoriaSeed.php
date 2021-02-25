<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert([
        'nombre'=>'Pre-Aprobado',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        
      ]);
      DB::table('categorias')->insert([
        'nombre'=>'Otro',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        
      ]);
    
        //
    }
}
