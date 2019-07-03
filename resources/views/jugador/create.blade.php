
@extends ('layouts.app')

@section ('titulo', 'Jugador Create')

@section ('content')
	<form class="form-group" method="POST" action="/jugador" enctype="multipart/form-data">	
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
		</div>
		<div class="form-group">
			<input type="text" name="nombreJugador" class="form-control" required>
		</div>
		<div class="form-group text-light">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosJugador" class="form-control" required>
		</div>
		<div class="form-group text-light">
			<label for="">Nacimiento</label>
		</div>
		<div class="form-group text-light">
			<div class="form-group">
				<label>Año:  </label>
				<select name="anho" class="form-control" required>
					<option disabled selected value>Selecionar Año...</option>
					<option value="2000">2000</option>
					<option value="1999">1999</option>
					<option value="1998">1998</option>
					<option value="1997">1997</option>
					<option value="1996">1996</option>
					<option value="1995">1995</option>
					<option value="1994">1994</option>
					<option value="1993">1993</option>
					<option value="1992">1992</option>
					<option value="1991">1991</option>
					<option value="1990">1990</option>
					<option value="1989">1989</option>
					<option value="1988">1988</option>
					<option value="1987">1987</option>
					<option value="1986">1986</option>
					<option value="1985">1985</option>
					<option value="1984">1984</option>
					<option value="1983">1983</option>
					<option value="1983">1982</option>
					<option value="1983">1981</option>
					<option value="1983">1980</option>
					<option value="1983">1979</option>
					<option value="1983">1978</option>

				</select>
			</div>
		</div>
		<div class="form-group text-light">
			<label>Mes: </label>
			<select name="mes" class="form-control" required>
				<option disabled selected value>Seleciona Mes...</option>
				<option value="01">Enero</option>
				<option value="02">Febrero</option>
				<option value="03">Marzo</option>
				<option value="04">Abril</option>
				<option value="05">Mayo</option>
				<option value="06">Junio</option>
				<option value="07">Julio</option>
				<option value="08">Agosto</option>
				<option value="09">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
		</div>
		<div class="form-group text-light">
			<label>Dia:   </label>
			<select name="dia" class="form-control" required>
				<option disabled selected value>Seleciona Día...</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>	
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
		</div>
		<div class="form-group text-light">
			<label>Posición</label>
			<select name="posicionJugador" class="form-control" required>
		</div>
		<div class="form-group text-light">
			<option disabled selected value>Seleciona una opción...</option>
			<option value="Arquero">Arquero</option>
			<option value="Defensa">Defensa</option>
			<option value="Mediocampista">Mediocampista</option>
			<option value="Delantero">Delantero</option>
		</select>
	    </div>
	    <div class="col-3 form-group text-light">
	    	<label for="">Altura</label>
	    	<div class="input-group mb-3">
	    		<input type="text" name="alturaJugador" class="form-control" required>
	    		<div class="input-group-append">
	    		<span class="input-group-text">cm.</span>
	    	    </div>
			</div>
		</div>
		<div class="col-3 form-group text-light">
			<label for="">Peso</label>
				<div class="input-group mb-3">
				<input type="text" name="pesoJugador" class="form-control" required>
				<div class="input-group-append">
	    		<span class="input-group-text">kg.</span>
  				</div>
			</div>
		</div>
		<div class="form-group text-light">
			<label>Pie</label>
			<select name="pieJugador" class="form-control" required>
		</div>
		<div class="form-group">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="derecho">Derecho</option>
					<option value="izquierdo">Izquierdo</option>
			</select>
		</div>

		<div class="form-group text-light">
			<label for="imagenJugador">Imagen</label>
			<input type="file" name="imagenJugador" class="form-control">
		</div>
		
		<div class="form-group text-light">
							
			<label>Club</label>
    			<select name="idClub" class="form-control" required>
		
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>
		</div>


		<div class="form-group text-light">
			
    		<label>Nacionalidad</label>
    			<select name="idPais" class="form-control" required>
		
			<option disabled selected value>Seleciona una opción...</option>
			@foreach ($paises as $ps)
					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
			@endforeach
			</select>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
	<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">  
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button></a>
    </div>
@endsection