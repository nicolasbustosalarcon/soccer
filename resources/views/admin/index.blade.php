
@extends ('layouts.app')

@section ('titulo', 'Partidos')


@section ('content')

<!---Buscador del Admin --
	<div class="row">
		<div class="col">
			<form class="form-inline my-2 my-lg-0" method="GET" action="/admin" enctype="multipart/form-data">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>	
      			
			</form>
		</div>
	</div>	

--- Fin Buscador del Admin --->

<div class="row">


<ul class="nav nav-tabs nav-pills flex-column " id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-white " id="arbitro-tab" data-toggle="tab" href="#arbitro" role="tab" aria-controls="arbitro" aria-selected="true">Arbitros</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="asociacion-tab" data-toggle="tab" href="#asociacion" role="tab" aria-controls="asociacion" aria-selected="false">Asociaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="ciudad-tab" data-toggle="tab" href="#ciudad" role="tab" aria-controls="ciudad" aria-selected="false">Ciudades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="club-tab" data-toggle="tab" href="#club" role="tab" aria-controls="club" aria-selected="false">Clubes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="confederacion-tab" data-toggle="tab" href="#confederacion" role="tab" aria-controls="confederacion" aria-selected="false">Confederaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="dt-tab" data-toggle="tab" href="#dt" role="tab" aria-controls="dt" aria-selected="false">Dts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="estadio-tab" data-toggle="tab" href="#estadio" role="tab" aria-controls="estadio" aria-selected="false">Estadios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="federacion-tab" data-toggle="tab" href="#federacion" role="tab" aria-controls="federacion" aria-selected="false">Federaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="jugador-tab" data-toggle="tab" href="#jugador" role="tab" aria-controls="jugador" aria-selected="false">Jugadores</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="pais-tab" data-toggle="tab" href="#pais" role="tab" aria-controls="pais" aria-selected="false">Paises</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="torneo-tab" data-toggle="tab" href="#torneo" role="tab" aria-controls="torneo" aria-selected="false">Torneos</a>
  </li>
  <!--<li class="nav-item">
    <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Users</a>
  </li>-->
  <li class="nav-item">
    <a class="nav-link text-white" id="partidos-tab" data-toggle="tab" href="#partidos" role="tab" aria-controls="partidos" aria-selected="false">Partidos</a>
  </li>
	</ul>


	<div class="col tab-content text-white" id="myTabContent">
  	<div class="tab-pane fade show active" id="arbitro" role="tabpanel" aria-labelledby="arbitro-tab">
  		<div class="row">
  			<div class="col">
  				<i class="fas fa-exclamation-square"></i>
  					<a href="/arbitro/create"  class="btn btn-outline-success">Crear Arbitro</a>



				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<!--<th>Imagen</th>-->
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Tipo</th>
						<th>Nacimiento</th>
						<th>Pais</th>
						<th>Edad</th>
						<th>Grado</th>
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($arbitros as $arb)
							<tr>
								<td>{{ $arb['idArbitro'] }}</td>

								<!--<td><img src="images/arbitro/{{ $arb['imagenArbitro']}}" class="img-responsive" style="width:45px !important; height:45px !important"></td>-->
								<td>{{ $arb['nombreArbitro'] }}</td>
								<td>{{ $arb['apellidosArbitro'] }}</td>
								<td>{{ $arb['tipoArbitro'] }}</td>
								<td>{{ $arb['nacimientoArbitro'] }}</td>

								@foreach($paises as $pais)
									@if($arb->idPais === $pais->idPais)
										<td>{{ $pais['nombrePais'] }}</td>		
									@endif
								@endforeach
							
								<td>{{ $arb['edadArbitro'] }}</td>
								<td>{{ $arb['gradoArbitro'] }}</td>

								<td>
									<div class="row"><a href="/arbitro/{{$arb->idArbitro}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench " aria-hidden="true"></span>Editar</a>
									<a href=""> .</a>
									<a href="{{ route('arbitro.destroy', $arb->idArbitro)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el árbitro?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a></div>

								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				

			</div>
		</div>
	</div>
  	
  	<div class="tab-pane fade" id="asociacion" role="tabpanel" aria-labelledby="asociacion-tab">
  		
		
		<div class="row">
			<div class="col">
				<a href="/asociacion/create" class="btn btn-outline-success my-2 my-sm-0"s><span class="glyphicon glyphicon-wrench"></span>Crear Asociación</a>
				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>Asociacion</th>
						<th>Fundación</th>
						<!--<th>Imagen</th>-->
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($asociaciones as $asoc)
							<tr>
								<td>{{ $asoc['idAsociacion'] }}</td>

								<!--@foreach($federaciones as $fed)
									@if($asoc->idFederacion === $fed->idFederacion)
										<td>{{ $fed['nombreFederacion'] }}</td>		
									@endif
								@endforeach-->

								<td>{{ $asoc['nombreAsociacion'] }}</td>
								<td>{{ $asoc['fundacionAsociacion'] }}</td>
								<!--<td><img src="images/asociacion/{{ $asoc['imagenAsociacion']}}" class="img-responsive" style="width:60px !important"></td>-->

								
								<td>
									<a href="/asociacion/{{$asoc->idAsociacion}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
									<a href="{{ route('asociacion.destroy', $asoc->idAsociacion)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la asociación?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>
  	</div>

  	<div class="tab-pane fade" id="ciudad" role="tabpanel" aria-labelledby="ciudad-tab">
  		
	
		<div class="row">
			<div class="col">
				<a href="/ciudad/create" class="btn btn-outline-success my-2 my-sm-0">Crear Ciudad</a>
				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>ID País</th>
						
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($ciudades as $ciu)
							<tr>
								<td>{{ $ciu['idCiudad'] }}</td>
								<td>{{ $ciu['nombreCiudad'] }}</td>

								@foreach($paises as $pais)
									@if($ciu->idPais === $pais->idPais)
										<td>{{ $pais['nombrePais'] }}</td>		
									@endif
								@endforeach
							
								


								
								<td>
									<a href="/ciudad/{{$ciu->idCiudad}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
									<a href="{{ route('ciudad.destroy', $ciu->idCiudad)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la ciudad?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="mx-auto" style="width: 130px">
                        {{ $ciudades->links() }} 
        </div>
				
			</div>
		</div>
  	</div>


	<div class="tab-pane fade" id="club" role="tabpanel" aria-labelledby="club-tab">
		<div class="col">
			<a href="/club/create" class="btn btn-outline-success my-2 my-sm-0">Crear equipo</a>
			<table class="table table-striped text-white">
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
								<a href="/club/{{$club->idClub}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
								<a href="{{ route('club.destroy', $club->idClub)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el club?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
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
		<div class="mx-auto" style="width: 130px">
                        {{ $clubes->links() }} 
        </div>
        <div class="row">
        	<div class="col">
        		<p>
        			
        		</p>
        	</div>
        </div>
        <div class="row">
        	<div class="col">
        		<p>
        			
        		</p>
        	</div>
        </div>
        <div class="row">
        	<div class="col">
        		<p>
        			
        		</p>
        	</div>
        </div>

	</div>
	

	<div class="tab-pane fade" id="confederacion" role="tabpanel" aria-labelledby="confederacion-tab">
	
		<div class="row">
			<div class="col">
				<a href="/confederacion/create" class="btn btn-outline-success my-2 my-sm-0">Crear Confederación</a>

				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>ID Continente</th>
						<th>Nombre</th>
						<th>Fundación</th>
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($confederaciones as $conf)
							<tr>
								<td>{{ $conf['idConfederacion'] }}</td>

								@foreach($continentes as $cont)
									@if($conf->idContinente === $cont->idContinente)
										<td>{{ $cont['nombreContinente'] }}</td>		
									@endif
								@endforeach

								<td>{{ $conf['nombreConfederacion'] }}</td>
								<td>{{ $conf['fundacionConfederacion'] }}</td>
								
								<td>
									<a href="/confederacion/{{$conf->idConfederacion}}/edit" class="btn btn-info my-2 my-sm-0">Editar<span class="glyphicon glyphicon-wrench"></span></a>
									<a href="{{ route('confederacion.destroy', $conf->idConfederacion)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la confederación?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="dt" role="tabpanel" aria-labelledby="dt-tab">
	
		<div class="row">
			<div class="col">
				<a href="/directortecnico/create" class="btn btn-outline-success my-2 my-sm-0">Crear Director Tecnico</a>

				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Nacimiento</th>
						<th>Edad</th>
						<th>Nacionalidad</th>


						
							
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($directorestecnicos as $dt)
							<tr>
								<td>{{ $dt['idDirectorTecnico'] }}</td>
								<td>{{ $dt['nombreDirectorTecnico'] }}</td>
								<td>{{ $dt['apellidosDirectorTecnico'] }}</td>
								<td>{{ $dt['nacimientoDirectorTecnico'] }}</td>
								<td>{{ $dt['edadDirectorTecnico'] }}</td>

								@foreach($paises as $pais)
									@if($dt->idPais === $pais->idPais)
										<td>{{ $pais['nombrePais'] }}</td>		
									@endif
								@endforeach
				


								
								<td>
									<a href="/directortecnico/{{$dt->idDirectorTecnico}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
									<a href="{{ route('directortecnico.destroy', $dt->idDirectorTecnico)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el DT?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="estadio" role="tabpanel" aria-labelledby="estadio-tab">
	
		<div class="row">
			<div class="col">
				<a href="/estadio/create" class="btn btn-outline-success my-2 my-sm-0">Crear Estadio</a>

				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>ID País</th>
						<th>ID Ciudad</th>
						<th>Inauguración</th>
						<th>Capacidad</th>
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($estadios as $est)
							<tr>
								<td>{{ $est['idEstadio'] }}</td>
								<td>{{ $est['nombreEstadio'] }}</td>

								@foreach($paises as $pais)
									@if($est->idPais === $pais->idPais)
										<td>{{ $pais['nombrePais'] }}</td>		
									@endif
								@endforeach
								
								@foreach($ciudades as $ciu)
									@if($est->idCiudad === $ciu->idCiudad)
										<td>{{ $ciu['nombreCiudad'] }}</td>		
									@endif
								@endforeach
								

								<td>{{ $est['inauguracionEstadio'] }}</td>
								<td>{{ $est['capacidadEstadio'] }} personas</td>


								
								<td>
									<a href="/estadio/{{$est->idEstadio}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
									<a href="{{ route('estadio.destroy', $est->idEstadio)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el estadio?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="federacion" role="tabpanel" aria-labelledby="federacion-tab">
	
		<div class="row">
			<div class="col">
				<a href="/federacion/create" class="btn btn-outline-success my-2 my-sm-0">Crear Federación</a>

				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>Confederacion</th>
						<th>Nombre</th>
						<th>Fundación</th>
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($federaciones as $fed)
							<tr>
								<td>{{ $fed['idFederacion'] }}</td>

								@foreach($confederaciones as $conf)
									@if($fed->idConfederacion === $conf->idConfederacion)
										<td>{{ $conf['nombreConfederacion'] }}</td>		
									@endif
								@endforeach
							
								<td>{{ $fed['nombreFederacion'] }}</td>
								<td>{{ $fed['fundacionFederacion'] }}</td>
								
								<td>
									<a href="/federacion/{{$fed->idFederacion}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
									<a href="{{ route('federacion.destroy', $fed->idFederacion)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la federación?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="jugador" role="tabpanel" aria-labelledby="jugador-tab">
		
		<div class="row">
			<div class="col">
				<a href="/jugador/create" class="btn btn-outline-success my-2 my-sm-0">Crear Jugador</a>

				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Nacimiento</th>
						
						<th>Posición</th>
						<th>Altura</th>
						<th>Peso</th>
						<th>Club</th>
						<!--<th>Goles</th>
						<th>Amarillas</th>
						<th>Rojas</th>
						<th>Minutos</th>-->
						<th>Pais</th>							
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($jugadores as $jug)
							<tr>
								<td>{{ $jug['idJugador'] }}</td>
								
								
								<td>{{ $jug['nombreJugador'] }}</td>
								<td>{{ $jug['apellidosJugador'] }}</td>
								<td>{{ $jug['nacimientoJugador'] }}({{ $jug['edadJugador'] }})</td>
								<td>{{ $jug['posicionJugador'] }}</td>
								<td>{{ $jug['alturaJugador'] }}</td>
								<td>{{ $jug['pesoJugador'] }}</td>
								@foreach($clubes as $club)
									@if($jug->idClub === $club->idClub)
										<td>{{ $club['nombreClub'] }}</td>
									@endif
								@endforeach
								
								<!--<td>{{ $jug['golesJugador'] }}</td>
								<td>{{ $jug['amarillasJugador'] }}</td>
								<td>{{ $jug['rojasJugador'] }}</td>
								<td>{{ $jug['minutostotalesJugador'] }}</td>-->
								@foreach($paises as $pais)
									@if($jug->idPais === $pais->idPais)
										<td>{{ $pais['nombrePais'] }}</td>		
									@endif
								@endforeach

								
								<td>
									<div class="row">
									<a href="/jugador/{{$jug->idJugador}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>								
									<a href="{{ route('jugador.destroy', $jug->idJugador)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el jugador?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
									</div>
								<td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="mx-auto" style="width: 130px">
                        {{ $jugadores->links() }} 
        		</div>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="pais" role="tabpanel" aria-labelledby="pais-tab">
		<div class="row">
			<div class="col">
				<a href="/pais/create" class="btn btn-outline-success my-2 my-sm-0">Añadir nuevo País...</a>

					<table class="table table-striped text-white">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Continente</th>
							
							
							<th>Acción</th>
							
						</thead>
						<tbody>
							@foreach($paises as $pais)
								<tr>
									<td>{{ $pais['idPais'] }}</td>
									<td>{{ $pais['nombrePais'] }}</td>

									@foreach($continentes as $cont)
										@if($pais->idContinente === $cont->idContinente)
											<td>{{ $cont['nombreContinente'] }}</td>		
										@endif
									@endforeach
									
	    			
									
									<td>
										<a href="/pais/{{$pais->idPais}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
										<a href="{{ route('pais.destroy', $pais->idPais)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el país?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

			
			</div>		
		</div>
	</div>

	<div class="tab-pane fade" id="torneo" role="tabpanel" aria-labelledby="torneo-tab">
	
		<div class="row">
			<div class="col">
				<a href="/torneo/create" class="btn btn-outline-success my-2 my-sm-0">Crear Torneo</a>

				<table class="table table-striped text-white">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Edicion</th>
						<th>Organizador</th>
						<th>ID Club Campeon</th>						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($torneos as $tor)
							<tr>
								<td>{{ $tor['idTorneo'] }}</td>
								<td>{{ $tor['nombreTorneo'] }}</td>
								<td>{{ $tor['edicion'] }}</td>

								@foreach($confederaciones as $conf)
									@if($tor->idConfederacion === $conf->idConfederacion)
										<td>{{ $conf['nombreConfederacion'] }}</td>		
									@endif
								@endforeach
								@if($tor->idConfederacion === null)
									@foreach($asociaciones as $asoc)
									@if($tor->idAsociacion === $asoc->idAsociacion)
										<td>{{ $asoc['nombreAsociacion'] }}</td>		
									@endif
								@endforeach
								@endif
								@if($tor->idClubCampeon === null)
							    <td>Aun no está definido</td>
							    @endif
								
								@foreach($clubes as $club)
									@if($tor->idClubCampeon === $club->idClub)
										<td>{{ $club['nombreClub'] }}</td>	
									@endif
								@endforeach	
									

								
								<td>
									<a href="/torneo/{{$tor->idTorneo}}/edit" class="btn btn-info my-2 my-sm-0">Editar<span class="glyphicon glyphicon-wrench"></span></a>
									<a href="{{ route('torneo.destroy', $tor->idTorneo)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el Torneo?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
	
		<div class="row">
			<div class="col">
				<a href="/user/create" class="btn btn-outline-success my-2 my-sm-0">Crear Usuarios</a>
	
	<div class="row">
		<table class="table table-striped text-white">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Tipo</th>				
				<th>Acción</th>				
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user['id'] }}</td>
						<td>{{ $user['name'] }}</td>
						<td>{{ $user['email'] }}</td>
						<td>{{ $user->tipo}}</td>
						<td>
							<a href="/user/{{$user->id}}/edit" class="btn btn-info my-2 my-sm-0">Editar</a>			
							<a href="{{ route('user.destroy', $user->id)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el usuario?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>	
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="partidos" role="tabpanel" aria-labelledby="partidos-tab">
	
		<div class="row">
			<div class="col">
				<a href="/partido/create" class="btn btn-outline-success my-2 my-sm-0">Añadir partido</a>
	
	<div class="row">
		<table class="table table-striped text-white">
			<thead>
				<th>ID</th>	
				<th>Equipo Local</th>	
				<th>Equipo Visitante</th>
				<th>Campeonato</th>	
				<th>Acción</th>	
			</thead>
			<tbody>
				@foreach($partido as $parti)
					<tr>
						<td>{{$parti['idPartido']}}</td>
						@foreach($clubes as $club)
							@if($parti->clubLocalPartido === $club->idClub)
								<td>{{ $club['nombreClub'] }}</td>
							@endif
						@endforeach
						@foreach($clubes as $club)
							@if($club->idClub === $parti->clubVisitaPartido)
								<td>{{ $club['nombreClub'] }}</td>
							@endif
						@endforeach
						@foreach($torneos as $tor)
							@if($tor->idTorneo === $parti->idTorneo)
								<td>{{ $tor['nombreTorneo'] }}</td>
							@endif
						@endforeach
						<td>
							<a href="/partido/{{$parti->idPartido}}/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
						</td>
						<td>
							<a href="{{ route('partido.destroy', $parti->idPartido)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el partido?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="mx-auto" style="width: 130px">
                        {{ $partido->links() }} 
        </div>
	</div>

			</div>
		</div>
	</div>
</div>
</div>
@endsection