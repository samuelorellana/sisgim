<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Importe extends Model
{
    //
    protected $table = 'sistema.importes';
    protected $primaryKey='id_importe';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_clase','costo_clase','estado'];

    public function disciplina()
    {
    	return $this->belongsTo(Clase::class,'id_clase','id_clase');
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class,'id_importe','id_importe');
    }
}
