
@extends ('layouts.app')

@section ('titulo', 'Partidos')

@section ('content')


<div class="row  justify-content-center">
	
	<div class="col">
		@foreach($torneos as $tor) 
		<div class="">
			@if($tor->idConfederacion === NULL)
				<h3 class="row justify-content-center text-warning">{{ $tor['nombreTorneo'] }}</h3><!-- Muestra los torneos que hay -->
				@foreach($partidos as $part)

					@if($part->idTorneo === $tor->idTorneo)
					<div class="">
						<div class="row justify-content-center" >
							<div class="col-4 " align="right">	
								@foreach($clubes as $club)									
									@if($part->clubLocalPartido === $club->idClub)
									
										<a href="{{ route('club.show', $club->idClub)}}" class="text-light"><span>{{ $club['nombreClub'] }}</span>
										<img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:21px !important; height:21px !important"></a>
									@endif
								@endforeach
							</div>
							<div class="col-1 text-light" align="center">
								@if($part->estadoPartido === 'Proximo')
									<a href="{{ route('partido.show', $part->idPartido)}}" class="text-light"><span> {{ $part['horaPartido'] }}</span></a>
								@endif
								@if($part->estadoPartido === 'Suspendido')
									<!--<a href="{{ route('partido.show', $part->idPartido)}}" class="text-light">--><span> {{ $part['estadoPartido'] }}</span></a>	
								@endif				
								@if($part->estadoPartido === 'En curso')
									<!--<a href="{{ route('partido.show', $part->idPartido)}}" class="text-light">--><span>{{ $part['golesLocalPartido'] }} - {{ $part['golesVisitaPartido'] }}</span></a>
								@endif
								@if($part->estadoPartido === 'Expirado')
									<!--<a href="{{ route('partido.show', $part->idPartido)}}" class="text-light">--><span>{{ $part['golesLocalPartido'] }} - {{ $part['golesVisitaPartido'] }}</span></a>
								@endif
							</div>
							<div class="col-4 " align="left">	
								@foreach($clubes as $club)									
									@if($part->clubVisitaPartido === $club->idClub)
										<a href="{{ route('club.show', $club->idClub)}}" class="text-light"><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:21px !important; height:21px !important">
										<span>{{ $club['nombreClub'] }}</span></a>

									@endif
								@endforeach			
							</div>
						</div>	
						</div>				
					@endif
				@endforeach
			@endif	
			</div>
		<p></p>
		@endforeach	
	</div>


	<!--------------------BUSCADOR POR FECHA-----------------------------
	
			<div class="col-2">
				<label for="">Fecha</label>
					<input type="date" name="fecha" class="form-control">
					<a href="">Ver partidos</a>

			</div>
			------------->
	
</div>

<div>
	<div class="row justify-content-center text-warning">
		<h2> Torneos Internacionales </h2>
	</div>

	<div class="row justify-content-center" style="height:200px"> 
		<ul class="row justify-content-center" role="" style="width: 90px;"> 
			<li class="row justify-content-center"  role="" aria-hidden="" style="width: 200px; height: 90px; margin-right: 0px;"> 
				<a href="torneo" class="row justify-content-center" > 
					<img class="row justify-content-center" width="200" height="90" alt="UEFA" src="images/torneos/200px-Uefa_2013.png"> 
				</a> 
			</li>
		</ul>
	</div>
</div>
	

























































<!--------------------------------------------------------------------------------------------------------
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
												<a href="{{ route('partido.show', $part->idPartido)}}" class="btn btn-default text-dark"><h>{{$part->golesLocalPartido}} - </h><h>{{$part->golesVisitaPartido}}</h></a>

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
--->

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
-->


@endsection