
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
<!-- Button trigger modal -->
<button type="button"  class="fas fa-edit" data-toggle="modal" data-target="#modalArquero">
</button>
<p></p>
														   
																
																<input type="text" value="GK-L" style="visibility:hidden" name="Titular14" class="form-control">


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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalPrimerDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-1-L" style="visibility:hidden" name="Titular15" class="form-control">


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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSegundoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-2-L" style="visibility:hidden" name="Titular16" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalTercerDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-3-L" style="visibility:hidden" name="Titular17" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalCuartoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFI-L" style="visibility:hidden" name="Titular15" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalQuintoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-1-L" style="visibility:hidden" name="Titular16" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSextoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-2-L" style="visibility:hidden" name="Titular17" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSeptimoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFD-L" style="visibility:hidden" name="Titular18" class="form-control" >

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOctavoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFI-L" style="visibility:hidden" name="Titular15" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalNovenoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-1-L" style="visibility:hidden" name="Titular16" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDecimoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-2-L" style="visibility:hidden" name="Titular17" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOnceavoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFC-3-L" style="visibility:hidden" name="Titular18" class="form-control" >

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDoceavoDefensa">
</button>
<p></p>
																									    <input type="text" value="DFD-L" style="visibility:hidden" name="Titular19" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalPrimerMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-1-L" style="visibility:hidden" name="Titular20" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSegundoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-2-L" style="visibility:hidden" name="Titular21" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalTercerMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-3-L" style="visibility:hidden" name="Titular22" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalCuartoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-1-L" style="visibility:hidden" name="Titular20" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalQuintoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-2-L" style="visibility:hidden" name="Titular21" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSextoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-3-L" style="visibility:hidden" name="Titular22" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSeptimoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-4-L" style="visibility:hidden" name="Titular23" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOctavoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-1-L" style="visibility:hidden" name="Titular20" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalNovenoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-2-L" style="visibility:hidden" name="Titular21" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDecimoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-3-L" style="visibility:hidden" name="Titular22" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOnceavoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-4-L" style="visibility:hidden" name="Titular23" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDoceavoMediocampo">
</button>
<p></p>
																									    <input type="text" value="MC-5-L" style="visibility:hidden" name="Titular24" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalPrimerDelantero">
</button>
<p></p>
																									    <input type="text" value="DC-L" style="visibility:hidden" name="Titular25" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSegundoDelantero">
</button>
<p></p>
																									    <input type="text" value="DC-1-L" style="visibility:hidden" name="Titular25" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalTercerDelantero">
</button>
<p></p>
																									    <input type="text" value="DC-2-L" style="visibility:hidden" name="Titular26" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalCuartoDelantero">
</button>
<p></p>
																									    <input type="text" value="DC-1-L" style="visibility:hidden" name="Titular25" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalQuintoDelantero">
</button>
<p></p>
																									    <input type="text" value="DC-2-L" style="visibility:hidden" name="Titular26" class="form-control">

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSextoDelantero">
</button>
<p></p>
																									    <input type="text" value="DC-3-L" style="visibility:hidden" name="Titular27" class="form-control">

																									    
																											
																											

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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalArquero1">
</button>
<p></p>
														   
																
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalPrimerDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSegundoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalTercerDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalCuartoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalQuintoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSextoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSeptimoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOctavoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalNovenoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDecimoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOnceavoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDoceavoDefensa1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalPrimerMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSegundoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalTercerMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalCuartoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalQuintoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSextoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSeptimoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOctavoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalNovenoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDecimoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalOnceavoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalDoceavoMediocampo1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalPrimerDelantero1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSegundoDelantero1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalTercerDelantero1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalCuartoDelantero1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalQuintoDelantero1">
</button>
<p></p>
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
<!-- Button trigger modal -->
<button type="button" class="fas fa-edit" data-toggle="modal" data-target="#modalSextoDelantero1">
</button>
<p></p>
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
		<!-- Modal -->
