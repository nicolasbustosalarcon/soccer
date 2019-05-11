
@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')
	<a href="/torneo/create" class="btn btn-default">Crear Torneo</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Edicion</th>
				<th>Organizador</th>
				<th>ID Club Campeon</th>


				
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($torneos as $tor)
					<tr>
						<td>{{ $tor['idTorneo'] }}</td>
						<td>{{ $tor['nombreTorneo'] }}</td>
						<td>{{ $tor['edicion'] }}</td>

						@foreach($confederaciones as $conf)
							@if($tor->idConfederacion === $conf->idConfederacion)
								<td>{{ $conf['nombreConfederacion'] }}</td>		
							@endif
						@endforeach
						@foreach($asociaciones as $asoc)
							@if($tor->idAsociacion === $asoc->idAsociacion)
								<td>{{ $asoc['nombreAsociacion'] }}</td>		
							@endif
						@endforeach
						<td>
						@foreach($clubes as $club)
							@if($tor->idClubCampeon === $club->idClub)
								{{ $club['nombreClub'] }}	
							@endif
						@endforeach	
						</td>	

						
						<td>
							<a href="/torneo/{{$tor->idTorneo}}/edit" class="btn btn-warning">Editar<span class="glyphicon glyphicon-wrench"></span></a>
							<a href="{{ route('torneo.destroy', $tor->idTorneo)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el Torneo?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>




@endsection