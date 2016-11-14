<?php

namespace App\Http\Controllers\Clases;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Clase;
use App\Models\Horario;

use App\Models\UsuarioRol;
use App\Models\Disciplina;

use App\Repositories\ClaseRepositorio;

class ClaseControlador extends Controller
{
    protected $clases;

    public function __construct(ClaseRepositorio $clases)
    {
        $this->clases=$clases;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clases = Clase::join('horarios','horarios.id_clase','=','clases.id_clase')
        ->orderBy('horarios.dia','asc')
        ->get();

        return view('Clases.ListaClases',['clases'=>$clases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clases = Clase::all();

        return view('Clases.CrearClase',['clases'=>$clases]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Horario::create($request->all());

        return redirect()->route('clase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function clasex()
    {
        // $horarios=$this->clases->RepClases();
        // return $horarios->toArray();
        return view('Clases.CalendarioClases');
    }
}
