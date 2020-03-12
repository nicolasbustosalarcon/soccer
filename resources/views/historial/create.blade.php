
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPrimerDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSegundoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTercerDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCuartoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalQuintoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSextoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSeptimoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOctavoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNovenoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDecimoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOnceavoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDoceavoDefensa">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPrimerMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSegundoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTercerMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCuartoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalQuintoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSextoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSeptimoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOctavoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNovenoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDecimoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOnceavoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDoceavoMediocampo">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPrimerDelantero">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSegundoDelantero">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTercerDelantero">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCuartoDelantero">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalQuintoDelantero">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSextoDelantero">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalArquero1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPrimerDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSegundoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTercerDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCuartoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalQuintoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSextoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSeptimoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOctavoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNovenoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDecimoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOnceavoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDoceavoDefensa1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPrimerMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSegundoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTercerMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCuartoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalQuintoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSextoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSeptimoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOctavoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNovenoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDecimoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOnceavoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDoceavoMediocampo1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPrimerDelantero1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSegundoDelantero1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTercerDelantero1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCuartoDelantero1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalQuintoDelantero1">
Add Stats!
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
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSextoDelantero1">
Add Stats!
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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
		  <input class="form-check-input" name="amarillaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Amarilla
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="rojaJugador" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Tarjeta Roja
		  </label>
		</div>
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