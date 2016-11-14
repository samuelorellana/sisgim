@extends('layouts.app1')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h4><strong>FORMULARIO DE PAGO</strong></h4>
		    
		</div>
		<div class="panel-body">
			{!! Form::model($deuda,['route'=>['deuda.update',$deuda->id_deuda],'method'=>'PUT']) !!}
				
				<div class="form-group">
					<h1 id="pp"></h1>
				</div>

				<div class="form-group">
					<h1 id="pe"></h1>
				</div>

				<div class="form-group">
					{!! Form::label('Costo Total') !!}
					{!! Form::number('pago_pendiente',null,['id'=>'pago_pendiente','class'=>'form-control','placeholder'=>'Costo Total']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Descuento adicional') !!}
					{!! Form::number('descuento',null,['id'=>'descuento','class'=>'form-control','placeholder'=>'Descuento adicional']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Pago efectuado') !!}
					{!! Form::number('pago_cuenta',null,['id'=>'pago_cuenta','class'=>'form-control','placeholder'=>'Pago efectuado']) !!}
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
		$(document).ready(function(){
			var v1 = $('#pago_pendiente').val();

			//llevo a 0 descuentos y pagos... solo cargo la cuenta pendiente
			document.getElementById('descuento').value = 0;
			document.getElementById('pago_cuenta').value = 0;
			var v2 = $('#descuento').val();
			var v3 = $('#pago_cuenta').val();

			var pendienteO = v1;
			//var pendienteD;

			document.getElementById('pp').innerHTML = "Cuenta Pendiente = "+v1;
			document.getElementById('pe').innerHTML = "Pago actual = 0 || Descuento = 0";

			$('#descuento').on('keyup',function(){
				pagosdescuentos();
			});

			$('#pago_cuenta').on('keyup',function(){
				pagosdescuentos();
			});

			function pagosdescuentos()
			{
				v3 = $('#pago_cuenta').val();
				v2 = $('#descuento').val();
				v1 = pendienteO - v3 - v2;

				if(v1<0){
					alert('El pago/Descuento es excesivo, revise por favor');
				}
				else
				{
					document.getElementById('pago_pendiente').value = v1;
					document.getElementById('pp').innerHTML = "Cuenta Pendiente = "+v1;
					document.getElementById('pe').innerHTML = "Pago actual = " + v3 + "|| Descuento = " + v2;
				}
			}

		});
		

	</script>

@stop