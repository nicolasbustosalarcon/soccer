
@extends ('layouts.app')

@section ('titulo', 'Torneo' .$torneos->idTorneo)

@section ('content')

	<div class="row">
		<div class="col">
			<h1>Información</h1>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p><b>Nombre Torneo</b> 	{{$torneos->nombreTorneo}}</p>
			<p><b>Edición</b> 			{{$torneos->edicion}}</p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<h2>Clubes Participantes</h2>
		</div>
	</div>
	<div class="row">
		<div class="col">
			
					<table>
						<thead>
							
						</thead>
						@foreach($clubes as $club)
								@if($club->idTorneo === $torneos->idTorneo)
						<tbody>
							
									<td><a href="{{ route('club.show', $club->idClub)}}" class="text-dark"><div>{{$club->nombreClub}}</div></td></a>
								
						</tbody>
						@endif
							@endforeach
					</table>
				
		</div>
	</div>


@endsection