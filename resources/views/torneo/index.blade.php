
@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')

<div class="row">
	<div class="col">
		<div class="card bg-dark text-white">
 			<img class="card-img" src="{{asset('images/torneos/fondo.png')}}" alt="Card image" height="180">
  			<div class="card-img-overlay">
    			<div class="row">
    				<div class="col">
    			</div>
			    <div class="col">
			        <div class="text-center">
			            <a href="https://es.uefa.com/uefachampionsleague/" ><img src="images/torneos/chempions_blanca.png" width="100" height="100"><p class="text-light"></p></a>
			        </div>
			    </div>
			    <div class="col">
			        <div class="text-center">
			            <a href="https://es.uefa.com/uefaeuropaleague/" ><img src="images/torneos/europa_blanca.png" width="80" height="100"><p class="text-light"></p></a>
			        </div>
			    </div>
			    <div class="col text-center">
			        <div>
			            <a href="http://www.conmebol.com/es/copa-libertadores-2019" ><img src="http://superk800.com/wp-content/uploads/2017/08/Copa_Conmebol_Libertadores_logo.svg_.png" width="120" height="100"><p class="text-light"></p></a>
			        </div>
			    </div>
			    <div class="col">
			        <div class="text-center">
			            <a href="http://www.conmebol.com/es/copa-sudamericana-2019" ><img src="http://www.lanumero12.com.ar/wp-content/uploads/2017/05/Copa-Sudamericana-1024x819.png" width="120" height="100"><p class="text-light"></p></a>
			        </div>
			    </div>
		    <div class="col">
		    </div>
		</div>	
  			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		 <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
					<li class="nav-item active">
					   	<a class="nav-link text-muted" href="#tab1default" data-toggle="tab">TORNEO</a>
					</li>
					<li class="nav-item">
					   	<a class="nav-link text-muted" href="#tab2default" data-toggle="tab">HISTORIA</a>
					</li>
					<li class="nav-item">
					   	<a class="nav-link text-muted" href="#tab3default" data-toggle="tab">NOTICIAS</a>
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
									  		<h5>Internacionales<img class="float-right" src="{{asset('images/torneos/iconos/internacional.png')}}" width="42" height="42"></h5>
									  	</div>
									  	<div class="card-body">
								  			@foreach($torneos as $tor)
												@foreach($confederaciones as $conf)
													@if($tor->idConfederacion === $conf->idConfederacion)
												    	<p class="card-text">
												    		<div class="row">
													    		<div class="col-1"> <img src="{{asset('images/torneos/' .$tor->imagenTorneo)}}" width="30" height="21">
													    		</div> 
													    		<div class="col">
													    			<td>{{ $tor['nombreTorneo'] }}</td>
																	<td>{{ $tor['edicion'] }}</td>
													    		</div>
												    		</div>
											    		</p>
												    @endif
										    	@endforeach
									    	@endforeach
									    </div>
									</div>
								</div>
								<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Ganadores<img class="float-right" src="{{asset('images/torneos/iconos/ganadores.png')}}" width="42" height="42"></h5>
									  	</div>
									  	<div class="card-body">
								  			@foreach($torneos as $tor)
												@foreach($confederaciones as $conf)
													@if($tor->idConfederacion === $conf->idConfederacion)
														@foreach($clubes as $club)
															@if($tor->idClubCampeon === $club->idClub)
												    			<p class="card-text">
												    			<div class="row">
													    			<div class="col-1"> <img src="{{asset('images/club/' .$club->imagenClub)}}" width="25" height="25">
													    			</div> 
													    			<div class="col">
													    				<td>{{ $club['nombreClub'] }}</td>
													    				<td>{{ $tor['edicion'] }}</td>
													    			</div>
												    			</div>
												    		@endif
														@endforeach
											    		</p>
												    @endif
										    	@endforeach
									    	@endforeach
									    </div>
									</div>
								</div>
								<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Momentos<img class="float-right" src="{{asset('images/torneos/iconos/videos.png')}}" width="42" height="42"></h5>
									  	</div>
									  	<div class="card-body">
								  			<iframe width="400" height="180" src="https://www.youtube.com/embed/20Q9316qhzw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									    </div>
									</div>
								</div> 
							</div>	
                        </div>
                		<div class="tab-pane fade show active" id="tab2default">
                			<div class="row">
                        		<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Historia UEFA<img class="float-right" src="{{asset('images/torneos/200px-Uefa_2013.png')}}" width="40" height="20"></h5>
									  	</div>
									  	<div class="card-body">
								  			<h6 class="text-justify-center">Fundada en Basilea el 15 de junio de 1954, la UEFA se ha convertido en el guardián del fútbol en Europa al trabajar estrechamente con sus federaciones miembro y otras partes interesadas para promover, proteger y fomentar el deporte en todos los niveles.</h6>
								  			<img class="text-justify-center" src="https://img.uefa.com//MultimediaFiles/Photo/uefa/KeyTopics/79/95/21//799521_w1.jpg" width="250" height="125">
								  			<div class="row">
								  				<a href="https://es.uefa.com/insideuefa/about-uefa/history/">...Más Historia</a>	
								  			</div>
									    </div>
									</div>
								</div>
								<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Historia Conmebol<img class="float-right" src="{{asset('images/torneos/iconos/600px-conmebol_logo.svg_.png')}}" width="35" height="35"></h5>
									  	</div>
									  	<div class="card-body">
								  			<h6>
								  				En América del Sur los partidos oficiales entre clubes de distintos países nacieron en 1900, cuando Francis Chevallier Boutell asumió la presidencia de la Asociación del Fútbol Argentino (AFA). Creó la Copa Competencia y donó el trofeo para ser disputado entre los clubes de Buenos Aires, Rosario y Montevideo que se inscribieran para participar.
								  			</h6>
								  			<img src="http://www.conmebol.com/sites/default/files/userimagnes/alberto_spencer.jpg"width="250" height="125">
								  			<div class="row">
								  				<a href="http://www.conmebol.com/es/historia-copa-libertadores">...Más Historia</a>	
								  			</div>
									    </div>
									</div>
								</div>
								<div class="col">
                        			<p></p>
                        			<div class="card text-white bg-secondary mb-3" >
									  	<div class="card-header">
									  		<h5>Supercopa y mundial de clubes<img class="float-right" src="{{asset('images/torneos/iconos/internacional.png')}}" width="42" height="42"></h5>
									  	</div>
									  	<div class="card-body">
								  			<h6>
								  				La Supercopa de Campeones Intercontinentales, Recopa de Campeones Intercontinentales, Recopa Mundial o Recopa Intercontinental es una competición internacional extinta, oficializada por la CONMEBOL desde septiembre de 2005, que enfrentaba a los campeones de la Copa Intercontinental, iniciada 7 años antes. Tenía una recepción muy buena del público, pero se disputaron solo dos ediciones: la de 1968 y 1969.
								  			</h6>
								  			<div class="row">
								  				<a href="https://es.wikipedia.org/wiki/Supercopa_de_Campeones_Intercontinentales">...Más Historia</a>	
								  			</div>

									    </div>
									</div>
								</div> 
							</div>	
                		</div>
                    	<div class="tab-pane fade show active" id="tab3default">
                    		
                    	</div>
                </div>
            </div>           
        </div>
    </div>
	<p>.</p>
