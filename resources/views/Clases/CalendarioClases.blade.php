@extends('layouts.app1')

@section('content')
	<div id="calendar">
		
	</div>
@endsection

@section('javascript')
<script>
	$(document).ready(function(){
		$_token = "{{ csrf_token() }}";
		$.post('/clasexentrenador',{_token:$_token},function(data){
			//alert(data);

			$('#calendar').fullCalendar({
		        
		    	height: 500,

		        header:{
		        	left: 'prev,next today',
		        	center: 'title',
		        	right: 'month,agendaWeek,agendaDay'
		        },
		        eventLimit:true,
		        views:{
		        	agenda:{
		        		eventLimit:3
		        	}
		        },
		        editable: false,

		        droppable: false,

		        events: $.parseJSON(data),

		        eventRender: function (event, element) {
		        	element.css('background',event.class);
				},

		        eventClick: function(calEvent, jsEvent, view) {

			        alert('Evento: ' + calEvent.title + '\n Entrenador: '+calEvent.content + '\n #Personas: ' + calEvent.cupo);
			    }

		 	});
		});
	});
</script>

@stop