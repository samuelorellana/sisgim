<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    //
    protected $table = 'sistema.recibos';
    protected $primaryKey='id_recibo';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['id_deuda','monto_pagado','fecha_pago','no_factura','estado'];

    public function deuda()
    {
    	return $this->belongsTo(Deuda::class,'id_deuda','id_deuda');
    }
}
