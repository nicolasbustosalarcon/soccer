
@extends ('layouts.app')

@section ('titulo', 'Partidos')

@section ('content')
	<a href="/partido/create" class="btn btn-default">Crear Partido</a>
		<div class="row">
			<table class="table table-striped">

				@foreach($torneos as $tor)
					
						<thead>
							<th><span>{{ $tor['nombreTorneo'] }}</span></th>
							<th><a href="{{ route('torneo.index', $tor->idTorneo)}}"> >></a></th>
						</thead>
					
				<tbody>
					<tr>
						<td>
							@foreach($partidos as $part)
								@foreach($clubes as $club)
									@if($tor->idTorneo === $part->idTorneo)
										@if((strcmp($club->idClub, $part->clubLocalPartido) === 0))
										
										
											<div class="col">
										 		<a href="{{ route('club.index', $club->idClub)}}" class="card-link" data-toggle="collapse show" data-parent="#acordion">{{$club->nombreClub}}</a>
										@endif
										@if($part->clubVisitaPartido === $club->idClub)
												<a href="" class="btn btn-default text-dark"><h>{{$part->golesLocalPartido}} - </h><h>{{$part->golesVisitaPartido}}</h></a>

										 	<a href="{{ route('club.index', $club->idClub)}}" class="card-link" data-toggle="collapse show" data-parent="#acordion" title="{{$part->clubVisitaPartido}}{{$club->nombreClub}}">{{$club->nombreClub}}</a>	
										 	</div>
										@endif
										
									@endif
								@endforeach					
							
						</td>
						<td>
							<a href="/partido/{{$part->idPartido}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
							<a href="{{ route('partido.destroy', $part->idPartido)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el partido?')" class="btn btn-danger">Eliminar</a>
						</td>
							@endforeach
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>


<!------------------------------------------------------------>


<!--

	<div class="row">
		<div class="col align-self-center">
			<ul class="list-group">
				@foreach($partidos as $part)
					@if($clubes===1)
					<a href=""></a>




					@endif
				@endforeach




















					@foreach($partidos as $part)
						@foreach($clubes as $club)
							@if($part->clubLocalPartido === $club->idClub) 

								<div id="acordion"> 
									<div class="card-header">
										<div class="col">
									 	<a href="{{ route('club.index', $club->idClub)}}" class="card-link" data-toggle="collapse show" data-parent="#acordion">{{$club->nombreClub}}</a>
									<a href="/partido/create" class="btn btn-default text-dark">
										<h>{{$part->golesLocalPartido}} -</h>	
							
							
																<h>{{$part->golesVisitaPartido}}</h>
									</a>
									 	<a href="{{ route('club.index', $club->idClub)}}" class="card-link" data-toggle="collapse show" data-parent="#acordion">{{$part->clubVisitaPartido}}</a>	


									 	</div>
									 	
									</div>
								</div>
							@endif
						@endforeach
					@endforeach	
				</ul>
			</ul>
		</div>		
	</div>



@endsection