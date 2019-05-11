
@extends ('layouts.app')

@section ('titulo', 'Ciudad Edit - ' .' ' .$ciudades->nombreCiudad)

@section ('content')

	<form class="form-group" method="POST" action="/ciudad/{{$ciudades->idCiudad}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreCiudad" class="form-control" value="{{$ciudades->nombreCiudad}}">
			
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
    		

			<button type="submit" class="btn btn-primary">Editar</button>


		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection