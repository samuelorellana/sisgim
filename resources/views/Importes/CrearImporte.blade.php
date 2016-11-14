@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>CREAR NUEVO IMPORTE</strong></h4>

		    <button class="btn btn-success navbar-btn" type="button" onclick="document.location.href='{{ route('disciplina.create') }}'" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Crear Nueva Disciplina</button></p>
		    
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'importe.store','method'=>'POST']) !!}

				<label class="form-group">Elija una Disciplina</label>
                <div class="selectContainer">
                    <select class="form-control" id="id_clase" name="id_clase">
                        @foreach ($clases as $clase)
                            <option value="{{ $clase->id_clase}}">{{ $clase->descripcion }}</option>
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