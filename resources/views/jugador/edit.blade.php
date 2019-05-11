
@extends ('layouts.app')

@section ('titulo', 'Jugador Edit - ' .' ' .$jugadores->nombreJugador)

@section ('content')

	<form class="form-group" method="POST" action="/jugador/{{$jugadores->idJugador}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreJugador" class="form-control" value="{{$jugadores->nombreJugador}}">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosJugador" class="form-control" value="{{$jugadores->apellidosJugador}}">
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoJugador" class="form-control" value="{{$jugadores->nacimientoJugador}}">
			<label for="">Edad</label>
			<input type="text" name="edadJugador" class="form-control" value="{{$jugadores->edadJugador}}">
			<label>Posición</label>
			<select name="posicionJugador" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="Arquero">Arquero</option>
					<option value="Defensa">Defensa</option>
					<option value="Mediocampista">Mediocampista</option>
					<option value="Delantero">Delantero</option>


			</select>	
			<label for="">Altura (cm)</label>
			<input type="text" name="alturaJugador" class="form-control" value="{{$jugadores->alturaJugador}}">
			<label for="">Peso (kg)</label>
			<input type="text" name="pesoJugador" class="form-control" value="{{$jugadores->pesoJugador}}">
			<label>Pie</label>
			<select name="pieJugador" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="derecho">Derecho</option>
					<option value="izquierdo">Izquierdo</option>
			</select>
			<label for="">Imagen</label>
			<input type="file" name="imagenJugador" class="form-control">
			

					
			<label>Club</label>
    			<select name="idClub" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>
			
    		<label>Nacionalidad</label>
    			<select name="idPais" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			
			

			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection