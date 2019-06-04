
@extends ('layouts.app')

@section ('titulo', 'Asociacion Create')

@section ('content')
	<form class="form-group" method="POST" action="/asociacion" enctype="multipart/form-data">	
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
			<input type="text text-light" name="nombreAsociacion" class="form-control">
			<label for="">Imagen</label>
			<input type="file" name="imagenAsociacion" >
		</div>
		<div class="form-group text-light">
			<label for="">Fundación</label>
			<input type="date" name="fundacionAsociacion" class="form-control">
			<label for="">Sede</label>
			<input type="text" name="sedeAsociacion" class="form-control">
			
			<label>Federación</label>
    			<select name="idFederacion" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($federaciones as $fed)
    					<option value="{{$fed['idFederacion']}}">{{$fed['nombreFederacion']}}</option>
    				@endforeach
    			</select>
    		<label>País</label>
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