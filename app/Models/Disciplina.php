<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    //
    protected $table = 'sistema.disciplinas';
    protected $primaryKey='id_disciplina';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['descripcion','estado'];

    public function clase()
    {
    	return $this->hasOne(Clase::class,'id_disciplina','id_disciplina');
    }
}
