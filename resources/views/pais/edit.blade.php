
@extends ('layouts.app')

@section ('titulo', 'Pais Edit - ' .' ' .$paises->nombrePais)

@section ('content')

	<form class="form-group" method="POST" action="/pais/{{$paises->idPais}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
			<input type="text" name="nombrePais" class="form-control" value="{{$paises->nombrePais}}">
			
			<label>Continente</label>
    			<select name="idContinente" class="form-control">
   					<option value="{{$paises->idContinente}}" >Seleciona una opción...</option>
    				@foreach ($continentes as $cont)
    					<option value="{{$cont['idContinente']}}">{{$cont['nombreContinente']}}</option>
    				@endforeach
    			</select>
    		
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection