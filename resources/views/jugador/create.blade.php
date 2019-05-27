
@extends ('layouts.app')

@section ('titulo', 'Jugador Create')

@section ('content')
	<form class="form-group" method="POST" action="/jugador" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
		</div>
		<div class="form-group">
			<input type="text" name="nombreJugador" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosJugador" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoJugador" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Edad</label>
			<input type="text" name="edadJugador" class="form-control">
		</div>
		<div class="form-group">
			<label>Posición</label>
			<select name="posicionJugador" class="form-control">
		</div>
		<div class="form-group">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="Arquero">Arquero</option>
					<option value="Defensa">Defensa</option>
					<option value="Mediocampista">Mediocampista</option>
					<option value="Delantero">Delantero</option>


			</select>	
		</div>

		<div class="col-3 form-group">

			<label for="">Altura</label>
			<div class="input-group mb-3">
				<input type="text" name="alturaJugador" class="form-control">
				<div class="input-group-append">
	    		<span class="input-group-text">cm.</span>
  				</div>
			</div>
		</div>
		<div class="col-3 form-group">
			<label for="">Peso</label>
				<div class="input-group mb-3">
				<input type="text" name="pesoJugador" class="form-control">
				<div class="input-group-append">
	    		<span class="input-group-text">kg.</span>
  				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Pie</label>
			<select name="pieJugador" class="form-control">
		</div>
		<div class="form-group">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="derecho">Derecho</option>
					<option value="izquierdo">Izquierdo</option>
			</select>
		</div>

		<div class="form-group">
			<label for="imagenJugador">Imagen</label>
			<input type="file" name="imagenJugador" class="form-control">
		</div>
		
		<div class="form-group">
							
			<label>Club</label>
    			<select name="idClub" class="form-control">
		
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>
		</div>


		<div class="form-group">
			
    		<label>Nacionalidad</label>
    			<select name="idPais" class="form-control">
		
			<option disabled selected value>Seleciona una opción...</option>
			@foreach ($paises as $ps)
					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
			@endforeach
			</select>
		</div>
			
			

		
					<button type="submit" class="btn btn-primary">Guardar</button>

	</form>

@endsection