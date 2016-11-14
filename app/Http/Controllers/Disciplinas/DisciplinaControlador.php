<?php

namespace App\Http\Controllers\Disciplinas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disciplina;
use App\Models\UsuarioRol;
use App\Models\Clase;
use App\Models\Importe;

class DisciplinaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $disciplinas = Disciplina::join('clases','clases.id_disciplina','=','disciplinas.id_disciplina')
        ->join('importes','importes.id_clase','=','clases.id_clase')
        ->get();

        return view('Disciplinas.ListaDisciplinas',['disciplinas'=>$disciplinas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $entrenadores = UsuarioRol::join('personas','personas.id_persona','=','usuarios_roles.id_persona')
        ->where('id_rol','=',1)
        ->get();
        return view('Disciplinas.CrearDisciplina',['entrenadores'=>$entrenadores]);
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
        $disciplina= Disciplina::create($request->all());

        $clase = new Clase;
        $clase->id_usuario_rol = $request['id_usuario_rol'];
        $clase->id_disciplina = $disciplina->id_disciplina;
        $clase->estado = "AC";
        $clase->save();

        $importe = new Importe;
        $importe->id_clase = $clase->id_clase;
        $importe->costo_clase = $request['costo_clase'];
        $importe->estado = "AC";
        $importe->save();

        return redirect()->route('disciplina.index');
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
}
