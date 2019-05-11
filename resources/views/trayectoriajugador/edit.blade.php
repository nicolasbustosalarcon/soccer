
@extends ('layouts.app')

@section ('titulo', 'Trayectoria Edit -' .$trayectorias->idTrayectoria)

@section ('content')
    

	<form class="form-group" method="POST" action="/trayectoriajugador/{{$trayectorias->idTrayectoria}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">

			<input type="hidden" name="idJugador" value="{{$partidos->idPartido}}" class="form-control">
			
			<label for="">Numero Camiseta</label>
			<input type="text" name="camisetaJugador" class="form-control" value="{{$trayectorias->camisetaJugador}}">
		
					
			<label>Torneo</label>
    			<select name="idTorneo" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($torneos as $tor)
    					<option value="{{$tor['idTorneo']}}">{{$tor['nombreTorneo']}}</option>
    				@endforeach
    			</select>
			
    		<label>Club</label>
    			<select name="idClub" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>

    			
			

			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>
                        
             
           
            
    

@endsection

