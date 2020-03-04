
@extends ('layouts.app')

@section ('titulo', 'Hisotiral create' .$partidos->idPartido) <!--CAMBIAR TITULO-->

@section ('content')


<!-- FONDO FOTO -->
<div class="row">
	<div class="col">
		<div class="card bg-dark text-white">
  			<img class="card-img" src="{{asset('images/torneos/fondo.png')}}" alt="Card image" height="180">
  			<div class="card-img-overlay">
	    		<div class="card-text">
	    			<div class="row">
						@foreach($torneos as $tor)
							@if($partidos->idTorneo === $tor->idTorneo)
								<div class="mx-auto text-light font-weight-bold">{{ $tor['nombreTorneo'] }}</div>
							@endif
						@endforeach
					</div>
	    			<div class="row justify-content-center">
						<!--Equipo Local-->
						@foreach($clubes as $club)
							@if (strcmp($partidos->clubLocalPartido, $club->idClub) === 0)
								<div class="col-3 text-center">
									<div>
					       			 <a href="{{ route('club.show', $club->idClub)}}" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="90" height="90"><p class="text-light font-weight-bold"> {{ $club['nombreClub'] }}</p></a>
					    			</div>
								</div>
							@endif
						@endforeach
						<!----------------->

						<!--Marcador-->
						<div class="col-3 text-center">
							<div class="row"   style="height:45px;">
								<div class="col align-self-end">
									<span class="text-light font-weight-bold">{{ $dia }}/{{ $mes }}</span>
								</div>
							</div>
							<div class="row" style="height:30px;">
								<div class="col align-self-center">
									<h3 class="text-light font-weight-bold">{{ $partidos['golesLocalPartido'] }}-{{ $partidos['golesVisitaPartido'] }}</h3>
								</div>
							</div>
							<div class="row" style="height:45px;">
								<div class="col align-self-start">
									<button type="button" class="btn btn-sm btn-primary text-dark" disabled>{{$partidos['estadoPartido']}}</button>
								</div>
							</div>
						</div>
						<!----------------->

						<!--Equipo Visita-->
						@foreach($clubes as $club)	
							@if($partidos->clubVisitaPartido === $club->idClub)
								<div class="col-3 text-center">
									<div>
							        <a href="{{ route('club.show', $club->idClub)}}" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="90" height="90"><p class="text-light font-weight-bold"> {{ $club['nombreClub'] }}</p></a>
							    </div>
								</div>
							@endif
						@endforeach
					</div>



				</div>
  			</div>
		</div>
	</div>
</div>
<!--------------------->                        	
<p></p>

<div class="col">
    <div class="row">
    	@foreach($plantilla as $plan)
		@if($plan->idPartido === $partidos->idPartido)
            <div class="card" style="width: 11rem;">
					<img class="card-img-top" src="{{asset('images/jugador/' .$plan->imagenJugador)}}" alt="Card image cap">
					<div class="card-body">
					<h5 class="card-title">{{$plan->nombreJugador}} {{$plan->apellidosJugador}}</h5>
					<div class="form-check">
  					<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  					<label class="form-check-label" for="defaultCheck1">
   						Tarjeta Amarilla 
  					</label>
  					<p></p>
  					<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  					<label class="form-check-label" for="defaultCheck1">
   						Tarjeta Roja
  					</label>
  					<p></p>
					</div>
					<a href="#" type="submit" class="btn btn-primary">Estadísticas</a>
					</div>
			</div>
			<div class=""></div>
			<p></p>
        @endif
		@endforeach
    </div>
</div>

<p></p>


												    			
																    				
																		    			
																		    			
														

@endsection