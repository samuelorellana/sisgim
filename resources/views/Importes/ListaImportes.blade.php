@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-headind">
			<h1>LISTADO DE IMPORTES POR DISCIPLINA</h1>
			
		</div>
		<div class="panel-body">
			<div class="table-responsive">
			    <div class="container-fluid">
			        <table class="table table-bordered table-condensed">
			            <thead>
			                    <th>DISCIPLINA</th>
			                    <th>COSTO POR CLASE</th>
			               
			                </thead>
			            <tbody>
			                    @foreach($importes as $importe)
			                    <tr>
			                        <td>{{ $importe->descripcion }}</td>
			                        <td>{{ $importe->costo_clase}}</td>
			                        
			                    </tr>
			                    @endforeach
			                </tbody>
			        </table>
			    </div>
			</div>

			<button class="btn btn-success navbar-btn" type="button" onclick="document.location.href='{{ route('importe.create') }}'" style="margin-top: 1px; margin-bottom: 1px; margin-left: 30px; padding: 5px 5px;">Registrar Nuevo</button></p>
		</div>
	</div>
@endsection