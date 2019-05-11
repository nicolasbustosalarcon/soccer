
@extends ('layouts.app')

@section ('titulo', 'Arbitro Edit - ' .' ' .$arbitros->nombreArbitro .' ' .$arbitros->apellidosArbitro)

@section ('content')

	<form class="form-group" method="POST" action="/arbitro/{{$arbitros->idArbitro}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreArbitro" class="form-control" value="{{$arbitros->nombreArbitro}}">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosArbitro" class="form-control" value="{{$arbitros->apellidosArbitro}}">
		</div>
		<!--<div class="form-group">
			<label for="">Imagen</label>
			<input type="file" name="imagenArbitro" class="form-control"><img src="images/arbitro/{{ $arbitros['imagenArbitro']}}" class="img-responsive" style="width:45px !important; height:45px !important">
		</div>-->
		<div class="form-group">
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoArbitro" class="form-control" value="{{$arbitros->nacimientoArbitro}}">
		
			<label>Tipo</label>
			<select name="tipoArbitro" class="form-control" >
					<option value="{{$arbitros->tipoArbitro}}">Actual: {{$arbitros->tipoArbitro}}</option>
					<option value="arbitroCentral">Árbitro central</option>
					<option value="arbitroAsistente1">Árbitro asistente n° 1</option>
					<option value="arbitroAsistente2">Árbitro asistente n° 2</option>
    				
			</select>	

			<label>Grado</label>
			<select name="gradoArbitro" class="form-control">
    				<option value="{{$arbitros->gradoArbitro}}">Actual: {{$arbitros->gradoArbitro}}</option>
					<option value="arbitroFIFA">Árbitro FIFA</option>
					<option value="arbitroNacional">Árbitro Nacional</option>

			</select>	

			<label for="">Edad</label>
			<input type="text" name="edadArbitro" class="form-control" value="{{$arbitros->edadArbitro}}">
			
			
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				@foreach ($paises as $ps)
    					@if($arbitros->idPais === $ps->idPais)
    				<option value="{{$arbitros->idPais}}">Actual: {{$ps->nombrePais}}</option>
    					@endif
					@endforeach
					@foreach ($paises as $ps)
    					<option value ="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			
			<label>Asociación</label>
    			<select name="idAsociacion" class="form-control">
    				@foreach ($asociaciones as $asoc)
    					@if($arbitros->idAsociacion === $asoc->idAsociacion)
    				<option value="{{$arbitros->idAsociacion}}">Actual: {{$asoc->nombreAsociacion}}</option>
    					@endif
    				@endforeach
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>


			<button type="submit" class="btn btn-primary">Editar</button>


		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button></a>
@endsection