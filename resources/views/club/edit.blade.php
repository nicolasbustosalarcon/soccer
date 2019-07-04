
@extends ('layouts.app')

@section ('titulo', 'Club Edit - ' .' ' .$clubes->nombreClub)

@section ('content')

	<form class="form-group" method="POST" action="/club/{{$clubes->idClub}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<label class="text-white" for="">Nombre</label>
			<input type="text" name="nombreClub" class="form-control " value="{{$clubes->nombreClub}}" required>
			<label class="text-white" for="">Imagen</label>
			<input type="file" name="imagenClub" class="form-control" value="{{$clubes->imagenClub}}">
			<label class="text-white" for="">Fundación</label>
			<input type="date" name="fundacionClub" class="form-control" value="{{$clubes->fundacionClub}}" required>
			<label class="text-white" for="">Sede</label>
			<input type="text" name="sedeClub" class="form-control" value="{{$clubes->sedeClub}}" required>
			<label class="text-white" for="">Correo</label>
			<input type="text" name="correoClub" class="form-control" value="{{$clubes->correoClub}}">
			<label class="text-white" for="">Teléfono</label>
			<input type="text" name="telefonoClub" class="form-control" value="{{$clubes->telefonoClub}}">
			
			<label class="text-white">Estadio</label>
    			<select name="idEstadio" class="form-control">
   					<option value="{{$clubes->idEstadio}}" >Seleciona una opción...</option>
    				@foreach ($estadios as $est)
    					<option value="{{$est['idEstadio']}}">{{$est['nombreEstadio']}}</option>
    				@endforeach
    			</select>
    		<label class="text-white">País</label>
    			<select name="idPais" class="form-control" required>
    				<option value="{{$clubes->idPais}}">Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			<label class="text-white">Ciudad</label>
    			<select name="idCiudad" class="form-control" required>
    				<option value="{{$clubes->idCiudad}}">Seleciona una opción...</option>
    				@foreach ($ciudades as $cd)
    					<option value="{{$cd['idCiudad']}}">{{$cd['nombreCiudad']}}</option>
    				@endforeach
    			</select>
			
			<label class="text-white">Director Técnico</label>
    			<select name="idDirectorTecnico" class="form-control" required>
    				<option value="{{$clubes->idDirectorTecnico}}">Seleciona una opción...</option>
    				@foreach ($directorestecnicos as $dts)
    					<option value="{{$dts['idDirectorTecnico']}}">{{$dts['nombreDirectorTecnico']}} {{$dts['apellidosDirectorTecnico']}}</option>
    				@endforeach
    			</select>
			<label class="text-white">Asociación</label>
    			<select name="idAsociacion" class="form-control" required>
    				<option value="{{$clubes->idAsociacion}}">Seleciona una opción...</option>
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>

            <label class="text-white">Torneo</label>
                <select name="idTorneo" class="form-control" required>
                    <option value="{{$clubes->idTorneo}}">Seleciona una opción...</option>
                    @foreach ($torneos as $tor)
                        <option value="{{$tor['idTorneo']}}">{{$tor['nombreTorneo']}}</option>
                    @endforeach
                </select>
        </div>

			<button type="submit" class="btn btn-primary">Editar</button>
            <a href="../../admin" class='btn btn-danger'>Atrás</a>


		</div>
	</form>
    <div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>

@endsection