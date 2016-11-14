<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = 'sistema.roles';
    protected $primaryKey='id_rol';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['tipo','estado'];

    public function usuariorol()
    {
    	return $this->belongsTo(UsuarioRol::class,'id_rol','id_rol');
    }
}
