@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>CREAR NUEVO HORARIO PARA UNA CLASE</strong></h4>

		    <button class="btn btn-success navbar-btn" type="button" onclick="document.location.href='{{ route('disciplina.create') }}'" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Crear Nueva Disciplina</button></p>

		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'clase.store','method'=>'POST']) !!}

                <label class="form-group">Elija una Disciplina</label>
                <div class="selectContainer">
                    <select class="form-control" id="id_clase" name="id_clase">
                        @foreach ($clases as $clase)
                            <option value="{{ $clase->id_clase}}"> Disciplina: {{ $clase->disciplina->descripcion }} - Entrenador: {{ $clase->entrenador->persona->nombres }}</option>
                         @endforeach
                    </select>
                </div>

                <label class="form-group">Elija Dia</label>
                <div class="selectContainer">
                    <select class="form-control" id="dia" name="dia">
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miercoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sabado</option>
                            <option value="0">Domingo</option>
                    </select>
                </div>

				<div class="form-group">
					{!! Form::label('Hora de Inicio') !!}
					{!! Form::text('hora_inicio',null,['id'=>'hora_inicio','class'=>'form-control','placeholder'=>'Hora de Inicio']) !!}
				</div>		

				<div class="form-group">
					{!! Form::label('Hora de Finalizacion') !!}
					{!! Form::text('hora_fin',null,['id'=>'hora_fin','class'=>'form-control','placeholder'=>'Hora de Finalizacion']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Cantidad maxima de alumnos') !!}
					{!! Form::number('cupo',null,['id'=>'cupo','class'=>'form-control','placeholder'=>'Cantidad maxima de alumnos']) !!}
				</div>		

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>

	</div>
@endsection