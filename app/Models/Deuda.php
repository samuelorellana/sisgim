<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    //
    protected $table = 'sistema.deudas';
    protected $primaryKey='id_deuda';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_inscripcion','pago_pendiente','pago_cuenta','descuento','estado'];

    public function inscripcion()
    {
    	return $this->belongsTo(Inscripcion::class,'id_inscripcion','id_inscripcion');
    }

    public function recibo()
    {
    	return $this->hasMany(Recibo::class,'id_deuda','id_deuda');
    }
}
