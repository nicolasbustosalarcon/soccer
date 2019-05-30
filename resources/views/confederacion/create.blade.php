
@extends ('layouts.app')

@section ('titulo', 'Confederacion Create')

@section ('content')
	<form class="form-group" method="POST" action="/confederacion" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreConfederacion" class="form-control" required>
			<label for="">Imagen</label>
			<input type="file" name="imagenConfederacion" class="form-control"required>
			<label for="">Fundación</label>
			<input type="date" name="fundacionConfederacion" class="form-control" required>
			<label for="">Sede</label>
			<input type="text" name="sedeConfederacion" class="form-control" required>
			
			<label>Continente</label>
    			<select name="idContinente" class="form-control" required>
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($continentes as $cont)
    					<option value="{{$cont['idContinente']}}">{{$cont['nombreContinente']}}</option>
    				@endforeach
    			</select>
    		<label>País</label>
    			<select name="idPais" class="form-control" required>
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			


			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
		 <a href="../../admin" class='btn btn-danger'>Atrás</a>
	</form>	

@endsection