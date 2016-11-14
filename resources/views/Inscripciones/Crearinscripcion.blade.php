@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>FORMULARIO DE INSCRIPCION</strong></h4>
		    
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'inscripcion.store','method'=>'POST']) !!}
				
				<div class="form-group">
					{!! Form::hidden('id_usuario_rol',session('id_usuario_rol'),['id'=>'id_usuario_rol','class'=>'form-control','placeholder'=>'id']) !!}
				</div>

				<label class="form-group">Elija una Disciplina</label>
                <div class="selectContainer">
                    <select class="form-control" id="id_importe" name="id_importe">
                    	<option value="">Seleccione una opcion</option>
                        @foreach ($disciplinas as $disciplina)
                            <option value="{{ $disciplina->id_importe}}"> DISCIPLINA: {{ $disciplina->descripcion }} - ENTRENADOR: {{ $disciplina->nombres }} - COSTO/CLASE: {{ $disciplina->costo_clase }}</option>
                         @endforeach
                    </select>
                </div>

                <div class="form-group" id="dias_entrenamiento">
                	
                </div>

                <div class="form-group">
					{!! Form::label('Fecha de inscripcion') !!}
					{!! Form::date('fecha_inscripcion',null,['id'=>'fecha_inscripcion','class'=>'form-control','placeholder'=>'Fecha de inscripcion']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Inscripcion Por: (# Clases)') !!}
					{!! Form::number('concepto',null,['id'=>'concepto','class'=>'form-control','placeholder'=>'Inscripcion Por: (# Clases)']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Cortesias : (# Clases)') !!}
					{!! Form::number('cortesia',null,['id'=>'cortesia','class'=>'form-control','placeholder'=>'Cortesias : (# Clases)']) !!}
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-info btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>

	</div>
@endsection

@section('javascript')
	<script>
	
		$('#id_importe').on('change',function(e){
		 	var importe = e.target.value;
		 	$.get('/dias?importe=' + importe,function(data){

		 		$('#dias_entrenamiento').empty();
		 		$.each(data,function(index,dias){
		 		 	$('#dias_entrenamiento').append('<p><small> Dia: ' + dias.dia + ' *** De: ' + dias.horai + ' a: ' + dias.horaf + '</small></p>');
		 		});
		 	});
		});


	</script>

@stop