
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
				
				   	<li class="nav-item">
				    	<a class="nav-link text-muted" href="" data-toggle="tab">ALINEACIONES <img width="81" height="27" src="https://image.flaticon.com/icons/svg/55/55448.svg"></a>
				  	</li>
					</ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col">
		<div class="panel with-nav-tabs panel-default">
            <div class="panel-heading border bg-secondary">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
				
				   	<li class="nav-item active">
								                            	<a class="nav-link text-light " href="#local" data-toggle="tab">LOCAL</a>
								                            </li>
				  	<li class="nav-item">
								                            	<a class="nav-link text-light" href="#visita" data-toggle="tab">VISITA</a>
								                            </li>
					</ul>
            </div>
        
			<form class="form-group" method="POST" action="/historial" enctype="multipart/form-data"> 
				@csrf

	
	            <div class="panel-body">
	                <div class="tab-content">

	                    <!--------Alineaciones------>
	                    <div class="tab-pane fade show active" id="local">
	                        <!--------ALINEACIONES--------------------->
	                        <div class="card bg-dark text-white">
					 			 <img class="card-img" src="https://3.bp.blogspot.com/-er26tiHGyy4/WuCqTWJm6-I/AAAAAAAABu0/4An4Cxp7bFAnRqqGQE26fVMVtG3NrkhOwCLcBGAs/s1600/Cancha%2Bde%2Bf%25C3%25BAtbol%2Balfombra.jpg" alt="Card image">
				  				<div class="card-img-overlay">
				    				<div class="row justify-content-center"  style="height: 680px">
				    		
				    					
	                        		
	                        		
								    		<!-----Arquero--->
								    		<div class="col-3 align-self-center text-center ">
								    			<div class="float-sm-left">


													

															

															<p class="bg-dark">Ingresar Arquero</p>

														    <p><select name="idJugador14" class="form-control">
															        <option disabled selected value>Seleciona un Jugador...</option>
															        @foreach ($jugadorclub as $jc)
															            @if($jc->idClub === $partidos->clubLocalPartido)
															            	@if($jc->posicionJugador === 'Arquero')
															                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
															                @endif
															            @endif
															        @endforeach
															    </select></p>

														   
																
																<input type="text" value="GK" style="visibility:hidden" name="Titular14" class="form-control">


																<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
															


														    

												    
								    				
								    			</div>
								    		</div>

								    		<!--------------->
								    		<!-----Defensas---->
								    		<div class="col-3 align-self-center text-center">
								    			<div class="float-sm-left">
								    				<div class="row">	
								    					<div class="col">
								    						<p class="bg-dark">Ingresar Defensas</p>
								    					</div>
								    				</div>
									    			
											
														<!---cantidad de defensas------->
															<div class="row">
																<div class="col">
																	<div class="panel with-nav-tabs panel-default">
														                <div class="panel-heading align-self-center">
														                        <ul class="nav nav-tabs">
														                        	<div class="col">
														                        	<p class="text-light  bg-secondary"> Cantidad de defensas: </p>
														                        	</div>
														                            <li class="active"><a class="btn btn-light"  href="#tresdef" data-toggle="tab"> 3</a></li>
														                            <li><a class="btn btn-light" href="#cuatrodef" data-toggle="tab"> 4</a></li>
														                            <li><a class="btn btn-light" href="#cincodef" data-toggle="tab"> 5</a></li>
														                            
														                        </ul>
														                </div>
														                <div class="panel-body">
														                    <div class="tab-content">
														                        <div class="tab-pane fade" id="tresdef">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador15" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-1" style="visibility:hidden" name="Titular15" class="form-control">

																									    <p><select name="idJugador16" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-2" style="visibility:hidden" name="Titular16" class="form-control">

																									    <p><select name="idJugador17" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-3" style="visibility:hidden" name="Titular17" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                   		</div>
														                        <div class="tab-pane fade show active" id="cuatrodef">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador15" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFI" style="visibility:hidden" name="Titular15" class="form-control">

																									    <p><select name="idJugador16" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-1" style="visibility:hidden" name="Titular16" class="form-control">

																									    <p><select name="idJugador17" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-2" style="visibility:hidden" name="Titular17" class="form-control">

																									    <p><select name="idJugador18" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>
																									    <input type="text" value="DFD" style="visibility:hidden" name="Titular18" class="form-control" >

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							   
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        <div class="tab-pane fade" id="cincodef">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador15" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFI" style="visibility:hidden" name="Titular15" class="form-control">

																									    <p><select name="idJugador16" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-1" style="visibility:hidden" name="Titular16" class="form-control">

																									    <p><select name="idJugador17" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-2" style="visibility:hidden" name="Titular17" class="form-control">

																									    <p><select name="idJugador18" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>
																									    <input type="text" value="DFC-3" style="visibility:hidden" name="Titular18" class="form-control" >

																									    <p><select name="idJugador19" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFD" style="visibility:hidden" name="Titular19" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							     
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        
														                    </div>
														                </div>
														            </div>
																</div>
															</div>
														    

												     
								    			</div>
								    		</div>
								    		<!--------------->
								    		<!-----Mediocampistas---->
								    		<div class="col-3 align-self-center text-center">
								    			<div class="float-sm-left">
									    			

														<input type="hidden" name="idJugador" value="{{$partidos->idJugador}}" class="form-control">

														<p class="bg-dark">Ingresar Mediocampistas</p>
														<!---cantidad de medio------->
															<div class="row">
																<div class="col">
																	<div class="panel with-nav-tabs panel-default">
														                <div class="panel-heading">
														                        <ul class="nav nav-tabs">
														                        	<div class="col">
														                        	<p class="text-light  bg-secondary"> Cantidad de mediocampo: </p>
														                        	</div>
														                            <li class="active"><a class="btn btn-light" href="#tresmc" data-toggle="tab">3</a></li>
														                            <li><a class="btn btn-light" href="#cuatromc" data-toggle="tab">4</a></li>
														                            <li><a class="btn btn-light" href="#cincomc" data-toggle="tab">5</a></li>
														                            
														                        </ul>
														                </div>
														                <div class="panel-body">
														                    <div class="tab-content">
														                        <div class="tab-pane fade" id="tresmc">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador20" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-1" style="visibility:hidden" name="Titular20" class="form-control">

																									    <p><select name="idJugador21" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-2" style="visibility:hidden" name="Titular21" class="form-control">

																									    <p><select name="idJugador22" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-3" style="visibility:hidden" name="Titular22" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                   		</div>
														                        <div class="tab-pane fade show active" id="cuatromc">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador20" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-1" style="visibility:hidden" name="Titular20" class="form-control">

																									    <p><select name="idJugador21" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-2" style="visibility:hidden" name="Titular21" class="form-control">

																									    <p><select name="idJugador22" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-3" style="visibility:hidden" name="Titular22" class="form-control">

																									    <p><select name="idJugador23" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-4" style="visibility:hidden" name="Titular23" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        <div class="tab-pane fade" id="cincomc">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador20" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-1" style="visibility:hidden" name="Titular20" class="form-control">

																									    <p><select name="idJugador21" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-2" style="visibility:hidden" name="Titular21" class="form-control">

																									    <p><select name="idJugador22" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-3" style="visibility:hidden" name="Titular22" class="form-control">

																									    <p><select name="idJugador23" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-4" style="visibility:hidden" name="Titular23" class="form-control">

																									    <p><select name="idJugador24" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-5" style="visibility:hidden" name="Titular24" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        
														                    </div>
														                </div>
														            </div>
																</div>
															</div>
														    

												    
								    			</div>
								    		</div>
								    		<!--------------->
								    		<!-----denaltnero---->
								    		<div class="col-3 align-self-center text-center">
								    			<div class="float-sm-left">
									    			

														<input type="hidden" name="idJugador" value="{{$partidos->idJugador}}" class="form-control">

														<p class="bg-dark">Ingresar Delanteros</p>
														<!---cantidad de delanteros------->
															<div class="row">
																<div class="col">
																	<div class="panel with-nav-tabs panel-default">
														                <div class="panel-heading">
														                        <ul class="nav nav-tabs">
														                        	<div class="col">
														                        	<p class="text-light  bg-secondary"> Cantidad de delantera: </p>
														                        	</div>
														                            <li><a class="btn btn-light" href="#undel" data-toggle="tab">1</a></li>
														                            <li ><a class="btn btn-light" href="#dosdel" data-toggle="tab">2</a></li>
														                            <li><a class="btn btn-light" href="#tresdel" data-toggle="tab">3</a></li>
														                            
														                        </ul>
														                </div>
														                <div class="panel-body">
														                    <div class="tab-content">
														                        <div class="tab-pane fade" id="undel">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										


																									    <p><select name="idJugador25" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC" style="visibility:hidden" name="Titular25" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                   		</div>
														                        <div class="tab-pane fade show active" id="dosdel">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										


																									    <p><select name="idJugador25" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-1" style="visibility:hidden" name="Titular25" class="form-control">

																									    <p><select name="idJugador26" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-2" style="visibility:hidden" name="Titular26" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        <div class="tab-pane fade" id="tresdel">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										


																									    <p><select name="idJugador25" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-1" style="visibility:hidden" name="Titular25" class="form-control">

																									    <p><select name="idJugador26" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-2" style="visibility:hidden" name="Titular26" class="form-control">

																									    <p><select name="idJugador27" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubLocalPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-3" style="visibility:hidden" name="Titular27" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        
														                    </div>
														                </div>
														            </div>
																</div>
															</div>
														    

												    
								    			</div>
								    		</div>
								    	
							







				    		
				    		
				    				</div>
				    	
				    	
				  				</div>
							</div>
	                    	
							




					    	
					  	</div>
					
	       				

	        			<div class="tab-pane fade" id="visita">
	        				<div class="card bg-dark text-white">
					 			 <img class="card-img" src="https://3.bp.blogspot.com/-er26tiHGyy4/WuCqTWJm6-I/AAAAAAAABu0/4An4Cxp7bFAnRqqGQE26fVMVtG3NrkhOwCLcBGAs/s1600/Cancha%2Bde%2Bf%25C3%25BAtbol%2Balfombra.jpg" alt="Card image">
				  				<div class="card-img-overlay">
				    				<div class="row justify-content-center"  style="height: 680px">
				    		
				    					
	                        		
	                        		
								    		<!-----Arquero--->
								    		<div class="col-3 align-self-center text-center ">
								    			<div class="float-sm-left">


													

															

															<p class="bg-dark">Ingresar Arquero</p>

														    <p><select name="idJugador0" class="form-control">
															        <option disabled selected value>Seleciona un Jugador...</option>
															        @foreach ($jugadorclub as $jc)
															            @if($jc->idClub === $partidos->clubVisitaPartido)
															            	@if($jc->posicionJugador === 'Arquero')
															                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
															                @endif
															            @endif
															        @endforeach
															    </select></p>

														   
																
																<input type="text" value="GK" style="visibility:hidden" name="Titular0" class="form-control">


																<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
															


														    

												    
								    				
								    			</div>
								    		</div>

								    		<!--------------->
								    		<!-----Defensas---->
								    		<div class="col-3 align-self-center text-center">
								    			<div class="float-sm-left">
								    				<div class="row">	
								    					<div class="col">
								    						<p class="bg-dark">Ingresar Defensas</p>
								    					</div>
								    				</div>
									    			
											
														<!---cantidad de defensas------->
															<div class="row">
																<div class="col">
																	<div class="panel with-nav-tabs panel-default">
														                <div class="panel-heading align-self-center">
														                        <ul class="nav nav-tabs">
														                        	<div class="col">
														                        	<p class="text-light  bg-secondary"> Cantidad de defensas: </p>
														                        	</div>
														                            <li class="active"><a class="btn btn-light"  href="#tresdefv" data-toggle="tab"> 3</a></li>
														                            <li><a class="btn btn-light" href="#cuatrodefv" data-toggle="tab"> 4</a></li>
														                            <li><a class="btn btn-light" href="#cincodefv" data-toggle="tab"> 5</a></li>
														                            
														                        </ul>
														                </div>
														                <div class="panel-body">
														                    <div class="tab-content">
														                        <div class="tab-pane fade" id="tresdefv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador1" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-1" style="visibility:hidden" name="Titular1" class="form-control">

																									    <p><select name="idJugador2" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-2" style="visibility:hidden" name="Titular2" class="form-control">

																									    <p><select name="idJugador3" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-3" style="visibility:hidden" name="Titular3" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                   		</div>
														                        <div class="tab-pane fade show active" id="cuatrodefv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador1" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFI" style="visibility:hidden" name="Titular1" class="form-control">

																									    <p><select name="idJugador2" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-1" style="visibility:hidden" name="Titular2" class="form-control">

																									    <p><select name="idJugador3" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-2" style="visibility:hidden" name="Titular3" class="form-control">

																									    <p><select name="idJugador4" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>
																									    <input type="text" value="DFD" style="visibility:hidden" name="Titular4" class="form-control" >

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							   
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        <div class="tab-pane fade" id="cincodefv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador1" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFI" style="visibility:hidden" name="Titular1" class="form-control">

																									    <p><select name="idJugador2" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-1" style="visibility:hidden" name="Titular2" class="form-control">

																									    <p><select name="idJugador3" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFC-2" style="visibility:hidden" name="Titular3" class="form-control">

																									    <p><select name="idJugador4" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>
																									    <input type="text" value="DFC-3" style="visibility:hidden" name="Titular4" class="form-control" >

																									    <p><select name="idJugador5" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Defensa')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DFD" style="visibility:hidden" name="Titular5" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							     
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        
														                    </div>
														                </div>
														            </div>
																</div>
															</div>
														    

												     
								    			</div>
								    		</div>
								    		<!--------------->
								    		<!-----Mediocampistas---->
								    		<div class="col-3 align-self-center text-center">
								    			<div class="float-sm-left">
									    			

														<input type="hidden" name="idJugador" value="{{$partidos->idJugador}}" class="form-control">

														<p class="bg-dark">Ingresar Mediocampistas</p>
														<!---cantidad de medio------->
															<div class="row">
																<div class="col">
																	<div class="panel with-nav-tabs panel-default">
														                <div class="panel-heading">
														                        <ul class="nav nav-tabs">
														                        	<div class="col">
														                        	<p class="text-light  bg-secondary"> Cantidad de mediocampo: </p>
														                        	</div>
														                            <li class="active"><a class="btn btn-light" href="#tresmcv" data-toggle="tab">3</a></li>
														                            <li><a class="btn btn-light" href="#cuatromcv" data-toggle="tab">4</a></li>
														                            <li><a class="btn btn-light" href="#cincomc5" data-toggle="tab">5</a></li>
														                            
														                        </ul>
														                </div>
														                <div class="panel-body">
														                    <div class="tab-content">
														                        <div class="tab-pane fade" id="tresmcv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador6" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-1" style="visibility:hidden" name="Titular6" class="form-control">

																									    <p><select name="idJugador7" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-2" style="visibility:hidden" name="Titular7" class="form-control">

																									    <p><select name="idJugador8" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-3" style="visibility:hidden" name="Titular8" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                   		</div>
														                        <div class="tab-pane fade show active" id="cuatromcv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador6" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-1" style="visibility:hidden" name="Titular6" class="form-control">

																									    <p><select name="idJugador7" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-2" style="visibility:hidden" name="Titular7" class="form-control">

																									    <p><select name="idJugador8" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-3" style="visibility:hidden" name="Titular8" class="form-control">

																									    <p><select name="idJugador9" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-4" style="visibility:hidden" name="Titular9" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        <div class="tab-pane fade" id="cincomc5">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										<p><select name="idJugador6" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-1" style="visibility:hidden" name="Titular6" class="form-control">

																									    <p><select name="idJugador7" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-2" style="visibility:hidden" name="Titular7" class="form-control">

																									    <p><select name="idJugador8" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-3" style="visibility:hidden" name="Titular8" class="form-control">

																									    <p><select name="idJugador9" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-4" style="visibility:hidden" name="Titular9" class="form-control">

																									    <p><select name="idJugador10" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Mediocampista')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="MC-5" style="visibility:hidden" name="Titular10" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        
														                    </div>
														                </div>
														            </div>
																</div>
															</div>
														    

												    
								    			</div>
								    		</div>
								    		<!--------------->
								    		<!-----denaltnero---->
								    		<div class="col-3 align-self-center text-center">
								    			<div class="float-sm-left">
									    			

														<input type="hidden" name="idJugador" value="{{$partidos->idJugador}}" class="form-control">

														<p class="bg-dark">Ingresar Delanteros</p>
														<!---cantidad de delanteros------->
															<div class="row">
																<div class="col">
																	<div class="panel with-nav-tabs panel-default">
														                <div class="panel-heading">
														                        <ul class="nav nav-tabs">
														                        	<div class="col">
														                        	<p class="text-light  bg-secondary"> Cantidad de delantera: </p>
														                        	</div>
														                            <li><a class="btn btn-light" href="#undelv" data-toggle="tab">1</a></li>
														                            <li ><a class="btn btn-light" href="#dosdelv" data-toggle="tab">2</a></li>
														                            <li><a class="btn btn-light" href="#tresdelv" data-toggle="tab">3</a></li>
														                            
														                        </ul>
														                </div>
														                <div class="panel-body">
														                    <div class="tab-content">
														                        <div class="tab-pane fade" id="undelv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										


																									    <p><select name="idJugador11" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC" style="visibility:hidden" name="Titular11" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                   		</div>
														                        <div class="tab-pane fade show active" id="dosdelv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										


																									    <p><select name="idJugador11" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-1" style="visibility:hidden" name="Titular11" class="form-control">

																									    <p><select name="idJugador12" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-2" style="visibility:hidden" name="Titular12" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        <div class="tab-pane fade" id="tresdelv">
														                        	<div class="row">
														                        		<div class="col align-self-center text-center ">
																			    			<div class="float-sm-left">


																								

																										


																									    <p><select name="idJugador11" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-1" style="visibility:hidden" name="Titular11" class="form-control">

																									    <p><select name="idJugador12" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-2" style="visibility:hidden" name="Titular12" class="form-control">

																									    <p><select name="idJugador13" class="form-control">
																									        <option disabled selected value>Seleciona un Jugador...</option>
																									        @foreach ($jugadorclub as $jc)
																									            @if($jc->idClub === $partidos->clubVisitaPartido)
																									            	@if($jc->posicionJugador === 'Delantero')
																									                <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
																									                @endif
																									            @endif
																									        @endforeach
																									    </select></p>

																									    <input type="text" value="DC-3" style="visibility:hidden" name="Titular13" class="form-control">

																									    
																											
																											

																											<input type="text" value="{{$partidos->idPartido}}" style="visibility:hidden" name="idPartido" class="form-control">
																										


																									    

																							    
																			    				
																			    			</div>
																			    		</div>
														                        	</div>
														                        </div>
														                        
														                    </div>
														                </div>
														            </div>
																</div>
															</div>
														    

												    
								    			</div>
								    		</div>
								    	
							







				    		
				    		
				    				</div>
				    	
				    	
				  				</div>
							</div>
						</div>
					</div>
	        	</div>
	        	<button type="submit" class="btn btn-primary">Guardar</button>

			</form>					                        
     	</div>
	</div>
</div>	                        	

<p>.</p>
<p>.</p>

		




@endsection