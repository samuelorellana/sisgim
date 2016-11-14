<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'sistema.personas';
    protected $primaryKey='id_persona';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['nombres','apellidos','fecha_nacimiento','documento_identidad','direccion','celular','telefono','persona_referencia','telefono_referencia','email','estado'];

    public function usuariorol()
    {
    	return $this->belongsTo(UsuarioRol::class,'id_persona','id_persona');
    }
}
