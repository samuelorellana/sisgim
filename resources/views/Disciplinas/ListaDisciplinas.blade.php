@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-headind">
			<h1>LISTADO DE DISCIPLINAS DISPONIBLES</h1>
			
		</div>
		<div class="panel-body">
			<div class="table-responsive">
			    <div class="container-fluid">
			        <table class="table table-bordered table-condensed">
			            <thead>
			                    <th>DISCIPLINA</th>
			                    <th>ENTRENADOR</th>
			                    <th>COSTO/CLASE</th>
			               
			                </thead>
			            <tbody>
			                    @foreach($disciplinas as $disciplina)
			                    <tr>
			                        <td>{{ $disciplina->descripcion }}</td>
			                        <td>{{ $disciplina->clase->entrenador->persona->nombres }}</td>
			                        <td>{{ $disciplina->costo_clase }}</td>
			                        
			                    </tr>
			                    @endforeach
			                </tbody>
			        </table>
			    </div>
			</div>

			<button class="btn btn-success navbar-btn" type="button" onclick="document.location.href='{{ route('disciplina.create') }}'" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Registrar Nueva</button></p>
		</div>
	</div>
@endsection