
@extends ('layouts.app')

@section ('titulo', 'Torneo' .$torneos->idTorneo)

@section ('content')

	<div class="row">
		<div class="col  text-white">
			<h1>Información</h1>
		</div>
	</div>

	<div class="row">
		<div class="col  text-white">
			<p><b>Nombre Torneo</b> 	{{$torneos->nombreTorneo}} </p>
			<p><b>Edición</b> 			{{$torneos->edicion}}</p>
		</div>
	</div>

	<div class="row  text-white">
		<div class="col  text-white">
			<h2>Clubes Participantes</h2>
		</div>
	</div>
	<div class="row  text-white">
		<div class="col  text-white">
			
					<table>
						<thead>
							
						</thead>
						@foreach($clubes as $club)
								@if($club->idTorneo === $torneos->idTorneo)
						<tbody>
							<div>
								<img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:25px !important; height:25px !important">
                                <a href="{{ route('club.show', $club->idClub)}}" class="text-white">
                                    <span>{{ $club->nombreClub}}</span>
                                    
                                </a>
                            </div>
								
						</tbody>
						@endif
							@endforeach
					</table>
					<div>
						@if($torneos->idTorneo != 5)
							<p></p>
								<a href="{{ route('torneo.posicion', $torneos->idTorneo)}}"><button class="btn-success">Ver Tabla de Posiciones</button></a>
							<p>	</p>
						@endif
				</div>
				
		</div>

	</div>
	


@endsection