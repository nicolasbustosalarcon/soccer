
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
			<p><b>Nombre Torneo</b> 	{{$torneos->nombreTorneo}} </p>
			<p><b>Edición</b> 			{{$torneos->edicion}}</p>
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
						@foreach($clubes as $club)
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
					</table>
				
		</div>

	</div>
	<div><p>
		
	</p></div>
	<div class="row text-white">
		<div class="col">
			<h2>  Tabla de Posiciones</h2>
		</div>
	</div>
			<table class="table table-hover bg-white">
				<thead>
				    <tr>
						<th scope="col">Posición</th>
				      	<th scope="col">Equipo</th>
				      	<th scope="col">PJ</th>
				      	<th scope="col">PG</th>
				      	<th scope="col">PE</th>
				      	<th scope="col">PP</th>
				      	<th scope="col">GF</th>
				      	<th scope="col">GC</th>
				      	<th scope="col">DIF</th>
				      	<th scope="col">Puntos</th>
				    </tr>
				</thead>
				<tbody>
				<?php 
					$contador=1;
				?>

				@foreach($posiciones as $pos)
					@foreach($clubes as $club)
						@if($club->idClub === $pos->idClub)
						    <tr class="table-success">
								<th scope="row">{{$contador}}</th>
								<td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:25px !important; height:25px !important">{{ $club->nombreClub }}</td>
								<td>{{ $pos->PG+$pos->PE+$pos->PP }}</td>
								<td>{{ $pos->PG}}</td>
								<td>{{ $pos->PE}}</td>
								<td>{{ $pos->PP}}</td>
								<td>{{ $pos->GolesFavor}}</td>
								<td>{{ $pos->GolesContra}}</td>
								<td>{{ $pos->GolesFavor-$pos->GolesContra}}</td>
								<td>{{ ($pos->PG*3)+($pos->PE)}}</td>
								<?php 
									$contador=$contador + 1;
								?>
						@endif
					@endforeach			    
				@endforeach
				    		</tr>
				   
				  </tbody>
		</table>


@endsection