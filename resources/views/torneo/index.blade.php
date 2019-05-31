
@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')
<!DOCTYPE html>
	<html>
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Edicion</th>
				<th>Organizador</th>
				<th>Club Campeon</th>
				
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
							
							@if($tor->idClubCampeon === null)
							    <td>Aun no está definido</td>
							@endif
							@foreach($clubes as $club)
								@if($tor->idClubCampeon === $club->idClub)
									<td>{{ $club['nombreClub'] }}</td>
								@endif
							@endforeach	
							
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
	<iframe width="1100" height="0.1" src="https://www.youtube.com/embed/UbjnIJ4LB30?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</html>
@endsection