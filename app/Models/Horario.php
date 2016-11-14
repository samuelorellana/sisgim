<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $table = 'sistema.horarios';
    protected $primaryKey='id_horario';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_clase','dia','hora_inicio','hora_fin','cupo','estado'];

    public function clase()
    {
    	return $this->belongsTo(Clase::class,'id_clase','id_clase');
    }
}