</div>

<div class="row">
	<div class="col">
			<a href="../../partido"><button class='btn btn-danger'>Atrás</button></a>
	</div>
</div>
  
 
	<!--<iframe width="1100" height="0.1" src="https://www.youtube.com/embed/UbjnIJ4LB30?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
 
@endsection





<!--<div class="row text-warning">
		<table class="table table-striped text-success">
			<thead>
				<th>Nombre</th>
				<th>Edicion</th>
				<th>Organizador</th>
				<th>Club Campeon</th>
			</thead>
			<tbody>
				@foreach($torneos as $tor)
					@foreach($confederaciones as $conf)
						@if($tor->idConfederacion === $conf->idConfederacion)
						<tr>
							<td>{{ $tor['nombreTorneo'] }}</td>
							<td>{{ $tor['edicion'] }}</td>
							@foreach($confederaciones as $conf)
								@if($tor->idConfederacion === $conf->idConfederacion)
									<td>{{ $conf['nombreConfederacion'] }}</td>		
								@endif
							@endforeach
							
							@if($tor->idClubCampeon === null)
							    <td>Aun no está definido</td>
							@endif
							@foreach($clubes as $club)
								@if($tor->idClubCampeon === $club->idClub)
									<td>{{ $club['nombreClub'] }}</td>
								@endif
							@endforeach	
						</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>-->