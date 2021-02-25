<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*Los usuarios administradores tendran el idetificador admin = 1 */


        DB::table('users')->insert([
            'name'=>'Ulatina',
            'apellido'=>'Admin',
            'carne'=>'1',
            'email' => 'administrador',
            'admin' => '2',
            'email_verified_at'=> Carbon::now(),
            'password'=> Hash::make('ulatinatcu2020'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

          ]);
          DB::table('users')->insert([
            'name'=>'Usuario',
            'apellido'=>'prueba',
            'carne'=>'3',
            'email' => 'prueba@prueba.com',
            'admin' => '0',
            'email_verified_at'=> Carbon::now(),
            'password'=> Hash::make('prueba'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

          ]);
        //
    }
}
