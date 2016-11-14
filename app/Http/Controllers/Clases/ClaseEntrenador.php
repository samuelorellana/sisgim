<?php

namespace App\Http\Controllers\Clases;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ClaseRepositorio;

class ClaseEntrenador extends Controller
{
	protected $clases;

    public function __construct(ClaseRepositorio $clases)
    {
        $this->clases=$clases;
    }
    //
    public function clasexentrenador(Request $request)
    {

        $horarios=$this->clases->RepClases();

        $eventos =array();

        foreach($horarios as $horario)
        {
            $ev = array();
            $ev['id']=$horario['id'];
            $ev['title']=$horario['content1'];
            $ev['start']=$horario['start'];
            $ev['end']=$horario['end'];
            $ev['dow']=$horario['d'];
            $ev['content']=$horario['content2'];
            $ev['cupo']=$horario['c'];
            $ev['class']=$horario['color'];
            $ev['allDay']=false;

            array_push($eventos, $ev);
        }

        echo json_encode($eventos);
               
        //return view ('Clases.CalendarioClases');
        // return view('Clases.ListaClasesX',['clases'=>$clases]);
    }
}
