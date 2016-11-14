@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>CREAR NUEVA PERSONA</strong></h4>
		    
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'persona.store','method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::label('Nombres') !!}
					{!! Form::text('nombres',null,['id'=>'nombres','class'=>'form-control','placeholder'=>'Nombres']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Apellidos') !!}
					{!! Form::text('apellidos',null,['id'=>'apellidos','class'=>'form-control','placeholder'=>'Apellidos']) !!}
				</div>				

				<div class="form-group">
					{!! Form::label('Fecha nacimiento') !!}
					{!! Form::date('fecha_nacimiento',null,['id'=>'fecha_nacimiento','class'=>'form-control','placeholder'=>'Fecha nacimiento']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Documento identidad') !!}
					{!! Form::text('documento_identidad',null,['id'=>'documento_identidad','class'=>'form-control','placeholder'=>'Documento identidad']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Direccion') !!}
					{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Direccion']) !!}
				</div>				

				<div class="form-group">
					{!! Form::label('Celular') !!}
					{!! Form::text('celular',null,['id'=>'celular','class'=>'form-control','placeholder'=>'Celular']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Telefono') !!}
					{!! Form::text('telefono',null,['id'=>'telefono','class'=>'form-control','placeholder'=>'Telefono']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Contacto de emergencia') !!}
					{!! Form::text('persona_referencia',null,['id'=>'persona_referencia','class'=>'form-control','placeholder'=>'Contacto de emergencia']) !!}
				</div>				

				<div class="form-group">
					{!! Form::label('Telefono de emergencia') !!}
					{!! Form::text('telefono_referencia ',null,['id'=>'telefono_referencia ','class'=>'form-control','placeholder'=>'Telefono de emergencia']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('e Mail') !!}
					{!! Form::email('email ',null,['id'=>'email ','class'=>'form-control','placeholder'=>'e Mail']) !!}
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>

	</div>
@endsection