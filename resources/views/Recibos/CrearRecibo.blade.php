@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>RECIBO :</strong></h4>

		    <h6><strong>Cliente</strong> {{ $datos->nombres }} {{ $datos->apellidos }}</h6>
		    <h6><strong>Por</strong> {{ $datos->concepto }} <strong>Clases en</strong> {{ $datos->descripcion }}</h6>
		    <h6><strong>Por el monto</strong> {{ $datos->pago_cuenta }}</h6>

		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'recibo.store','method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::hidden('id_deuda',$datos->id_deuda,['id'=>'id_deuda','class'=>'form-control','placeholder'=>'idd']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::hidden('monto_pagado',$datos->pago_cuenta,['id'=>'monto_pagado','class'=>'form-control','placeholder'=>'mp']) !!}
				</div>

                <div class="form-group">
					{!! Form::label('Fecha de pago') !!}
					{!! Form::date('fecha_pago',$fecha,['id'=>'fecha_pago','class'=>'form-control','placeholder'=>'Fecha de pago']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('# Factura') !!}
					{!! Form::text('no_factura',null,['id'=>'no_factura','class'=>'form-control','placeholder'=>'# Factura']) !!}
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>

	</div>
@endsection