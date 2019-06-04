
@extends ('layouts.app')

@section ('titulo', 'Confederacion Edit - ' .' ' .$confederaciones->nombreConfederacion)

@section ('content')

	<form class="form-group" method="POST" action="/confederacion/{{$confederaciones->idConfederacion}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
			<input type="text" name="nombreConfederacion" class="form-control" value="{{$confederaciones->nombreConfederacion}}">
			<label for="">Imagen</label>
			<input type="file" name="imagenConfederacion" class="form-control" value="{{$confederaciones->imagenConfederacion}}">
			<label for="">Fundación</label>
			<input type="date" name="fundacionConfederacion" class="form-control" value="{{$confederaciones->fundacionConfederacion}}">
			<label for="">Sede</label>
			<input type="text" name="sedeConfederacion" class="form-control" value="{{$confederaciones->sedeConfederacion}}">
			
			<label>Continente</label>
    			<select name="idContinente" class="form-control">
    				<option value="{{$confederaciones->idContinente}}">Seleciona una opción...</option>
    				@foreach ($continentes as $cont)
    					<option value="{{$cont['idContinente']}}">{{$cont['nombreContinente']}}</option>
    				@endforeach
    			</select>
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				<option value="{{$confederaciones->idPais}}">Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			

			<button type="submit" class="btn btn-primary">Editar</button>


		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection