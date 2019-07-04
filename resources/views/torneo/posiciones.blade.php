@extends ('layouts.app')


@section ('content')

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
					$contador = 1
					?>
				@foreach($posiciones as $pos)
					@foreach($clubes as $club)
						@if($club->idClub === $pos->idClub)
							@if($contador == 1)						
							    <tr class="table-success">
							@endif
							@if($contador == 2 || $contador == 3)
							    <tr class="table-warning">
							@endif
								<th scope="row">{{$contador}}</th>
								<td><strong><a href="{{ route('club.show', $pos->idClub)}}" class="text-dark"><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:25px !important; height:25px !important"> {{ $club->nombreClub }}</td></a></strong>
								<td>{{ $pos->PG+$pos->PE+$pos->PP }}</td>
								<td>{{ $pos->PG}}</td>
								<td>{{ $pos->PE}}</td>
								<td>{{ $pos->PP}}</td>
								<td>{{ $pos->GolesFavor}}</td>
								<td>{{ $pos->GolesContra}}</td>
								<td>{{ $pos->Diferencia}}</td>
								<td>{{ $pos->Puntos}}</td>
								<?php 
									$contador=$contador + 1;
								 ?>
							</tr>
						@endif
					@endforeach			    
				@endforeach
				    		
			
				</tbody>
		</table>
		@if($torneos->idTorneo === 1)
			<div class="col">
				<div class="row">
					<div class="alert alert-success">Campeón y CHILE 1: clasifica directo a CONMEBOL Libertadores</div>				
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="alert alert-warning">CHILE 2 y 3: clasifica directo a CONMEBOL Libertadores</div>				
				</div>
			</div>
		@endif
		<div class="row">
            <div class="col">
                <a href="../{{($torneos->idTorneo)}}/show"><button class='btn btn-danger'>Atrás</button></a>
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