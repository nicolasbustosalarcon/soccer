
@extends ('layouts.app')

@section ('titulo', 'Clubes' .$clubes->idClub)

@section ('content')

<div class="row">
	<div class="col">
		<div class="card bg-dark text-white">
  			<img class="card-img" src="https://image.freepik.com/vector-gratis/luces-estadio-sobre-fondo-oscuro_57258-298.jpg" alt="Card image" height="">
  			<div class="card-img-overlay">
  				<a href="{{ route('imprimir.reporte_club', $clubes->idClub)}}" class="btn btn-outline-success my-2 my-sm-0">Generar reporte</a>
	    		<div class="card-text">
	    			<div class="row">
	    				<div class="col">
						<h1 class="mx-auto text-light font-weight-bold text-center">{{ $clubes['nombreClub'] }}</h1>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p></p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p></p>
						</div>
					</div>
					<div class="row text-center">
						<div class="col">
							<img src="{{asset('images/club/' .$clubes->imagenClub)}}" class="img-responsive float-sm text-center" style="width:240px !important; height:240px !important">
						</div>
					</div>

				
				<div class="row">
					<p></p>
					<p></p>
				</div>

				<div class="row">
					<div class="col">
						<ul class="nav nav-tabs nav-fill bg-light" id="pills-tab" role="tablist">
						  	<li class="nav-item bg-primary">
						    	<a class="nav-link active text-dark" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><strong>DATOS CLUB  <img src="https://image.flaticon.com/icons/png/512/30/30412.png" style="width:20px !important; height:20px !important"></strong></a>
						    </li>
							<li class="nav-item bg-primary">
						    	<a class="nav-link text-dark" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><strong>PLANTILLA  <img src="https://images.vexels.com/media/users/3/131311/isolated/preview/ddb0839875ea889d53eae4c5afd77b37-silueta-de-jugador-de-f-tbol-masculino-by-vexels.png" style="width:20px !important; height:20px !important"></strong></a>
							</li>
							<li class="nav-item bg-primary">
						    	<a class="nav-link text-dark" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><strong>PARTIDOS  <img src="https://cdn.pixabay.com/photo/2014/04/03/10/11/soccer-ball-310065_960_720.png" style="width:20px !important; height:20px !important"></strong></a>
						  	</li>
						</ul>
				
						<div class="tab-content" id="pills-tabContent">

							<!--INICIO DATOS CLUB-->

							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="row">
				                    <div class="col">
				                     	<p></p>
				                     	<div class="card text-white bg-secondary mb-3" >
											<div class="card-header text-center">
												<h5>Información  <img class="float-center" src="https://img.icons8.com/metro/420/info.png" style="width:20px !important; height:20px !important"></h5>
											</div>
											<div class="card-body text-center">
												<p> Fundación: {{ $clubes['fundacionClub'] }}</p>
												<p> Sede: {{ $clubes['sedeClub'] }}, 
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
												<p> Contacto: {{ $clubes['correoClub'] }} // {{ $clubes['telefonoClub'] }} </p>
											</div>
										</div>
									</div>
				                    <div class="col">
				                        <p></p>
				                        <div class="card text-white bg-secondary mb-3" >
											<div class="card-header text-center">
											  	<h5>Estadio <img class="float-center" src="https://image.flaticon.com/icons/png/512/88/88961.png" style="width:30px !important; height:30px !important"></h5>
											</div>
											<div class="card-body text-center">
												@foreach($estadios as $est)
													@if($clubes->idEstadio === $est->idEstadio)
														<a href="{{ route('estadio.show', $est->idEstadio)}}" class="text-white">
														<p>Estadio: {{ $est['nombreEstadio'] }}</p></a>
														<p>Capacidad Estadio: {{ $est['capacidadEstadio'] }} personas</p>
													@endif
												@endforeach
											</div>
										</div>
										</div>
								</div>
							</div>
						<!-- FIN DATOS CLUB-->


						<!--INICIO PLANTILLA-->

						    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						    	<div class="row">
				                    <div class="col">
				                     	<p></p>
				                     	<div class="card text-white bg-secondary mb-3" >
											<div class="card-header text-center">
													<h5>Plantilla</h5>
											</div>
												<div class="card-body text-center">
													<div class="row">
														@foreach($jugadores as $jug)
															@if($jug->idClub === $clubes->idClub)
																@if($jug->posicionJugador === 'Arquero')
																	<div class="col-sm-6 col-md-3">
															    		<div class="thumbnail">
															      			<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" style="width:70px !important; height:70px !important">
															      			<div class="caption">
															        			<p><a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-white">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</a></p>
															        			<p><img src="https://images.vexels.com/media/users/3/132207/isolated/preview/cdcfa6ff97b6c9aa17d8adce3268395d-silueta-de-portero-de-f-tbol-1-by-vexels.png" style="width:30px !important; height:30px !important"> {{$jug->posicionJugador}}</p>
										  						      		</div>
																    	</div>
															  		</div>
															  	@endif
															@endif
														@endforeach
														@foreach($jugadores as $jug)
															@if($jug->idClub === $clubes->idClub)
																@if($jug->posicionJugador === 'Defensa')
																	<div class="col-sm-6 col-md-3">
															    		<div class="thumbnail">
															      			<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" style="width:70px !important; height:70px !important">
															      			<div class="caption">
															        			<p><a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-white">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</a></p>
															        			<p><img src="https://images.vexels.com/media/users/3/132247/isolated/preview/a7d5804976d548749c83aeaefdbce085-silueta-de-jugador-de-f-tbol-7-by-vexels.png" style="width:30px !important; height:30px !important"> {{$jug->posicionJugador}}</p>
										  						      		</div>
																    	</div>
															  		</div>
															  	@endif
															@endif
														@endforeach
														@foreach($jugadores as $jug)
															@if($jug->idClub === $clubes->idClub)
																@if($jug->posicionJugador === 'Mediocampista')
																	<div class="col-sm-6 col-md-3">
															    		<div class="thumbnail">
															      			<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" style="width:70px !important; height:70px !important">
															      			<div class="caption">
															        			<p><a href="{{ route('jugador.show', $jug->idJugador)}}"class="text-white">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</a></p>
															        			<p><img src="https://images.vexels.com/media/users/3/132205/isolated/preview/9df3f702bd3e0fbecce1abc61aa0e517-pelota-de-futbol-pateando-silueta-by-vexels.png" style="width:30px !important; height:30px !important">  {{$jug->posicionJugador}}</p>
										  						      		</div>
																    	</div>
															  		</div>
															  	@endif
															@endif
														@endforeach
														@foreach($jugadores as $jug)
															@if($jug->idClub === $clubes->idClub)
																@if($jug->posicionJugador === 'Delantero')
																	<div class="col-sm-6 col-md-3">
															    		<div class="thumbnail">
															      			<img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" style="width:70px !important; height:70px !important">
															      			<div class="caption">
															        			<p ><a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-white">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</a></p>
															        			<p><img src="https://cdn.pixabay.com/photo/2018/09/30/22/12/silhouette-3714836_960_720.png" style="width:30px !important; height:30px !important">  {{$jug->posicionJugador}}</p>
										  						      		</div>
																    	</div>
															  		</div>
															  	@endif
															@endif
														@endforeach
													

														@foreach($dt as $d)
															@if($d->idDirectorTecnico === $clubes->idDirectorTecnico)
																	<div class="col-sm-6 col-md-3">
															    		<div class="thumbnail">
															      			<img src="{{asset('images/directortecnico/' .$d->imagenDirectorTecnico)}}" style="width:70px !important; height:70px !important">
															      			<div class="caption">
															        			<p><a href="{{ route('directortecnico.show', $d->idDirectorTecnico)}}" class="text-white">{{ $d['nombreDirectorTecnico'] }} {{ $d['apellidosDirectorTecnico'] }}</a></p>
															        			<p><img src="https://static1.squarespace.com/static/550ccbdde4b079aa9844df40/56b4661037013b0f50de26ff/56b4664127d4bd06b90968b8/1454663235064/dt.png" style="width:30px !important; height:30px !important">Director Técnico</p>
										  						      		</div>
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
							<!---FIN DE PLANTILLA-->

							<!-- INICIO PARTIDOS-->
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<div class="row">
				                    <div class="col">
				                     	<p></p>
				                     	<div class="card text-white bg-secondary mb-3" >
											<div class="card-header text-center">
													<h5>Partidos</h5>						
											</div>
											<div class="card-body text-center">
												<div class="thumbnail">
													<div class="row">
															
														@foreach($partidos as $part)
															@if($part->clubLocalPartido === $clubes->idClub)
															<?php 
																$fecha_como_entero = strtotime($part->fechaPartido);
																$mes = date("m", $fecha_como_entero);
																$dia = date("d", $fecha_como_entero);
																?>
																<div class="col">
																	<p class="text-light font-weight-bold">{{$mes}}-{{$dia}}</p>
																	<p>
														  				<a href="{{ route('club.show', $clubes->idClub)}}">
													      				<img class="img-responsive float-sm text-left" src="{{asset('images/club/' .$clubes->imagenClub)}}" width="35" height="35">
													      				</a>
													      				<a href="{{ route('partido.show', $part->idPartido)}}" class="text-light font-weight-bold"> {{ $part->golesLocalPartido }} - {{  $part->golesVisitaPartido }} </a>
													      				@foreach($allclubs as $club)
																    		@if($club->idClub === $part->clubVisitaPartido)						
															       				<a href="{{ route('club.show', $part->clubVisitaPartido)}}">					<img class="img-responsive float-sm text-center" src="{{asset('images/club/' .$club->imagenClub)}}" width="35" height="35"></a>
																			@endif
																   		@endforeach
															   		</p>
															 		<p>	
															 			<div style="height:45px;">
																			<div class="col align-self-start">
																				<button type="button" class="btn btn-sm btn-primary text-white" disabled>{{$part->estadoPartido}}</button>
																			</div>
																		</div>
													      			</p>
													      		</div>									    
											  				@endif
											  			@endforeach
														
											  			
											  		
											  		@foreach($partidos as $part)
														@if($part->clubVisitaPartido === $clubes->idClub)
															@foreach($allclubs as $club)
																@if($club->idClub === $part->clubLocalPartido)
																<?php 
																$fecha_como_entero = strtotime($part->fechaPartido);
																$mes = date("m", $fecha_como_entero);
																$dia = date("d", $fecha_como_entero);
																?>
																	<div class="col text-center">
																		<p class="text-light font-weight-bold">{{$mes}}-{{$dia
																		}}</p>
																			<div>
																	  			<p><a href="{{ route('club.show', $club->idClub)}}">
																      				<img class="img-responsive float-sm text-left" src="{{asset('images/club/' .$club->imagenClub)}}" width="35" height="35">
																      			</a>
																      			<a href="{{ route('partido.show', $part->idPartido)}}" class="text-light font-weight-bold"> {{ $part->golesLocalPartido }} - {{  $part->golesVisitaPartido }} </a>			      				
																		       	<a href="{{ route('club.show', $part->clubVisitaPartido)}}">
																		       		<img class="img-responsive float-sm text-center" src="{{asset('images/club/' .$clubes->imagenClub)}}" width="35" height="35">
																		       	</a>
																				</p>
																				<div style="height:45px;">
																					<p>
																					<div class="col align-self-start">
																						<button type="button" class="btn btn-sm btn-primary text-white" disabled>{{$part->estadoPartido}}</button>
																					</div>
																					</p>
																				</div>
														      				</div>
															    <div class="caption">
															    				<p>
															    				</p>
														        				
													  			</div>
													  	@endif
													@endforeach
																	</div>
											  					
											  					@endif
														   	@endforeach
														   	</div>
											  	</div>
													
											</div>
		
							<!-- FIN PARTIDOS-->				
							<div class="row">
								<p></p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	<a href="../../partido"><button class='btn btn-danger'>Atrás</button>

	</div>
</div>

@endsection