
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
				
			</div>
	<div class="col">
		@foreach($torneos as $tor)
			@foreach($confederaciones as $conf)
				@if($tor->idConfederacion === $conf->idConfederacion)
					<div class="row">
						<div class="col">
							<img src="{{asset('images/torneos/' .$tor->imagenTorneo)}}" class="border border-warning" height="180px" width="180px">
						</div>
						<div class="col">
							<div class="row">
                    			<ul class="tournament-list text-white">
                    				<div class="border border-warning">
                    					@foreach($torneos as $tor)
											@foreach($confederaciones as $conf)
												@if($tor->idConfederacion === $conf->idConfederacion)
                    								<li class="n-tournament">Nombre Torneo:
                    									<span>{{$tor->nombreTorneo}}</span>
                    								</li>
	                    							<li class="edition">Edición:<br>
	                    								<span>{{$tor->edicion}}</span>
	                    							</li>
	                    							<li class="champeon">Club Campeón:<br>
	                    								@if($tor->idClubCampeon === null)
								    						<td>Aun no está definido</td>
														@endif
	                    								@foreach($clubes as $club)
															@if($tor->idClubCampeon === $club->idClub)
																<td>{{ $club['nombreClub'] }}</td>
															@endif
														@endforeach
	                    							</li>
	                    						@endif
	                    					@endforeach
	                    				@endforeach
                    				</div>
                    			</ul>
                    		</div>
						</div>
					</div>
				@endif
			@endforeach
		@endforeach
	</div>
	<div class="col">
		
	</div>
</div>

<!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
---- Include the above in your HEAD tag --------

<div class="container">
	<div class="row">
        <div class="span12">
    		<table class="table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                      <th colspan="7">
                        <span class="btn-group">
                            <a class="btn"><i class="icon-chevron-left"></i></a>
                        	<a class="btn active">February 2012</a>
                        	<a class="btn"><i class="icon-chevron-right"></i></a>
                        </span>
                      </th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="muted">29</td>
                        <td class="muted">30</td>
                        <td class="muted">31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td class="btn-primary"><strong>20</strong></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td class="muted">1</td>
                        <td class="muted">2</td>
                        <td class="muted">3</td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
</div>-->

<div class="row">
	<div class="col">
			<a href="../../partido"><button class='btn btn-danger'>Atrás</button></a>
	</div>
</div>
  
 
	<iframe width="1100" height="0.1" src="https://www.youtube.com/embed/UbjnIJ4LB30?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 
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