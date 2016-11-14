<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    protected $table = 'sistema.clases';
    protected $primaryKey='id_clase';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_usuario_rol','id_disciplina','estado','color'];

    public function entrenador()
    {
    	return $this->belongsTo(UsuarioRol::class,'id_usuario_rol','id_usuario_rol');
    }

    public function disciplina()
    {
    	return $this->belongsTo(Disciplina::class,'id_disciplina','id_disciplina');
    }

    public function horario()
    {
    	return $this->hasOne(Horario::class,'id_clase','id_clase');
    }

    public function importe()
    {
        return $this->hasOne(Importe::class,'id_clase','id_clase');
    }
}
