@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-headind">
			<h1>LISTADO DE CLIENTES</h1>
			{{-- <button class="btn btn-success navbar-btn" type="button" onclick="listar(0)" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Todos</button></p>
			<button class="btn btn-success navbar-btn" type="button" onclick="listar(1)" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Clientes</button></p>
			<button class="btn btn-success navbar-btn" type="button" onclick="listar(2)" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Entrenadores</button></p> --}}
		</div>
		<div class="panel-body">
			<div class="table-responsive">
			    <div class="container-fluid">
			        <table class="table table-bordered table-condensed">
			            <thead>
			                    <th>NOMBRE</th>
			                    <th>APELLIDOS</th>
			                    <th>DOCUMENTO</th>
			                    <th>CELULAR</th>
			                    <th>TELEFONO</th>
			                </thead>
			            <tbody>
			                    @foreach($personas as $persona)
			                    <tr>
			                        <td>{{ $persona->nombres }}</td>
			                        <td>{{ $persona->apellidos}}</td>
			                        <td>{{ $persona->documento_identidad}}</td>
			                        <td>{{ $persona->celular}}</td>
			                        <td>{{ $persona->telefono }}</td>
			                        <td><a href="{{ route('persona.show',$persona->id_persona) }}">Seleccionar</a></td>
			                    </tr>
			                    @endforeach
			                </tbody>
			        </table>
			    </div>
			</div>

			<button class="btn btn-success navbar-btn" type="button" onclick="document.location.href='{{ route('persona.create') }}'" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Registrar Nueva</button></p>
		</div>
	</div>
@endsection

{{-- @section('javascript')
<script>
	var listar = function(variable){
		$.ajax({
			type:'GET',
			url:'{{ url('persona') }}',
			data: { variable:variable },
			success:function(data)
			{
			}
		});
	}
</script>
@stop --}}