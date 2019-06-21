
@extends ('layouts.app')

@section ('titulo', 'Partidos' .$partidos->idPartido) <!--CAMBIAR TITULO-->

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
					       			 <a href="http://www.conmebol.com/es/copa-libertadores-2019" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="90" height="90"><p class="text-light font-weight-bold"> {{ $club['nombreClub'] }}</p></a>
					    			</div>
								</div>
							@endif
						@endforeach
						<!----------------->

						<!--Marcador-->
						<div class="col-3 text-center">
							<div class="row"   style="height:45px;">
								<div class="col align-self-end">
									<span class="text-light font-weight-bold">{{ $partidos['fechaPartido'] }}</span>
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
							        <a href="http://www.conmebol.com/es/copa-libertadores-2019" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="90" height="90"><p class="text-light font-weight-bold"> {{ $club['nombreClub'] }}</p></a>
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





<div class="row">
	<div class="col">
		 <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
						<li class="nav-item active">
					    	<a class="nav-link text-muted" href="#tab1default" data-toggle="tab">PARTIDO</a>
					  	</li>
					  	<li class="nav-item">
					    	<a class="nav-link text-muted" href="#tab2default" data-toggle="tab">ESTADIO</a>
					  	</li>
					  	<li class="nav-item">
					    	<a class="nav-link text-muted" href="#tab3default" data-toggle="tab">ALINEACIONES</a>
					  	</li>
  					</ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1default">
                        	<div class="row">
                        		<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Árbitros <img class="float-right" src="{{asset('images/arbitro/tarjetaa.png')}}" width="42" height="42"></h5>
									  	</div>
								  		<div class="card-body">
								  			@foreach($arbitros as $arb)
								  			<!----Arbitro Central-------------------------------------->
								  				@if($partidos->idArbitroCentral === $arb->idArbitro)
								  					@foreach($paises as $pais)
								  						@if($pais->idPais === $arb->idPais)
												    		
												    		<p class="card-text">
												    			<div class="row">
													    			<div class="col-1"> <img src="{{asset('images/arbitro/pito.png')}}" width="30" height="21">
													    			</div> 
													    			<div class="col">
													    				{{ $arb['nombreArbitro'] }}  {{ $arb['apellidosArbitro'] }} ({{ $pais['nombrePais'] }}).
													    			</div>
												    			</div>
											    			</p>
												    		@endif
										    		@endforeach
									    		@endif
								    		<!--------------------->
								    		<!-----Arbitros asistentes--->
								    			@if($partidos->idArbitroAsistente1 === $arb->idArbitro)
								  					@foreach($paises as $pais)
								  						@if($pais->idPais === $arb->idPais)
												    		<h5 class="card-title"></h5>
												    		<p class="card-text">
												    			<div class="row">
													    			<div class="col-1"> <img src="{{asset('images/arbitro/bandera.png')}}" width="24" height="16">
													    			</div> 
													    			<div class="col">
													    				{{ $arb['nombreArbitro'] }}  {{ $arb['apellidosArbitro'] }} ({{ $pais['nombrePais'] }}).
													    			</div>
												    			</div>
											    			</p>
												    		@endif
										    		@endforeach
									    		@endif

									    		@if($partidos->idArbitroAsistente2 === $arb->idArbitro)
								  					@foreach($paises as $pais)
								  						@if($pais->idPais === $arb->idPais)
												    		<p class="card-text">
												    			<div class="row">
													    			<div class="col-1"> <img src="{{asset('images/arbitro/bandera.png')}}" width="24" height="16">
													    			</div> 
													    			<div class="col">
													    				{{ $arb['nombreArbitro'] }}  {{ $arb['apellidosArbitro'] }} ({{ $pais['nombrePais'] }}).
													    			</div>
												    			</div>
											    			</p>
												    		@endif
										    		@endforeach
									    		@endif
								    		<!-------------------->
								    		<!-------Cuarto Arbitro------->
								    			@if($partidos->idCuartoArbitro === $arb->idArbitro)
								  					@foreach($paises as $pais)
								  						@if($pais->idPais === $arb->idPais)
												    		<p class="card-text">
												    			<div class="row">
													    			<div class="col-1"> <img src="{{asset('images/arbitro/cuarto.png')}}" width="25" height="25">
													    			</div> 
													    			<div class="col">
													    				{{ $arb['nombreArbitro'] }}  {{ $arb['apellidosArbitro'] }} ({{ $pais['nombrePais'] }}).
													    			</div>
												    			</div>
											    			</p>
												    		@endif
										    		@endforeach
									    		@endif

								    		@endforeach
								  		</div>
									</div>
                        		</div>

                        		<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Estadísticas <img class="float-right" src="https://image.flaticon.com/icons/png/512/20/20803.png" width="42" height="42"></h5>
									  	</div>
								  		<div class="card-body">
								  			<!--------------------CAMBIAR-------------------------------->
								  			@foreach($historiales as $hist)
								  				@if($partidos->idPartido === $hist->idPartido)
								  					<div class="row">
								  						<!-----Estadisticas local--->
								  						<div class="col-6">
								  						@foreach($jugadorclublocal as $juglocal)
								  							@if($partidos->clubLocalPartido === $juglocal->idJugador)
								  								<span> {{ $juglocal->nombreJugador}}</span>
								  							@endif
							  							@endforeach
								  						</div>
								  						<!--------------------------->
								  					</div>
								  				@endif
								  			@endforeach
								  		</div>
									</div>
                        			
                        		</div>

                        		<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Historial</h5>

									  	</div>
								  		<div class="card-body">
								  			<div class="row justify-content-center">
								  				<div class="col">
								  				<?php ?>
								  				@for($i=0; $i < $contador; $i++)
									  				<div class="row justify-content-center">
									  					<div class="align-self-center">
															</div>
									  					@foreach($clubes as $club)
															@if (strcmp($partidos_historial[$i]['local'], $club->idClub) === 0)
																<div class="col-3 text-right">
																	<div>
													       			 <a href="http://www.conmebol.com/es/copa-libertadores-2019" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="35" height="35"><p class="text-light font-weight-bold"></p></a>
													    			</div>
																</div>
															@endif
														@endforeach
															<div class="align-self-center">
																<span class="text-light font-weight-bold">{{ $partidos_historial[$i]['goles_local'] }}-{{ $partidos_historial[$i]['goles_visita'] }}</span>
															</div>
														@foreach($clubes as $club)	
															@if($partidos_historial[$i]['visita'] === $club->idClub)
																<div class="col-3 text-left">
																	<div>
															        <a href="http://www.conmebol.com/es/copa-libertadores-2019" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="35" height="35"><p class="text-light font-weight-bold"></p></a>
															    </div>
																</div>
															@endif
														@endforeach
														</div>
														@endfor
								  					</div>
								  					
									    			
								    			</div>
							    			
								  		</div>
									</div>
                        			
                        		</div>
                        	</div>



                        </div>
                        <div class="tab-pane fade" id="tab2default">Default 2</div>
                        <div class="tab-pane fade" id="tab3default">
                        	

                        </div>
                    
                    </div>
                </div>
            </div>

<p>.</p>

		

  	
</div>


@endsection