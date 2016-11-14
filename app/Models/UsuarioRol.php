<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    //
    protected $table = 'sistema.usuarios_roles';
    protected $primaryKey='id_usuario_rol';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_user','id_persona','id_rol','estado'];

    public function usuario()
    {
    	return $this->hasOne(User::class,'id_user','id');
    }

    public function persona()
    {
    	return $this->hasOne(Persona::class,'id_persona','id_persona');
    }

    public function rol()
    {
    	return $this->hasOne(Rol::class,'id_rol','id_rol');
    }

    public function clase()
    {
        return $this->hasOne(Clase::class,'id_usuario_rol','id_usuario_rol');
    }

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class,'id_usuario_rol','id_usuario_rol');
    }
}
