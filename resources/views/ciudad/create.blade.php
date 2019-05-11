
@extends ('layouts.app')

@section ('titulo', 'Ciudad Create')

@section ('content')
	<form class="form-group" method="POST" action="/ciudad">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreCiudad" class="form-control">
			
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			


			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>	

@endsection