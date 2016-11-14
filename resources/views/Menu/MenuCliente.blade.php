@extends('layouts.app1')

@section('content')
<div class="panel panel-deafult">
	<div class="panel-heading">
		<h1>Elija una opcion para el cliente</h1>
		<h4><strong>Cliente: [{{ session('id_usuario_rol') }}]  {{ session('nombre') }}</strong></h4>

	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('inscripcion.show',session('id_usuario_rol')) }}" class="btn btn-success">INSCRIPCION</a>
			</div>
			<div class="col-md-6">
				<a href="#" class="btn btn-warning">DISCIPLINAS</a>
			</div>
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
	</div>
</div>
@endsection