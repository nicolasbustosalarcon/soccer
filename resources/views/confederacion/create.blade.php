
@extends ('layouts.app')

@section ('titulo', 'Confederacion Create')

@section ('content')
	<form class="form-group" method="POST" action="/confederacion" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreConfederacion" class="form-control">
			<label for="">Imagen</label>
			<input type="file" name="imagenConfederacion" class="form-control">
			<label for="">Fundación</label>
			<input type="date" name="fundacionConfederacion" class="form-control">
			<label for="">Sede</label>
			<input type="text" name="sedeConfederacion" class="form-control">
			
			<label>Continente</label>
    			<select name="idContinente" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($continentes as $cont)
    					<option value="{{$cont['idContinente']}}">{{$cont['nombreContinente']}}</option>
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