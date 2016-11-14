<?php

namespace App\Repositories;

use App\Models\Horario;
use App\Models\Deuda;
use App\Models\Importe;

use DB;

class ClaseRepositorio
{
	public function RepClases()
	{
		$clases = Horario::select('horarios.id_horario as id','horarios.dia as d','horarios.hora_inicio as start','horarios.hora_fin as end','horarios.cupo as c','disciplinas.descripcion as content1','personas.nombres as content2','clases.color as color')
		->join('clases','clases.id_clase','=','horarios.id_clase')
		->join('disciplinas','disciplinas.id_disciplina','=','clases.id_disciplina')
		->join('usuarios_roles','usuarios_roles.id_usuario_rol','=','clases.id_usuario_rol')
		->join('personas','personas.id_persona','=','usuarios_roles.id_persona')
		->join('roles','roles.id_rol','=','usuarios_roles.id_rol')
		->where('roles.id_rol','=',1)
		->where('horarios.estado','=','AC')
		->orderBy('personas.nombres')
		->get();

		return $clases;
	}

	public function RepClasesG()
	{
		$disciplinas = Importe::join('clases','clases.id_clase','=','importes.id_clase')
		->join('disciplinas','disciplinas.id_disciplina','=','clases.id_disciplina')
		->join('usuarios_roles','usuarios_roles.id_usuario_rol','=','clases.id_usuario_rol')
		->join('personas','personas.id_persona','=','usuarios_roles.id_persona')
		->join('roles','roles.id_rol','=','usuarios_roles.id_rol')
		->where('roles.id_rol','=',1)
		->where('importes.estado','=',"AC")
		->get();

		return $disciplinas;
	}

	public function RepDeudas($id)
	{
		$deudas = Deuda::join('inscripciones','inscripciones.id_inscripcion','=','deudas.id_inscripcion')
		->join('importes','importes.id_importe','=','inscripciones.id_importe')
		->join('clases','clases.id_clase','=','importes.id_clase')
		->join('disciplinas','disciplinas.id_disciplina','=','clases.id_disciplina')
		->join('usuarios_roles','usuarios_roles.id_usuario_rol','=','inscripciones.id_usuario_rol')
		->join('personas','personas.id_persona','=','usuarios_roles.id_persona')
		->where('deudas.id_deuda','=',$id)
		->first();

		return $deudas;
	}
}