
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





<div class="row">
	<div class="col">
		<div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
						<li class="nav-item active">
					    	<a class="nav-link text-muted" href="#tab1default" data-toggle="tab">PARTIDO  <img width="24" height="24" src="https://image.flaticon.com/icons/png/512/33/33736.png"></a>
					  	</li>
					  	<!--li class="nav-item">
					    	<a class="nav-link text-muted" href="#tab2default" data-toggle="tab">ESTADIO <img width="27" height="27" src="https://www.futbolchileno.com/wp-content/uploads/2016/05/stadium.svg"></a>
					  	</li-->
					  	<li class="nav-item">
					    	<a class="nav-link text-muted" href="#tab3default" data-toggle="tab">ALINEACIONES <img width="81" height="27" src="https://image.flaticon.com/icons/svg/55/55448.svg"></a>
					  	</li>
  					</ul>
            </div>
            <div class="panel-body">
                    <div class="tab-content">

                    	<!--------------PARTIDO----------------------->
                        <div class="tab-pane fade  show active" id="tab1default">
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
									  		<h5>Estadio <img class="float-right" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Emoji_u1f3df.svg/1024px-Emoji_u1f3df.svg.png" width="42" height="42"></h5>
									  	</div>
								  		<div class="card-body">
								  			<!--------------------CAMBIAR-------------------------------->
								  			@foreach($estadios as $est)
								  				@if($partidos->idEstadio === $est->idEstadio)
								  					<div class="row">
								  						<!-----Estadio--->
								  						<div class="col">
								  						@foreach($paises as $pais)
								  							@if($pais->idPais === $est->idPais)
								  								<p> {{ $est->nombreEstadio}} ({{ $pais->nombrePais}})</p>
								  								


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
								  				
								  				@for($i=0; $i < $contador; $i++)
									  				<div class="row justify-content-center">
									  					<div class="align-self-center">
															</div>
									  					@foreach($clubes as $club)
															@if (strcmp($partidos_historial[$i]['local'], $club->idClub) === 0)
																<div class="col-3 text-right">
																	<div>
													       			 <a href="{{ route('club.show', $club->idClub)}}" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="35" height="35"><p class="text-light font-weight-bold"></p></a>
													    			</div>
																</div>
															@endif
														@endforeach
															<div class="align-self-center">
																<span class="text-light font-weight-bold">{{ $partidos_historial[$i]['goles_local'] }}  -  {{ $partidos_historial[$i]['goles_visita'] }}</span>
															</div>
														@foreach($clubes as $club)	
															@if($partidos_historial[$i]['visita'] === $club->idClub)
																<div class="col-3 text-center">
																	<div>
															        <a href="{{ route('club.show', $club->idClub)}}" ><img src="{{asset('images/club/' .$club->imagenClub)}}" width="35" height="35"><p class="text-light font-weight-bold"></p></a>
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

                        <!------ESTADIO-------------------------
                        <div class="tab-pane fade" id="tab2default">
                        	<p></p>
                        	<div class="row">
                        		<div class="col">
                        			<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
									  <div class="card-header">Header</div>
									  <div class="card-body">
									    <h5 class="card-title">Secondary card title</h5>
									    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									  </div>
									</div>
                        		</div>
                        	</div>
                        </div>--->
                        <!--------Alineaciones------>
                        <div class="tab-pane fade" id="tab3default">
	                        <div class="row">
	                        	
	                        	<div class="col">
	                        		<div class="row justify-content-center">
			                        		<div class="col-6">
			                        			<p></p>
			                        			<div class="panel with-nav-tabs panel-default">
									                <div class="panel-heading border bg-secondary">
									                        <ul class="nav nav-pills nav-fill" id="myTab2" role="tablist">
									                            <li class="nav-item actived">
									                            	<a class="nav-link text-light " href="#local" data-toggle="tab">LOCAL</a>
									                            </li>
									                            <li class="nav-item">
									                            	<a class="nav-link text-light" href="#visita" data-toggle="tab">VISITA</a>
									                            </li>
									                            
									                           
									                        </ul>
									                </div>
							               		</div>
						               		</div>
					               		</div>
	                        	</div>
	                        </div>
                        <!--------ALINEACIONES--------------------->
                        
                        	<!--div class="row">
                        		<div class="col-3 ">
                        			
                        			
                        			<div class="card text-white bg-secondary mb-3 " >
									  	<div class="card-header ">
									  		<h5>Estadísticas <img class="float-right" src="https://image.flaticon.com/icons/png/512/20/20803.png" width="42" height="42"></h5>
									  	</div>
								  		<div class="card-body">
								  			-------------------CAMBIAR-------------------------------
								  					<div class="row">
								  						<div class="col-6">
								  							@foreach($clubes as $club)
								  									@if($club->idClub === $partidos->clubLocalPartido)
								  										<img src="{{asset('images/club/' .$club->imagenClub)}}" width="30" height="30">
							  										@endif
					  										@endforeach
								  						</div>
								  						<div class="col-6">
								  							@foreach($clubes as $club)
								  									@if($club->idClub === $partidos->partidos)
								  										<img  class="float-sm-right" src="{{asset('images/club/' .$club->imagenClub)}}" width="30" height="30">
							  										@endif
					  										@endforeach
								  						</div>
								  					</div>
								  					<div class="row">
								  						----Estadisticas local--
								  						<div class="col-6">
							  							
								  						@for($i=0; $i < $contador2; $i++)
								  						<div class="row">
								  							<div class="col">
								  								
								  								<span> 
								  								@foreach($clubes as $club)
								  									@if($club->idClub === $partidos->clubLocalPartido)
								  									@if($gol_jugador[$i]['club'] === $club->idClub)
								  									{{ $gol_jugador[$i]['jugador'] }} 
								  								{{ $gol_jugador[$i]['apellido'] }} {{$gol_jugador[$i]['gol'] }}
								  									 
								  									 @endif
								  									 @endif
						  									 	@endforeach
							  									</span>
								  							</div>

								  						</div>
														
														@endfor
														
								  						</div>
								  						--------------------------
								  						---------Estadisticas Visita-----
								  						<div class="col-6">
							  							
								  						@for($i=0; $i < $contador2; $i++)
								  						<div class="row">
								  							<div class="col">
								  								
								  								<span> 
								  								@foreach($clubes as $club)
								  									@if($club->idClub === $partidos->partidos)
								  									@if($gol_jugador[$i]['club'] === $club->idClub)
								  									{{ $gol_jugador[$i]['jugador'] }} 
								  								{{ $gol_jugador[$i]['apellido'] }} {{$gol_jugador[$i]['gol'] }}
								  									 
								  									 @endif
								  									 @endif
						  									 	@endforeach
							  									</span>
								  							</div>
								  						</div>
														
														@endfor
														
								  						</div>
								  						--------------------------
								  					</div>
								  				
								  		</div>

									</div>
                        			
                        		
                        		</div-->
                        		<div class="col-12">
		                        	
			               		
				               		<div class="row justify-content-center">
						                <div class="col-12">
						                	<div class="panel with-nav-tabs panel-default">
								                <div class="panel-body">
								                    <div class="tab-content">
								                        <div class="tab-pane fade  show active" id="local">
								                        	<div class="card bg-dark text-white">
																  <img class="card-img" src="https://3.bp.blogspot.com/-er26tiHGyy4/WuCqTWJm6-I/AAAAAAAABu0/4An4Cxp7bFAnRqqGQE26fVMVtG3NrkhOwCLcBGAs/s1600/Cancha%2Bde%2Bf%25C3%25BAtbol%2Balfombra.jpg" alt="Card image" style="height: 450px">
															  	<div class="card-img-overlay">
															    	<div class="row justify-content-center"  style="height: 450px">
															    		<!-----Arquero--->
															    		<div class="col-3 align-self-center text-center ">
															    			<div class="float-sm-center">
															    				<p class="card-text ">

															    					@foreach($plantilla as $plan)
															    					@if($plan->idPartido === $partidos->idPartido)
															    						@if($plan->Titular === 'GK-L')
															    							<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
															    						@endif
														    						@endif
															    					@endforeach
															    				</p>
															    			</div>
															    		</div>

															    		<!--------------->
															    		<!-----Defensas---->
															    		<div class="col-3 align-self-center text-center">
															    			<div class="float-sm-center">
															    				@foreach($plantilla as $plan)
															    				@if($plan->idPartido === $partidos->idPartido)
																    				@if($plan->posicionJugador === 'Defensa')
																		    			@if($plan->Titular === 'DFI-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DFC-1-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DFC-2-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DFC-3-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    				@if($plan->Titular === 'DFD-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    			@endif
																	    		@endif
																    			@endforeach
															    			</div>
															    		</div>
															    		<!--------------->
															    		<!-----Mediocampistas---->
															    		<div class="col-3 align-self-center text-center">
															    			<div class="float-sm-center">
																    			@foreach($plantilla as $plan)
																    			@if($plan->idPartido === $partidos->idPartido)
																    				@if($plan->posicionJugador === 'Mediocampista')
																		    			
																		    			@if($plan->Titular === 'MC-1-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'MC-2-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'MC-3-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    				@if($plan->Titular === 'MC-4-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    				@if($plan->Titular === 'MC-5-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    			@endif
																    			@endif
																    			@endforeach
															    			</div>
															    		</div>
															    		<!--------------->
															    		<!-----denaltnero---->
															    		<div class="col-3 align-self-center text-center">
															    			<div class="float-sm-center">
																    			@foreach($plantilla as $plan)
																    			@if($plan->idPartido === $partidos->idPartido)
																    				@if($plan->posicionJugador === 'Delantero')
																		    			
																		    			@if($plan->Titular === 'DC-1-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DC-2-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DC-3-L')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif		
																	    			@endif
																	    			@endif
																    			@endforeach
															    			</div>
															    		</div>
															    	</div>
															    	
															    	
															  	</div>
															</div>
								                        </div>

								                        <div class="tab-pane fade" id="visita">
								                        	<div class="card bg-dark text-white">
																  <img class="card-img" src="https://3.bp.blogspot.com/-er26tiHGyy4/WuCqTWJm6-I/AAAAAAAABu0/4An4Cxp7bFAnRqqGQE26fVMVtG3NrkhOwCLcBGAs/s1600/Cancha%2Bde%2Bf%25C3%25BAtbol%2Balfombra.jpg" alt="Card image" style="height: 460px">
															  	<div class="card-img-overlay">
															    	<div class="row justify-content-center"  style="height: 460px">
															    		<!-----denaltnero---->
															    		<div class="col-3 align-self-center text-center">
															    			<div class="float-sm-right">
																    			@foreach($plantilla as $plan)

																    				@if($plan->idPartido === $partidos->idPartido)
																    				@if($plan->posicionJugador === 'Delantero')
																		    			
																		    			@if($plan->Titular === 'DC-1')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DC-2')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DC-3')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif		
																	    			@endif
																	    			@endif
																    			@endforeach
															    			</div>
															    		</div>
															    		

															    		<!--------------->
															    		<!-----Mediocampistas---->
															    		<div class="col-3 align-self-center text-center">
															    			<div class="float-sm-right">
																    			@foreach($plantilla as $plan)
																    			@if($plan->idPartido === $partidos->idPartido)
																    				@if($plan->posicionJugador === 'Mediocampista')
																		    			
																		    			@if($plan->Titular === 'MC-1')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'MC-2')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'MC-3')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    				@if($plan->Titular === 'MC-4')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    				@if($plan->Titular === 'MC-5')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    			@endif
																	    			@endif
																    			@endforeach
															    			</div>
															    		</div>
															    		<!--------------->
															    		<!-----Defensas---->
															    		<div class="col-3 align-self-center text-center">
															    			<div class="float-sm-right">
															    				@foreach($plantilla as $plan)
															    				@if($plan->idPartido === $partidos->idPartido)
																    				@if($plan->posicionJugador === 'Defensa')
																		    			@if($plan->Titular === 'DFI')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DFC-1')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DFC-2')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																		    			@if($plan->Titular === 'DFC-3')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    				@if($plan->Titular === 'DFD')
																		    			<p class="card-text ">
																		    				<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
																	    				</p>
																	    				@endif
																	    			@endif
																	    			@endif
																    			@endforeach
															    			</div>
															    		</div>
															    		<!--------------->
															    		<!-----Arquero--->
															    		<div class="col-3 align-self-center text-center ">
															    			<div class="float-sm-center">
															    				<p class="card-text ">

															    					@foreach($plantilla as $plan)
															    					@if($plan->idPartido === $partidos->idPartido)
															    						@if($plan->Titular === 'GK')
															    							<a  class="" data-toggle="tooltip" data-placement="bottom" title="{{$plan->nombreJugador}} {{$plan->apellidosJugador}}"><img src="{{asset('images/jugador/' .$plan->imagenJugador)}}" width="60" height="60"><p class="text-light"></p></a>
															    						@endif
															    						@endif
															    					@endforeach
															    				</p>
															    			</div>
															    		</div>
															    		
															    	</div>
															    	
															    	
															  	</div>
															</div>

								                        </div>
								                        
								                    </div>
								                </div>
								            </div>	
								            <div class="row">
					                        	<div class="col">
					                        		<a href="{{ route('imprimir.reporte_partido', $partidos->idPartido)}}" class="btn btn-outline-success my-2 my-sm-0 mx-auto border">Reporte del partido</a>
					                        		@if(auth()->user()->authorizeRolesLogin('user'))
					                        		<a href="/historial/{{$partidos->idPartido}}/create" class="btn btn-outline-success my-2 my-sm-0 mx-auto border">Ingresar plantilla</a>
					                        		@endif
					                        		<button type="button" class="btn btn-outline-success my-2 my-sm-0 mx-auto border" data-toggle="modal" data-target="#statsModal">
					                        		Ver Estadísticas
					                        	</button>
					                        	</div>
					                        </div>

					                        <div class="row">
					                        	<div class="col-6">
					                        		<table class="table table-sm table-dark">
													<!--TITULO LISTA ALINEACION VISITA-->
													  <thead>
													    <tr>
													     
													      <th scope="col">Nombre</th>
													      <th scope="col">TA</th>
													      <th scope="col">TR</th>
													      <th scope="col">gol</th>
													      <th scope="col">minutos</th>
													    </tr>
													  </thead>
												  	<!---------------------------->
													  <tbody>
													  @foreach($plantilla as $plan)
								    					@if($plan->idPartido === $partidos->idPartido)
															    @if ($plan->idClub === $partidos->clubLocalPartido)
													  	
													    <tr>
													      <!--th scope="row">1</th-->
													      <td>{{$plan->nombreJugador}} {{$plan->apellidosJugador}}</td>
													      
													      <td>{{$plan->amarillaJugador}}</td>
													      <td>{{$plan->rojaJugador}}</td>
													      <td>{{$plan->golJugador}}</td>
													      <td>{{$plan->minutosJugador}}</td>
													    </tr>
													     @endif					
													    @endif
													    @endforeach
													    
													  </tbody>
													</table>
					                        	</div>
					                        	<div class="col-6">
					                        		<table class="table table-sm table-dark">
													<!--TITULO LISTA ALINEACION VISITA-->
													  <thead>
													    <tr>
													     
													      <th scope="col">Nombre</th>
													      <th scope="col">TA</th>
													      <th scope="col">TR</th>
													      <th scope="col">gol</th>
													      <th scope="col">minutos</th>
													      @if(auth()->user()->authorizeRolesLogin('user'))
					                        				<th>
					                        					<a href="/historial/{{$partidos->idPartido}}/create" class="">Editar</a>
				                        					</th>
				                        				@endif
													    </tr>
													  </thead>
												  	<!---------------------------->
													  <tbody>
													  @foreach($plantilla as $plan)
								    					@if($plan->idPartido === $partidos->idPartido)
															    @if ($plan->idClub === $partidos->clubVisitaPartido)
													  	
													    <tr>
													      <!--th scope="row">1</th-->
													      <td>{{$plan->nombreJugador}} {{$plan->apellidosJugador}}</td>
													      
													      <td>{{$plan->amarillaJugador}}</td>
													      <td>{{$plan->rojaJugador}}</td>
													      <td>{{$plan->golJugador}}</td>
													      <td>{{$plan->minutosJugador}}</td>
													    </tr>
													     @endif					
													    @endif
													    @endforeach
													    
													  </tbody>
													</table>
					                        	</div>
					                        </div>
		                        		</div>
		                        	</div>
	                        	</div>
                        	</div>
                        </div>
                    
                    
            </div>
        </div>

            

