
@extends ('layouts.app')

@section ('titulo', 'Director Tecnico Create')

@section ('content')
	<form class="form-group" method="POST" action="/directortecnico" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreDirectorTecnico" class="form-control">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosDirectorTecnico" class="form-control">
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoDirectorTecnico" class="form-control">
			<label for="">Edad</label>
			<input type="text" name="edadDirectorTecnico" class="form-control">
			
			<label for="">Imagen</label>
			<input type="file" name="imagenDirectorTecnico" class="form-control">
	
			
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

@endsection
