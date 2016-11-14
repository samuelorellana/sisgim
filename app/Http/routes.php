<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

route::group(['middleware' => 'auth'],function(){

	route::resource('persona','Personas\PersonaControlador');
	route::get('entrenador','Personas\PersonaControlador@entrenadores');

	route::resource('usuario','Personas\UsuarioControlador');

	route::resource('roles','Roles\RolControlador');

	route::resource('disciplina','Disciplinas\DisciplinaControlador');

	route::resource('importe','Disciplinas\ImporteControlador');

	route::resource('clase','Clases\ClaseControlador');
	route::get('clasex','Clases\ClaseControlador@clasex');

	route::post('/clasexentrenador','Clases\ClaseEntrenador@clasexentrenador'); //este es el fullcalendar

	route::resource('inscripcion','Inscripciones\InscripcionControlador');

	route::resource('deuda','Inscripciones\DeudaControlador');

	route::resource('recibo','Inscripciones\ReciboControlador');

	//combobox
	Route::get('/dias', function()
	{
	 	$id = Input::get('importe');
	 	$dias = App\Models\Importe::join('horarios','horarios.id_clase','=','importes.id_clase')
	 			->where('importes.id_importe','=',$id)
	 			->get();

	 	$todos =array();

        foreach($dias as $dia)
        {
            $dd = array();
            if($dia->dia == '1'){ $dd['dia'] = "Lunes"; }
            else if($dia->dia == '2'){ $dd['dia'] = "Martes"; }
            else if($dia->dia == '3'){ $dd['dia'] = "Miercoles"; }
            else if($dia->dia == '4'){ $dd['dia'] = "Jueves"; }
            else if($dia->dia == '5'){ $dd['dia'] = "Viernes"; }
            else if($dia->dia == '6'){ $dd['dia'] = "Sabado"; }
            else if($dia->dia == '0'){ $dd['dia'] = "Domingo"; }
            $dd['horai'] = $dia->hora_inicio;
            $dd['horaf'] = $dia->hora_fin;
            array_push($todos, $dd);
        }
	 	return Response::json($todos);
	});
});
