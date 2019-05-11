
@extends ('layouts.app')

@section ('titulo', 'Estadio Edit - ' .' ' .$estadios->nombreEstadio)

@section ('content')

	<form class="form-group" method="POST" action="/estadio/{{$estadios->idEstadio}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreEstadio" class="form-control" value="{{$estadios->nombreEstadio}}">
			<label for="">Inauguración</label>
			<input type="date" name="inauguracionEstadio" class="form-control" value="{{$estadios->inauguracionEstadio}}">
			<label for="">Capacidad</label>
			<input type="text" name="capacidadEstadio" class="form-control" value="{{$estadios->capacidadEstadio}}">
			
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
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection