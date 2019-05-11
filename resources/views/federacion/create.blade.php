
@extends ('layouts.app')

@section ('titulo', 'Federacion Create')

@section ('content')
	<form class="form-group" method="POST" action="/federacion" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreFederacion" class="form-control">
			<label for="">Imagen</label>
			<input type="file" name="imagenFederacion" class="form-control">
			<label for="">Fundación</label>
			<input type="date" name="fundacionFederacion" class="form-control">
			<label for="">Sede</label>
			<input type="text" name="sedeFederacion" class="form-control">
			
			<label>Confederación</label>
    			<select name="idConfederacion" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($confederaciones as $conf)
    					<option value="{{$conf['idConfederacion']}}">{{$conf['nombreConfederacion']}}</option>
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