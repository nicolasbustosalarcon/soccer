
@extends ('layouts.app')

@section ('titulo', 'Clubes')

@section ('content')
<!---------READ DEL LISTADO DE CLUBES----->
	<a href="/club/create" class="btn btn-default">Crear equipo</a>
	<!--<table class="table table-striped">
		@foreach($paises as $pais)
			<thead>
				<th><span>{{ $pais['nombrePais'] }}</span></th>
				<th><a href="{{ route('pais.index', $pais->idPais)}}"> >></a></th>
			</thead>
			<tbody>
				<td>
				@foreach($asociaciones as $asoc)
					@if($pais->idPais === $asoc->idPais)
						<thead>
							<th><span>{{ $asoc['nombreAsociacion'] }}</span></th>				
						</thead>
						<tbody>
							@foreach($clubes as $club)
								@if($asoc->idAsociacion === $club->idAsociacion)
								<div class="row border">
								<div class="col border">
								
									<td><span>{{ $club['nombreClub'] }}</span>
									<span><img src="images/club/{{ $club['imagenClub']}}" class="img-responsive" style="width:45px !important; height:45px !important"></span></td>
								
								</div>
								</div>
								@endif

							@endforeach
						</tbody>


					@endif

				@endforeach
				</td>
			</tbody>
		

		@endforeach







	</table>-->
	





<div class="col">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>País</th>
				<th>Fundación</th>
				<th>Imagen</th>
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($clubes as $club)
					<tr>
						<td>{{ $club['idClub'] }}</td>
						<td>{{ $club['nombreClub'] }}</td>


						@foreach($paises as $pais)
							@if($club->idPais === $pais->idPais)
								<td>{{ $pais['nombrePais'] }}</td>		
							@endif
						@endforeach


						<td>{{ $club->fundacionClub}}</td>
						<td><img src="images/club/{{ $club['imagenClub']}}" class="img-responsive" style="width:45px !important; height:45px !important"></td>
						<td>
							<a href="/club/{{$club->idClub}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
							<a href="{{ route('club.destroy', $club->idClub)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el club?')" class="btn btn-danger">Borrar</a>
							</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<!--@foreach($clubes as $club)
			<div class="col-sm">
	-----CARD PRESENTACION CLUB---
				<div class="card" style="width: 15rem;">
		  			<img class="card-img-top" src="imagenes/clubes/{{$club['imagenClub']}}" alt="Card image cap" >
		  			<div class="card-body">
						<h5 class="card-title"><p>{{ $club['nombreClub'] }}</p></h5>
			    		<p class="card-text">Fundación: {{ $club['fundacionClub'] }}</p>
			    		<p class="card-text">Correo: {{ $club['correoClub'] }}</p>
			    		<a href="#" class="btn btn-primary">Ver equipo</a>
			  		</div>
				</div>
			</div>
		@endforeach---->
	</div>

@endsection