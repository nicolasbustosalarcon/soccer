
@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')
	<div class="row text-warning">
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
	</div>


	<div class="row justify-content-center">
		<div class="row justify-content-center" style="height:250px"> 
			<ul class="row justify-content-center" role="" style="width: 229px;"> 
				<li class="row justify-content-center"  role="" aria-hidden="" style="width: 800px;   height: 400px; margin-right: 0px;"> 
  				<a href="torneo" class="row justify-content-center" > 
						<img class="row justify-content-center" width="1000" height="350" alt="levantar_copa" src="https://www.britanico.edu.pe/blog/wp-content/uploads/2017/10/vocabulario-ingles-britanico-futbol-800x400.jpg"> 
					</a> 
				</li>
			</ul>
		</div>
	</div>
 <div class="row">
    <div class="col">
        
    </div>
    <div class="col">
        <div class="text-center">
            <a href="https://es.uefa.com/uefachampionsleague/" ><img src="images/torneos/champions.png" width="100" height="100"><p class="text-light"></p></a>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <a href="https://es.uefa.com/uefaeuropaleague/" ><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/2015_UEFA_Europa_League_logo.svg/1200px-2015_UEFA_Europa_League_logo.svg.png" width="80" height="100"><p class="text-light"></p></a>
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

  	<a href="../../partido"><button class='btn btn-danger'>Atrás</button></a>
 
	<iframe width="1100" height="0.1" src="https://www.youtube.com/embed/UbjnIJ4LB30?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 
@endsection