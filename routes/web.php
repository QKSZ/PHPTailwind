<?php

use App\Categoria;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify'=> true]);



//Rutas protegidas
Route::group(['middleware' => ['auth','verified']], function(){
    Route::get('/proyectos','ProyectoController@index')->name('proyectos.index')->middleware('revisar');
    Route::get('/proyectos/create','ProyectoController@create')->name('proyectos.create')->middleware('revisar');
    Route::post('/proyectos','ProyectoController@store')->name('proyectos.store')->middleware('revisar');
    Route::delete('proyectos/{proyecto}','ProyectoController@destroy')->name('proyectos.destroy')->middleware('revisar');
    Route::get('/proyectos/{proyecto}/edit','ProyectoController@edit')->name('proyectos.edit')->middleware('revisar');
    Route::put('/proyectos/{proyecto}', 'ProyectoController@update')->name('proyectos.update')->middleware('revisar');





    //Subir documentos
    Route::post('/proyectos/imagen', 'ProyectoController@imagen')->name('proyectos.imagen')->middleware('revisar');
    Route::post('/proyectos/borrarimagen','ProyectoController@borrarimagen')->name('proyectos.borrar')->middleware('revisar');

    //enviar datos
    Route::post('/candidatos/store','CandidatoController@store')->name('candidatos.store');
   //candidatosendpoint
   Route::post('/candidatos/{candidato}/aprobar','CandidatoController@update')->name('candidatos.update')->middleware('revisar');
   //candidatosendpoint
   Route::post('/candidatos/{candidato}/rechazar','CandidatoController@rechazar')->name('candidatos.rechazar')->middleware('revisar');
   Route::post('/candidatos/{candidato}/eliminar','CandidatoController@eliminar')->name('candidatos.rechazar')->middleware('revisar');
    //Notificaciones
    Route::get('/notificaciones','NotificacionesController')->name('notificaciones')->middleware('revisar');
    //lista candidatos
    Route::get('/candidatos/{id}','CandidatoController@index')->name('candidatos.index')->middleware('revisar');

    //lista de Proyectos
    Route::get('/tcu/buscar','ProyectoController@buscar')->name('proyectos.buscar');
    Route::post('/tcu/register','CandidatoController@administrador')->name('register.administrador')->middleware('revisar');

    Route::get('/proyectos/{proyecto}', 'ProyectoController@show')->name ('proyectos.show');
    Route::get('/proyecto-lista-excel', 'CandidatoController@excel')->name ('proyecto.excel');

    //Rutas de descarga de excel





});

// Paginade inico
Route::get('/','InicioController')->name('inicio');



//rutas sin proteger



