
@extends ('layouts.app')

@section ('titulo', 'Estadio Create')

@section ('content')
	<form class="form-group" method="POST" action="/estadio" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreEstadio" class="form-control">
			<label for="">Inauguración</label>
			<input type="date" name="inauguracionEstadio" class="form-control">
			<label for="">Capacidad</label>
			<input type="text" name="capacidadEstadio" class="form-control">
			
			<label>Ciudad</label>
    			<select name="idCiudad" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($ciudades as $ciu)
    					<option value="{{$ciu['idCiudad']}}">{{$ciu['nombreCiudad']}}</option>
    				@endforeach
    			</select>
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