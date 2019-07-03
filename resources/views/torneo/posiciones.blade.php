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
								<td>{{ $pos->Puntos}}</td>
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