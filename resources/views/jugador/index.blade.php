
@extends ('layouts.app')

@section ('titulo', 'Jugadores')

@section ('content')
	<a href="/jugador/create" class="btn btn-default">Crear Jugador</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Nacimiento</th>
				<th>Edad</th>
				<th>Posición</th>
				<th>Altura</th>
				<th>Peso</th>
				<th>ID Club</th>
				<!--<th>Goles</th>
				<th>Amarillas</th>
				<th>Rojas</th>
				<th>Minutos</th>-->
				<th>ID Nacionalidad</th>


				
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($jugadores as $jug)
					<tr>
						<td>{{ $jug['idJugador'] }}</td>
						<td>{{ $jug['nombreJugador'] }}</td>
						<td>{{ $jug['apellidosJugador'] }}</td>
						<td>{{ $jug['nacimientoJugador'] }}</td>
						<td>{{ $jug['edadJugador'] }}</td>
						<td>{{ $jug['posicionJugador'] }}</td>
						<td>{{ $jug['alturaJugador'] }}</td>
						<td>{{ $jug['pesoJugador'] }}</td>
						@foreach($clubes as $club)
							@if($jug->idClub === $club->idClub)
								<td>{{ $club['nombreClub'] }}</td>
							@endif
						@endforeach
						
						<!--<td>{{ $jug['golesJugador'] }}</td>
						<td>{{ $jug['amarillasJugador'] }}</td>
						<td>{{ $jug['rojasJugador'] }}</td>
						<td>{{ $jug['minutostotalesJugador'] }}</td>-->
						@foreach($paises as $pais)
							@if($jug->idPais === $pais->idPais)
								<td>{{ $pais['nombrePais'] }}</td>		
							@endif
						@endforeach

						
						<td>
							<a href="/jugador/{{$jug->idJugador}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
							<a href="{{ route('jugador.destroy', $jug->idJugador)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el jugador?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>




@endsection