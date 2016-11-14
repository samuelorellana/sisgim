<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    //
    protected $table = 'sistema.inscripciones';
    protected $primaryKey='id_inscripcion';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_usuario_rol','id_importe','fecha_inscripcion','concepto','cortesia','estado'];

    public function persona()
    {
    	return $this->belongsTo(UsuarioRol::class,'id_usuario_rol','id_usuario_rol');
    }

    public function importe()
    {
    	return $this->hasOne(Importe::class,'id_importe','id_importe');
    }

    public function deuda()
    {
    	return $this->hasOne(Deuda::class,'id_inscripcion','id_inscripcion');
    }
}
