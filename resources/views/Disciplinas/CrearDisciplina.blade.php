@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>CREAR NUEVA DISCIPLINA</strong></h4>
		    
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'disciplina.store','method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::label('Nombre o Descripcion de la Disciplina') !!}
					{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Nombre o Descripcion de la Disciplina']) !!}
				</div>

				<label class="form-group">Elija un Entrenador</label>
                <div class="selectContainer">
                    <select class="form-control" id="id_usuario_rol" name="id_usuario_rol">
                        @foreach ($entrenadores as $entrenador)
                            <option value="{{ $entrenador->id_usuario_rol}}">{{ $entrenador->nombres }} {{ $entrenador->apellidos }}</option>
                         @endforeach
                    </select>
                </div>

                <div class="form-group">
					{!! Form::label('Costo Por Clase o Sesion') !!}
					{!! Form::number('costo_clase',null,['id'=>'costo_clase','class'=>'form-control','placeholder'=>'Costo Por Clase o Sesion']) !!}
				</div>				

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>

	</div>
@endsection