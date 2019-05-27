
@extends ('layouts.app')

@section ('titulo', 'Jugador Edit - ' .' ' .$jugadores->nombreJugador)

@section ('content')

	<form class="form-group" method="POST" action="/jugador/{{$jugadores->idJugador}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" name="nombreJugador" class="form-control" value="{{$jugadores->nombreJugador}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Apellidos</label>
					<input type="text" name="apellidosJugador" class="form-control" value="{{$jugadores->apellidosJugador}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Nacimiento</label>
					<input type="date" name="nacimientoJugador" class="form-control" value="{{$jugadores->nacimientoJugador}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Edad</label>
					<input type="text" name="edadJugador" class="form-control" value="{{$jugadores->edadJugador}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Posición</label>
					<select name="posicionJugador" class="form-control">
						<option value="{{$jugadores->posicionJugador}}">Seleccionar Posicion</option>
		
						<option value="Arquero">Arquero</option>
						<option value="Defensa">Defensa</option>
						<option value="Mediocampista">Mediocampista</option>
						<option value="Delantero">Delantero</option>
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Altura (cm)</label>
					<input type="text" name="alturaJugador" class="form-control" value="{{$jugadores->alturaJugador}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="">Peso (kg)</label>
					<input type="text" name="pesoJugador" class="form-control" value="{{$jugadores->pesoJugador}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Pie</label>
					<select name="pieJugador" class="form-control" value="{{$jugadores->pieJugador}}">
						<option value="{{$jugadores->pieJugador}}">Seleccionar Pie</option>
						<option value="derecho">Derecho</option>
						<option value="izquierdo">Izquierdo</option>
					</select>
				</div>
			</div>


			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="imagenJugador">Imagen</label>
					<input type="file" name="imagenJugador" class="form-control">
					@if (($jugadores->imagenJugador)!="")
					<img height="100px" width="100px"src="{{asset('images/jugador/'.$jugadores->imagenJugador)}}">
					@endif
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Club</label>
					<select name="idClub" class="form-control" value="{{$jugadores->idClub}}">
						<option value="{{$jugadores->idClub}}">Seleccionar Club</option>
						@foreach ($clubes as $club)
						<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Nacionalidad</label>
					<select name="idPais" class="form-control" value="{{$jugadores->idPais}}">
						<option value="{{$jugadores->idPais}}">Seleccionar Pais</option>
						@foreach ($paises as $ps)
						<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">  
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</form>
	<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">  
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button></a>
    </div>
@endsection