<div class="modal fade" id="modalArquero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador14" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador14" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange0">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90"  name="minutosJugador14" id="customRange0">
		</div>
		    <label for="exampleFormControlSelect1">Goles Jugador</label>
		    <select class="form-control" name="golJugador14" id="exampleFormControlSelect1">
			      <option class="text" value="0">0</option>
			      <option class="text" value="1">1</option>
			      <option class="text" value="2">2</option>
			      <option class="text" value="3">3</option>
			      <option class="text" value="4">4</option>
			      <option class="text" value="5">5</option>
		    </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalPrimerDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador15" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador15" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange1">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador15" id="customRange1">
		</div>
		    <label for="exampleFormControlSelect">Goles Jugador</label>
		    <select class="form-control" name="golJugador15" id="exampleFormControlSelect">
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSegundoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador16" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador16" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange2">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador16" id="customRange2">
		</div>
		    <label for="exampleFormControlSelect1">Goles Jugador</label>
		    <select class="form-control" name="golJugador16" id="exampleFormControlSelect1">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalTercerDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador17" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador17" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange3">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador17" id="customRange3">
		</div>
		    <label for="exampleFormControlSelect2">Goles Jugador</label>
		    <select class="form-control" name="golJugador17" id="exampleFormControlSelect2">
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalCuartoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador15" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador15" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange4">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador15" id="customRange4">
		</div>
		    <label for="exampleFormControlSelect3">Goles Jugador</label>
		    <select class="form-control" name="golJugador15" id="exampleFormControlSelect3">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalQuintoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador5" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador5" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange5">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador5" id="customRange5">
		</div>
		    <label for="exampleFormControlSelect4">Goles Jugador</label>
		    <select class="form-control" name="golJugador5" id="exampleFormControlSelect4">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSextoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador17" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador17" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange6">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador17" id="customRange6">
		</div>
		    <label for="exampleFormControlSelect5">Goles Jugador</label>
		    <select class="form-control" name="golJugador17" id="exampleFormControlSelect5">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSeptimoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador18" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador18" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange7">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador18" id="customRange7">
		</div>
		    <label for="exampleFormControlSelect6">Goles Jugador</label>
		    <select class="form-control" name="golJugador18" id="exampleFormControlSelect6">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOctavoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador15" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador15" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange8">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador15" id="customRange8">
		</div>
		    <label for="exampleFormControlSelect7">Goles Jugador</label>
		    <select class="form-control" name="golJugador15" id="exampleFormControlSelect7">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalNovenoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador16" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador16" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange9">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador16" id="customRange9">
		</div>
		    <label for="exampleFormControlSelect9">Goles Jugador</label>
		    <select class="form-control" name="golJugador16" id="exampleFormControlSelect9">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDecimoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador17" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador17" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange10">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador17" id="customRange10">
		</div>
		    <label for="exampleFormControlSelect9">Goles Jugador</label>
		    <select class="form-control" name="golJugador17" id="exampleFormControlSelect9">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOnceavoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador18" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador18" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange11">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador18" id="customRange11">
		</div>
		    <label for="exampleFormControlSelect10">Goles Jugador</label>
		    <select class="form-control" name="golJugador18" id="exampleFormControlSelect10">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDoceavoDefensa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador19" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador19" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange12">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador19" id="customRange12">
		</div>
		    <label for="exampleFormControlSelect11">Goles Jugador</label>
		    <select class="form-control" name="golJugador19" id="exampleFormControlSelect11">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalPrimerMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador20" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador20" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange13">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador20" id="customRange13">
		</div>
		    <label for="exampleFormControlSelect12">Goles Jugador</label>
		    <select class="form-control" name="golJugador20" id="exampleFormControlSelect12">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSegundoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador21" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador21" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange14">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador21" id="customRange14">
		</div>
		    <label for="exampleFormControlSelect13">Goles Jugador</label>
		    <select class="form-control" name="golJugador21" id="exampleFormControlSelect13">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalTercerMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador22" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador22" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange15">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador22" id="customRange15">
		</div>
		    <label for="exampleFormControlSelect14">Goles Jugador</label>
		    <select class="form-control" name="golJugador22" id="exampleFormControlSelect14">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalCuartoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador20" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador20" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange16">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador20" id="customRange16">
		</div>
		    <label for="exampleFormControlSelect15">Goles Jugador</label>
		    <select class="form-control" name="golJugador20" id="exampleFormControlSelect15">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalQuintoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador21" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador21" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange17">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador21" id="customRange17">
		</div>
		    <label for="exampleFormControlSelect16">Goles Jugador</label>
		    <select class="form-control" name="golJugador21" id="exampleFormControlSelect16">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSextoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador22" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador22" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange18">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador22" id="customRange18">
		</div>
		    <label for="exampleFormControlSelect17">Goles Jugador</label>
		    <select class="form-control" name="golJugador22" id="exampleFormControlSelect17">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSeptimoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador23" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador23" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange19">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador23" id="customRange19">
		</div>
		    <label for="exampleFormControlSelect18">Goles Jugador</label>
		    <select class="form-control" name="golJugador23" id="exampleFormControlSelect18">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOctavoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador20" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador20" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange20">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador20" id="customRange20">
		</div>
		    <label for="exampleFormControlSelect19">Goles Jugador</label>
		    <select class="form-control" name="golJugador20" id="exampleFormControlSelect19">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalNovenoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador21" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador21" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange21">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador21" id="customRange21">
		</div>
		    <label for="exampleFormControlSelect20">Goles Jugador</label>
		    <select class="form-control" name="golJugador21" id="exampleFormControlSelect20">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDecimoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador22" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador22" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange22">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador22" id="customRange22">
		</div>
		    <label for="exampleFormControlSelect21">Goles Jugador</label>
		    <select class="form-control" name="golJugador22" id="exampleFormControlSelect21">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOnceavoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador23" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador23" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange23">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador23" id="customRange23">
		</div>
		    <label for="exampleFormControlSelect22">Goles Jugador</label>
		    <select class="form-control" name="golJugador23" id="exampleFormControlSelect22">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDoceavoMediocampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador24" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador24" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange24">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador24" id="customRange24">
		</div>
		    <label for="exampleFormControlSelect23">Goles Jugador</label>
		    <select class="form-control" name="golJugador24" id="exampleFormControlSelect23">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalPrimerDelantero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador25" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador25" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange25">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador25" id="customRange25">
		</div>
		    <label for="exampleFormControlSelect24">Goles Jugador</label>
		    <select class="form-control" name="golJugador25" id="exampleFormControlSelect24">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSegundoDelantero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador25" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador25" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange26">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador25" id="customRange26">
		</div>
		    <label for="exampleFormControlSelect25">Goles Jugador</label>
		    <select class="form-control" name="golJugador25" id="exampleFormControlSelect25">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalTercerDelantero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador26" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador26" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange27">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador26" id="customRange27">
		</div>
		    <label for="exampleFormControlSelect26">Goles Jugador</label>
		    <select class="form-control" name="golJugador26" id="exampleFormControlSelect26">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalCuartoDelantero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador25" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador25" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange28">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador25" id="customRange28">
		</div>
		    <label for="exampleFormControlSelect27">Goles Jugador</label>
		    <select class="form-control" name="golJugador25" id="exampleFormControlSelect27">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalQuintoDelantero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador26" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador26" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange29">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador26" id="customRange29">
		</div>
		    <label for="exampleFormControlSelect29">Goles Jugador</label>
		    <select class="form-control" name="golJugador26" id="exampleFormControlSelect29">
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSextoDelantero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador27" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador27" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange30">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador27" id="customRange30">
		</div>
		    <label for="exampleFormControlSelect30">Goles Jugador</label>
		    <select class="form-control" name="golJugador27" id="exampleFormControlSelect30">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalArquero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador0" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador0" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange31">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" value="90" name="minutosJugador0" id="customRange31">
		</div>
		    <label for="exampleFormControlSelect31">Goles Jugador</label>
		    <select class="form-control" name="golJugador0" id="exampleFormControlSelect31>
		      
		      <option value="10">-</select>
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalPrimerDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador1" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador1" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange32">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador1" id="customRange32">
		</div>
		    <label for="exampleFormControlSelect32">Goles Jugador</label>
		    <select class="form-control" name="golJugador1" id="exampleFormControlSelect32">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSegundoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador2" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador2" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange33">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador2" id="customRange33">
		</div>
		    <label for="exampleFormControlSelect33">Goles Jugador</label>
		    <select class="form-control" name="golJugador2" id="exampleFormControlSelect33">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalTercerDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador3" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador3" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange34">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador3" id="customRange34">
		</div>
		    <label for="exampleFormControlSelect34">Goles Jugador</label>
		    <select class="form-control" name="golJugador3" id="exampleFormControlSelect34">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalCuartoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador1" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador1" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange35">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador1" id="customRange35">
		</div>
		    <label for="exampleFormControlSelect35">Goles Jugador</label>
		    <select class="form-control" name="golJugador1" id="exampleFormControlSelect35">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalQuintoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador2" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador2" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange36">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador2" id="customRange36">
		</div>
		    <label for="exampleFormControlSelect36">Goles Jugador</label>
		    <select class="form-control" name="golJugador2" id="exampleFormControlSelect36">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSextoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador3" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador3" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange37">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador3" id="customRange37">
		</div>
		    <label for="exampleFormControlSelect37">Goles Jugador</label>
		    <select class="form-control" name="golJugador3" id="exampleFormControlSelect37">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSeptimoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador4" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador4" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange38">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador4" id="customRange38">
		</div>
		    <label for="exampleFormControlSelect38">Goles Jugador</label>
		    <select class="form-control" name="golJugador4" id="exampleFormControlSelect38">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOctavoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador1" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador1" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange39">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador1" id="customRange39">
		</div>
		    <label for="exampleFormControlSelect39">Goles Jugador</label>
		    <select class="form-control" name="golJugador1" id="exampleFormControlSelect39">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalNovenoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador2" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador2" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange40">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador2" id="customRange40">
		</div>
		    <label for="exampleFormControlSelect40">Goles Jugador</label>
		    <select class="form-control" name="golJugador2" id="exampleFormControlSelect40">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDecimoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador3" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador3" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange41">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador3" id="customRange41">
		</div>
		    <label for="exampleFormControlSelect41">Goles Jugador</label>
		    <select class="form-control" name="golJugador3" id="exampleFormControlSelect41">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOnceavoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador4" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador4" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange42">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador4" id="customRange42">
		</div>
		    <label for="exampleFormControlSelect42">Goles Jugador</label>
		    <select class="form-control" name="golJugador1" id="exampleFormControlSelect42">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDoceavoDefensa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador5" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador5" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange43">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador5" id="customRange43">
		</div>
		    <label for="exampleFormControlSelect43">Goles Jugador</label>
		    <select class="form-control" name="golJugador5" id="exampleFormControlSelect43">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalPrimerMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador6" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador6" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange44">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador6" id="customRange44">
		</div>
		    <label for="exampleFormControlSelect44">Goles Jugador</label>
		    <select class="form-control" name="golJugador6" id="exampleFormControlSelect44">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSegundoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador7" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador7" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange45">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador7" id="customRange45">
		</div>
		    <label for="exampleFormControlSelect45">Goles Jugador</label>
		    <select class="form-control" name="golJugador7" id="exampleFormControlSelect45">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalTercerMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador8" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador8" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange46">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador8" id="customRange46">
		</div>
		    <label for="exampleFormControlSelect46">Goles Jugador</label>
		    <select class="form-control" name="golJugador8" id="exampleFormControlSelect46">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalCuartoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador6" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador6" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange47">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador6" id="customRange47">
		</div>
		    <label for="exampleFormControlSelect47">Goles Jugador</label>
		    <select class="form-control" name="golJugador6" id="exampleFormControlSelect47">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalQuintoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador7" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador7" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange48">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador7" id="customRange48">
		</div>
		    <label for="exampleFormControlSelect48">Goles Jugador</label>
		    <select class="form-control" name="golJugador7" id="exampleFormControlSelect48">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSextoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador8" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador8" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange49">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador8" id="customRange49">
		</div>
		    <label for="exampleFormControlSelect49">Goles Jugador</label>
		    <select class="form-control" name="golJugador8" id="exampleFormControlSelect49">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSeptimoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador9" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador9" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange50">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador9" id="customRange50">
		</div>
		    <label for="exampleFormControlSelect50">Goles Jugador</label>
		    <select class="form-control" name="golJugador9" id="exampleFormControlSelect50">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOctavoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador6" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador6" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange51">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador6" id="customRange51">
		</div>
		    <label for="exampleFormControlSelect51">Goles Jugador</label>
		    <select class="form-control" name="golJugador6" id="exampleFormControlSelect51">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalNovenoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador7" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador7" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange52">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador7" id="customRange52">
		</div>
		    <label for="exampleFormControlSelect52">Goles Jugador</label>
		    <select class="form-control" name="golJugador7" id="exampleFormControlSelect52">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDecimoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador8" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador8" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange53">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador8" id="customRange53">
		</div>
		    <label for="exampleFormControlSelect53">Goles Jugador</label>
		    <select class="form-control" name="golJugador8" id="exampleFormControlSelect53">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalOnceavoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador9" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador9" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange54">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador9" id="customRange54">
		</div>
		    <label for="exampleFormControlSelect54">Goles Jugador</label>
		    <select class="form-control" name="golJugador9" id="exampleFormControlSelect54">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalDoceavoMediocampo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador10" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador10" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange55">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador10" id="customRange55">
		</div>
		    <label for="exampleFormControlSelect55">Goles Jugador</label>
		    <select class="form-control" name="golJugador10" id="exampleFormControlSelect55">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalPrimerDelantero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador11" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador11" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange56">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador11" id="customRange56">
		</div>
		    <label for="exampleFormControlSelect56">Goles Jugador</label>
		    <select class="form-control" name="golJugador11" id="exampleFormControlSelect56">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSegundoDelantero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador11" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador11" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange57">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador11" id="customRange57">
		</div>
		    <label for="exampleFormControlSelect57">Goles Jugador</label>
		    <select class="form-control" name="golJugador11" id="exampleFormControlSelect57">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalTercerDelantero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador12" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador12" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange58">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador12" id="customRange58">
		</div>
		    <label for="exampleFormControlSelect58">Goles Jugador</label>
		    <select class="form-control" name="golJugador12" id="exampleFormControlSelect58">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalCuartoDelantero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador11" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador11" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange59">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador11" id="customRange59">
		</div>
		    <label for="exampleFormControlSelect59">Goles Jugador</label>
		    <select class="form-control" name="golJugador11" id="exampleFormControlSelect59">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalQuintoDelantero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador12" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador12" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange60">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador12" id="customRange60">
		</div>
		    <label for="exampleFormControlSelect60">Goles Jugador</label>
		    <select class="form-control" name="golJugador12" id="exampleFormControlSelect60">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
		<!-- Modal -->
<div class="modal fade" id="modalSextoDelantero1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona los Valores para las Estadísticas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
		  <input class="form-check-input" name="amarillaJugador13" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador13" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
		<p></p>
		<div>
			<label for="customRange61">Minutos Jugados</label>
			<input type="range" min="0" max="90" class="custom-range" value="90" name="minutosJugador13" id="customRange61">
		</div>
		    <label for="exampleFormControlSelect61">Goles Jugador</label>
		    <select class="form-control" name="golJugador13" id="exampleFormControlSelect61">
		      
		      <option> Seleccione una cantidad de goles</option>
		      <option value="0">0</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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