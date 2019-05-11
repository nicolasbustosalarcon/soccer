
@extends ('layouts.app')

@section ('titulo', 'Estadio' .$estadios->idEstadio)

@section ('content')

	<div class="row">
		<div class="col">
			<h1>Información</h1>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p><b>Nombre </b> 	{{$estadios->nombreEstadio}}</p>
			<p><b>Inauguración</b> 	{{$estadios->inauguracionEstadio}}</p>
			@foreach($paises as $pais)
				@foreach($ciudades as $ciu)
					@if(($pais->idPais === $estadios->idPais)&&($ciu->idCiudad === $estadios->idCiudad))
						<p><b>Ubicación</b> {{$ciu->nombreCiudad}}, {{$pais->nombrePais}}</p>
					@endif
				@endforeach
			@endforeach
			<p><b>Capacidad</b> 	{{$estadios->capacidadEstadio}} personas</p>
		</div>
	</div>


@endsection