
@extends ('layouts.app')

@section ('titulo', 'Director Tecnico Edit - ' .' ' .$directorestecnicos->nombreDirectorTecnico)

@section ('content')

	<form class="form-group" method="POST" action="/directortecnico/{{$directorestecnicos->idDirectorTecnico}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
				<label for="">Nombre</label>
			<input type="text" name="nombreDirectorTecnico" class="form-control"  value="{{$directorestecnicos->nombreDirectorTecnico}}">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosDirectorTecnico" class="form-control"value="{{$directorestecnicos->apellidosDirectorTecnico}}">
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoDirectorTecnico" class="form-control"  value="{{$directorestecnicos->nacimientoDirectorTecnico}}">
			<label for="">Edad</label>
			<input type="text" name="edadDirectorTecnico" class="form-control" value="{{$directorestecnicos->edadDirectorTecnico}}">
			
			<label for="">Imagen</label>
			<input type="file" name="imagenDirectorTecnico" class="form-control" value="{{$directorestecnicos->imagenDirectorTecnico}}">
	
			
    		<label>Nacionalidad</label>
    			<select name="idPais" class="form-control" required>
    				<option value="{{$directorestecnicos->idPais}}">Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>

			<button type="submit" class="btn btn-primary">Editar</button>


		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

@endsection