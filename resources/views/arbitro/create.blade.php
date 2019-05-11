
@extends ('layouts.app')

@section ('titulo', 'Arbitro Create')

@section ('content')
	<form class="form-group" method="POST" action="/arbitro" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreArbitro" class="form-control">
		</div>
        <div class="form-group">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosArbitro" class="form-control">
		</div>
        <div class="form-group">
			<label for="">Imagen</label>
			<input type="file" name="imagenArbitro" >
		</div>
        <div class="form-group">
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoArbitro" class="form-control">
		</div>

        <div class="form-group">
			<label>Tipo</label>
			<select name="tipoArbitro" class="form-control">

					<option disabled selected value>Seleciona una opción...</option>
					<option value="arbitroCentral">Árbitro central</option>
					<option value="arbitroAsistente1">Árbitro asistente n° 1</option>
					<option value="arbitroAsistente2">Árbitro asistente n° 2</option>
    				
			</select>	
		</div>

		<div class="form-group">
			<label>Grado</label>
			<select name="gradoArbitro" class="form-control">
			
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="arbitroFIFA">Árbitro FIFA</option>
					<option value="arbitroNacional">Árbitro Nacional</option>

			</select>	

			<label for="">Edad</label>
			<input type="text" name="edadArbitro" class="form-control">
		
			
			
    		<label>País</label>
    			<select name="idPais" class="form-control">
    			
        
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			
			<label>Asociación</label>
    			<select name="idAsociacion" class="form-control">
    			
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>


			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>

@endsection