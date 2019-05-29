
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
	<iframe width="1100" height="5" src="https://www.youtube.com/embed/UbjnIJ4LB30?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</html>
@endsection