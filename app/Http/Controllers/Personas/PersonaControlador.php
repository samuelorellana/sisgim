<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Persona;
use App\Models\Rol;
use App\Models\UsuarioRol;

class PersonaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $personas = Persona::join('usuarios_roles','usuarios_roles.id_persona','=','personas.id_persona')
        ->where('usuarios_roles.id_rol','=',2)
        ->get();

        return view('Persona.ListaPersonas',['personas'=>$personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Persona.CrearPersona');
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
        $persona = Persona::create($request->all());

        session(['id_persona'=>$persona->id_persona]);

        $roles = Rol::all();

        return view('Usuario.CrearUsuario',['email'=>$persona->email,'roles'=>$roles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // este se usara para redireccionar al menu solo para personas....
        
        $cliente = UsuarioRol::join('personas','personas.id_persona','=','usuarios_roles.id_persona')
        ->where('personas.id_persona','=',$id)
        ->where('usuarios_roles.id_rol','=',2)
        ->first();

        session(['id_usuario_rol'=>$cliente->id_usuario_rol]);
        session(['nombre'=>$cliente->nombres.' '.$cliente->apellidos]);
        session(['id_persona'=>$cliente->id_persona]);

        return view('Menu.MenuCliente');
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

    public function entrenadores()
    {
        $personas = Persona::join('usuarios_roles','usuarios_roles.id_persona','=','personas.id_persona')
        ->where('usuarios_roles.id_rol','=',1)
        ->get();

        return view('Persona.ListaPersonas',['personas'=>$personas]);

    }
}
