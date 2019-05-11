
@extends ('layouts.app')

@section ('titulo', 'Partidos')

@section ('content')

<div class="row border justify-content-center">
	
	<div class="col">
		@foreach($torneos as $tor) 
			<h3>{{ $tor['nombreTorneo'] }} </h3><!-- Muestra los torneos que hay -->
			@foreach($partidos as $part)
				@if($part->idTorneo === $tor->idTorneo)
					@if($part->fechaPartido === $fecha)	<!--Se muestran solo los partidos de hoy-->
						<div class="row justify-content-center" >
							<div class="col-4 border" align="right">	
								@foreach($clubes as $club)									
									@if($part->clubLocalPartido === $club->idClub)
									
										<a href="{{ route('club.show', $club->idClub)}}" class="text-dark"><span>{{ $club['nombreClub'] }}</span>
										<img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:21px !important; height:21px !important"></a>
									@endif
								@endforeach
							</div>
							<div class="col-1 border" align="center">
								@if($part->estadoPartido === 'Proximo')
									<a href="{{ route('partido.show', $part->idPartido)}}" class="text-dark"><span> {{ $part['horaPartido'] }}</span></a>
								@endif
								@if($part->estadoPartido === 'Suspendido')
									<a href="{{ route('partido.show', $part->idPartido)}}" class="text-dark"><span> {{ $part['estadoPartido'] }}</span></a>	
								@endif				
								@if($part->estadoPartido === 'En curso')
									<a href="{{ route('partido.show', $part->idPartido)}}" class="text-dark"><span>{{ $part['golesLocalPartido'] }} - {{ $part['golesVisitaPartido'] }}</span></a>
								@endif
								@if($part->estadoPartido === 'Expirado')
									<a href="{{ route('partido.show', $part->idPartido)}}" class="text-dark"><span>{{ $part['golesLocalPartido'] }} - {{ $part['golesVisitaPartido'] }}</span></a>
								@endif
							</div>
							<div class="col-4 border" align="left">	
								@foreach($clubes as $club)									
									@if($part->clubVisitaPartido === $club->idClub)
										<a href="{{ route('club.show', $club->idClub)}}" class="text-dark"><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:21px !important; height:21px !important">
										<span>{{ $club['nombreClub'] }}</span></a>

									@endif
								@endforeach			
							</div>

						</div>
					@endif
				@endif
			@endforeach	
		@endforeach	
	</div>

	<!--------------------BUSCADOR POR FECHA------------------------------>
	<form class="form-group" method="GET" action="/partido/">
		@csrf
		<div class="form-group">
			<div class="col">
				<label for="">Fecha</label>
					<input type="date" name="fecha" class="form-control">
					<button type="submit" class="btn btn-primary">Ver Partidos</button>

			</div>
		</div>
	</form>


</div>
