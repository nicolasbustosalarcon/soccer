
@extends ('layouts.app')

@section ('titulo', 'Torneo' .$torneos->idTorneo)

@section ('content')

	<div class="row">
		<div class="col  text-white">
			<h1>Información</h1>
		</div>
	</div>

	<div class="row">
		<div class="col  text-white">
			<p><b>Nombre Torneo: </b> <img src="{{asset('images/torneos/' .$torneos->imagenTorneo)}}" class="img-responsive" style="width:90px !important; height:35px !important">  {{$torneos->nombreTorneo}} </p>
			<p><b>Edición: </b>{{$torneos->edicion}}</p>
		</div>
	</div>

	<div class="row  text-white">
		<div class="col  text-white">
			<h2>Clubes Participantes</h2>

		</div>
	</div>
	<div class="row  text-white">
		<div class="col  text-white">
			
					<table>
						<thead>
							
						</thead>
						<tr>@foreach($clubes as $club)
								@if($club->idTorneo === $torneos->idTorneo)
						<tbody>
							<div>
								<img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:25px !important; height:25px !important">
                                <a href="{{ route('club.show', $club->idClub)}}" class="text-white">
                                    <span>{{ $club->nombreClub}}</span>
                                    
                                </a>
                            </div>
								
						</tbody>
								@endif
							@endforeach
							</tr>
					</table>
					<div>
						@if($torneos->idTorneo != 5)
							<p></p>
								<a href="{{ route('torneo.posicion', $torneos->idTorneo)}}"><button class="btn-lg btn-success">Ver Tabla de Posiciones</button></a>
								<div><a href="http://www.anfp.cl/programacion"><button class="btn-info btn-xs">Ver Página oficial ANFP <img class="float-center" src="https://vignette.wikia.nocookie.net/logopedia/images/1/1a/Logocampeonatoplanvital.png/revision/latest/scale-to-width-down/340?cb=20190420184345" style="width:20px !important; height:20px !important"></button></a></div>
							<p>	</p>
						@endif
					</div>
				
		</div>

	</div>

	<div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>
            
	


@endsection