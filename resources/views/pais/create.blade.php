@extends ('layouts.app')

@section ('titulo', 'Pais Create')

@section ('content')
	<form class="form-group" method="POST" action="/pais">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombrePais" class="form-control">
			
			<label>Continente</label>
    			<select name="idContinente" class="form-control">
   					<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($continentes as $cont)
    					<option value="{{$cont['idContinente']}}">{{$cont['nombreContinente']}}</option>
    				@endforeach
    			</select>
    		
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>	
@endsection