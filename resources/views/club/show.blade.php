
@extends ('layouts.app')

@section ('titulo', 'Clubes' .$clubes->idClub)

@section ('content')
		
		<div class="row">
			<div class="col">
				<p> 
					<h1 class="float-sm-left">{{ $clubes['nombreClub'] }}</h1>
					<img src="{{asset('images/club/' .$clubes->imagenClub)}}" class="img-responsive float-sm-right" style="width:90px !important; height:90px !important">
				</p>
			</div>
		</div>
		<div class="col">
			<p></p>
			<p> Fundación {{ $clubes['fundacionClub'] }}</p>
			

			<p> Sede {{ $clubes['sedeClub'] }}, 
				@foreach($ciudades as $ciu)
					@if($clubes->idCiudad === $ciu->idCiudad)
						{{ $ciu['nombreCiudad'] }},
					@endif
				@endforeach
				@foreach($paises as $pais)
					@if($clubes->idPais === $pais->idPais)
						{{ $pais['nombrePais'] }}
					@endif
				@endforeach
			</p>


			
			<p> Contacto {{ $clubes['correoClub'] }} // {{ $clubes['telefonoClub'] }} </p>
		</div>

		<div class="row">
			<div class="col">
				<p><h3 class="float-sm-left">Estadio</h3></p>
			</div>
		</div>
		
		<div class="col">
			@foreach($estadios as $est)
				@if($clubes->idEstadio === $est->idEstadio)
				<a href="{{ route('estadio.show', $est->idEstadio)}}" class="text-dark"><span class="row align-self-center"> <p>Nombre {{ $est['nombreEstadio'] }}</p></span></a>
				@endif
			@endforeach		
			
		</div>
		
		<div class="row">
			<div class="col">
				<p><h3 class="float-sm-left">Plantilla</h3></p>
			</div>
		</div>

		<div class="col">
			<div class="row" style="height: 100px"> 
				@foreach($jugadores as $jug)
				@if($jug->idClub === $clubes->idClub)
						@if($jug->posicionJugador === 'Arquero')
							<div class="row">
								<div class="col">
									<h5>Arqueros</h5>
								</div>
							</div>
							<div class="row">
								<div class="col align-self-center">
									<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" class="img-responsive float-sm-left" style="width:90px !important; height:90px !important">
							
									<a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-dark"><span class="row align-self-center">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</span></a>
								</div>

							</div>
						@endif

						@if($jug->posicionJugador === 'Defensa')
							<div class="row">
								<div class="col">
									<h5>Defensas</h5>
								</div>
							</div>
							<div class="row">
								<div class="col align-self-center">
									<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" class="img-responsive float-sm-left" style="width:90px !important; height:90px !important">
							
									<a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-dark"><span class="row align-self-center">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</span></a>
								</div>

							</div>
						@endif						

						@if($jug->posicionJugador === 'Mediocampista')
							<div class="row">
								<div class="col">
									<h5>Mediocampistas</h5>
								</div>
							</div>
							<div class="row">
								<div class="col align-self-center">
									<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" class="img-responsive float-sm-left" style="width:90px !important; height:90px !important">
							
									<a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-dark"><span class="row align-self-center">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</span></a>
								</div>

							</div>
						@endif

						@if($jug->posicionJugador === 'Delantero')
							<div class="row">
								<div class="col">
									<h5>Delanteros</h5>
								</div>
							</div>
							<div class="row">
								<div class="col align-self-center">
									<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" class="img-responsive float-sm-left" style="width:90px !important; height:90px !important">
							
									<a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-dark"><span class="row align-self-center">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</span></a>
								</div>

							</div>
						@endif
				@endif
			@endforeach
			</div>
		</div>
		
					

			

		

@endsection