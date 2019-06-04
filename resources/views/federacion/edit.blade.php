
@extends ('layouts.app')

@section ('titulo', 'Federacion Edit - ' .' ' .$federaciones->nombreFederacion)

@section ('content')

	<form class="form-group" method="POST" action="/federacion/{{$federaciones->idFederacion}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
			<input type="text" name="nombreFederacion" class="form-control" value="{{$federaciones->nombreFederacion}}">
			<label for="">Imagen</label>
			<input type="file" name="imagenFederacion" class="form-control" value="{{$federaciones->imagenFederacion}}">
			<label for="">Fundación</label>
			<input type="date" name="fundacionFederacion" class="form-control" value="{{$federaciones->fundacionFederacion}}">
			<label for="">Sede</label>
			<input type="text" name="sedeFederacion" class="form-control" value="{{$federaciones->sedeFederacion}}">
			
			<label>Confederación</label>
    			<select name="idConfederacion" class="form-control">
    				<option value="{{$federaciones->idConfederacion}}">Seleciona una opción...</option>
    				@foreach ($confederaciones as $conf)
    					<option value="{{$conf['idConfederacion']}}">{{$conf['nombreConfederacion']}}</option>
    				@endforeach
    			</select>
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				<option value="{{$federaciones->idPais}}">Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			


			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection