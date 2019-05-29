
@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Edicion</th>
				<th>Organizador</th>
				<th>ID Club Campeon</th>
				
			</thead>
			<tbody>
				@foreach($torneos as $tor)
					@foreach($confederaciones as $conf)
						@if($tor->idConfederacion === $conf->idConfederacion)
						<tr>
							<td>{{ $tor['idTorneo'] }}</td>
							<td>{{ $tor['nombreTorneo'] }}</td>
							<td>{{ $tor['edicion'] }}</td>

							@foreach($confederaciones as $conf)
								@if($tor->idConfederacion === $conf->idConfederacion)
									<td>{{ $conf['nombreConfederacion'] }}</td>		
								@endif
							@endforeach
							<td>
							@foreach($clubes as $club)
								@if($tor->idClubCampeon === $club->idClub)
									{{ $club['nombreClub'] }}	
								@endif
							@endforeach	
							</td>
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
	<!DOCTYPE html>
	<html>
		<body>

			<audio controls>
  				<source src="HimnodelaUEFAChampionsLeague.ogg" type="audio/ogg">
  				<source src="HimnodelaUEFAChampionsLeague.mp3" type="audio/mpeg">
			</audio>
		</body>
	</html>





@endsection