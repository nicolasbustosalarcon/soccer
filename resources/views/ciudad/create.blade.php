
@extends ('layouts.app')

@section ('titulo', 'Ciudad Create')

@section ('content')
	<form class="form-group" method="POST" action="/ciudad">	
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
			<input type="text" name="nombreCiudad" class="form-control" required="">
			
    		<label>País</label>
    			<select name="idPais" class="form-control" required>
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			


			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>	
	<a href="../../admin"><button class='btn btn-danger'>Atrás</button></a>


@endsection