<p>.</p>
<p>.</p>

		
</div>
  	
</div>




								                       

            

<p>.</p>
<p>.</p>

	<!-- Modal -->
	<div class="modal fade" id="statsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Estadísticas del Partido</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="col-12">
	      		<table class="table table-sm table-dark">
	      			<!--TITULO LISTA ALINEACION VISITA-->
	      			<thead>
	      				<tr>
	      					<th scope="col">Nombre</th>
	      					<th scope="col">TA</th>
	      					<th scope="col">TR</th>
	      					<th scope="col">gol</th>
	      					<th scope="col">minutos</th>
	      				</tr>
	      			</thead>
	      			<tbody>
	      				@foreach($plantilla as $plan)
	      				@if($plan->idPartido === $partidos->idPartido)
	      				@if ($plan->idClub === $partidos->clubVisitaPartido)
	      				<tr>
	      					<td>{{$plan->nombreJugador}} {{$plan->apellidosJugador}}</td>
	      					<td>{{$plan->amarillaJugador}}</td>
	      					<td>{{$plan->rojaJugador}}</td>
	      					<td>{{$plan->golJugador}}</td>
	      					<td>{{$plan->minutosJugador}}</td>
	      				</tr>
	      				@endif
	      				@endif
	      				@endforeach
	      			</tbody>
	      		</table>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>		

  	
</div>


@endsection