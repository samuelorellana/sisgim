@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>CREAR NUEVO ROL</strong></h4>
		    
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'roles.store','method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::label('Tipo de Rol') !!}
					{!! Form::text('tipo',null,['id'=>'tipo','class'=>'form-control','placeholder'=>'Administrador, cliente, entrenador']) !!}
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>

	</div>
@endsection