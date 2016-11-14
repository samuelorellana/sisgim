@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-headind">
			<h1>LISTADO DE CLASES DE ENTRENAMIENTO DISPONIBLES</h1>
			
		</div>
		<div class="panel-body">
			<div class="table-responsive">
			    <div class="container-fluid">
			        <table class="table table-bordered table-condensed">
			            <thead>
			                    <th>ENTRENADOR</th>
			                    <th>DISCIPLINA</th>
			                    <th>DIA</th>
			                    <th>HORA I</th>
			                    <th>HORA F</th>
			                    <th>CUPO</th>
			               
			                </thead>
			            <tbody>
			                    @foreach($clases as $clase)
			                    <tr>
			                        <td>{{ $clase->entrenador->persona->nombres }}</td>
			                        <td>{{ $clase->disciplina->descripcion }}</td>
			                        <td>{{ $clase->dia }}</td>
			                        <td>{{ $clase->hora_inicio }}</td>
			                        <td>{{ $clase->hora_fin }}</td>
			                        <td>{{ $clase->cupo }}</td>
			                        
			                    </tr>
			                    @endforeach
			                </tbody>
			        </table>
			    </div>
			</div>

			<button class="btn btn-success navbar-btn" type="button" onclick="document.location.href='{{ route('clase.create') }}'" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Registrar Nueva</button></p>
		</div>
	</div>
@endsection