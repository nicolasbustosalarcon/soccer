
@extends ('layouts.app')

@section ('titulo', 'Arbitro Create')

@section ('content')
	<form class="form-group" method="POST" action="/arbitro" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreArbitro" class="form-control" required>
		</div>
        <div class="form-group">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosArbitro" class="form-control" required>
		</div>
        <div class="form-group">
			<label for="">Imagen</label>
			<input type="file" name="imagenArbitro" >
		</div>
        <div class="form-group">
			<label for="">Nacimiento</label>
		</div>
		<div class="form-group">
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
					<option value="2000">1991</option>
					<option value="1999">1990</option>
					<option value="1998">1989</option>
					<option value="1997">1988</option>
					<option value="1996">1987</option>
					<option value="1995">1986</option>
					<option value="1994">1985</option>
					<option value="1993">1984</option>
					<option value="1992">1983</option>
				</select>
			</div>
		</div>
		<div class="form-group">
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
		<div class="form-group">
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

        <div class="form-group">
			<label>Tipo</label>
			<select name="tipoArbitro" class="form-control" required>

					<option disabled selected value>Seleciona una opción...</option>
					<option value="arbitroCentral">Árbitro central</option>
					<option value="arbitroAsistente1">Árbitro asistente n° 1</option>
					<option value="arbitroAsistente2">Árbitro asistente n° 2</option>
    				
			</select>	
		</div>

		<div class="form-group">
			<label>Grado</label>
			<select name="gradoArbitro" class="form-control" required>
			
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="arbitroFIFA">Árbitro FIFA</option>
					<option value="arbitroNacional">Árbitro Nacional</option>

			</select>	
			
    		<label>País</label>
    			<select name="idPais" class="form-control" required>
    			
        
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			
			<label>Asociación</label>
    			<select name="idAsociacion" class="form-control" required>
    			
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>


			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
	<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection