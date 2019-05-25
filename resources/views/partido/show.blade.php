
@extends ('layouts.app')

@section ('titulo', 'Partidos' .$partidos->idPartido)

@section ('content')
		<div class="row border justify-content-center">
			@foreach($clubes as $club)
				@if (strcmp($partidos->clubLocalPartido, $club->idClub) === 0)

					<div class="col-4">
		

						<p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:90px !important; height:90px !important"></td> {{ $club['nombreClub'] }}</p>
					</div>
				@endif
			@endforeach
					<div class="col-2 align-self-center">
						<p> <h3>{{ $partidos['golesLocalPartido'] }} - {{ $partidos['golesVisitaPartido'] }}</h3></p>
					</div>
			@foreach($clubes as $club)	
				@if($partidos->clubVisitaPartido === $club->idClub)
					<div class="col-4">
						<p>{{ $club['nombreClub'] }} <td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:90px !important; height:90px !important"></td></p>
						
					</div>
				@endif
			@endforeach
		
		</div>

		<div class="row border justify-content-center">
			<h1>INFO</h1>
			<div class="col">
				@foreach($torneos as $tor)
					@foreach($estadios as $est)
						@if (strcmp($partidos->idTorneo, $tor->idTorneo) === 0)
							@if (strcmp($partidos->idEstadio, $est->idEstadio) === 0)

								<p><a href="{{ route('torneo.show', $tor->idTorneo)}}" class="text-dark"><span class="row align-self-center"> <p> Competición {{ $tor['nombreTorneo'] }}</p></span></a></p>
								
								
								<p> Fecha {{ $partidos['fechaPartido'] }}</p>
								<p> Hora {{ $partidos['horaPartido'] }}</p>

								<p><a href="{{ route('estadio.show', $est->idEstadio)}}" class="text-dark"><span class="row align-self-center"> <p>Estadio {{ $est['nombreEstadio'] }}</p></span></a></p>
								<p> Estado {{ $partidos['estadoPartido'] }}</p>
						@endif
						@endif
					@endforeach
				@endforeach

			</div>
		</div>



	@if(($partidos->estadoPartido != 'Suspendido')) <!-- Valida para que crear plantilla de jugadores del partido-->
		<div class="row">
			<div class="col">
				<!----------- SOLO LE MUESTRA ESTA PARTE A LOS USUARIOS DE TIPO admin ---------------->
				@if(auth()->user()->authorizeRolesLogin('admin')) 
					<!--<form class="form-group" method="POST" action="/historial/{{$partidos->idPartido}}/create" enctype="multipart/form-data">	
						
    					<select name="idPartido" class="form-control">
    				<option disabled selected value>{{$partidos['idPartido']}}</option>
    				
    			</select>-->
							<a href="{{ route('historial.create', $partidos->idPartido)}}" class="btn btn-default">Ingresar Jugador a plantilla</a>

							<!--<button type="submit" class="btn btn-primary">Crear Plantillas</button>-->


						

                	</form>

				@endif
				<!------------------------------------------------------------------------------------>

			</div>
		</div>		


	@endif
	
	@if(($partidos->estadoPartido != 'Suspendido')) <!-- Valida para que no se muestren jugadores si se suspendió el partido-->
		<div class="row border justify-content-center">

			<h1>Plantillas</h1>
			</div>
			<div class="col">
				<div class="row">

					<!------------Plantilla Local------------------------>

					<div class="col-5" align="left">
						
							@foreach($plantilla as $plan)
								@if($partidos->idPartido === $plan->idPartido)
									@if($plan->idClub === $partidos->clubLocalPartido)
									
								<p>{{$plan->camisetaJugador}} - {{$plan->nombreJugador}} {{$plan->apellidosJugador}}</p>
									@endif
								@endif
							@endforeach
					

					</div>
					<!----------------------------------------------------->

									
					<!-----------Plantilla Visita--------------------------->
					<div class="col-5 " align="right">

						@foreach($plantilla as $plan)
								@if($partidos->idPartido === $plan->idPartido)
									@if($plan->idClub === $partidos->clubVisitaPartido)
									
								<p>{{$plan->camisetaJugador}} - {{$plan->nombreJugador}} {{$plan->apellidosJugador}}</p>
									@endif
								@endif
							@endforeach

					</div>
					<!----------------------------------------------------->

				</div>
			</div>
	@endif
		
	

@endsection