
@extends ('layouts.app')

@section ('titulo', 'Club Create')

@section ('content')
	<form class="form-group" method="POST" action="/club" enctype="multipart/form-data">	
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreClub" class="form-control">
        </div>
        <div class="form-group">

			<label for="">Imagen</label>
			<input type="file" name="imagenClub">
        </div>
        <div class="form-group">
			<label for="">Fundación</label>
			<input type="date" name="fundacionClub" class="form-control">
        </div>
        <div class="form-group">
			<label for="">Sede</label>
			<input type="text" name="sedeClub" class="form-control">
        </div>
        <div class="form-group">
			<label for="">Correo</label>
			<input type="text" name="correoClub" class="form-control">
        </div>
        <div class="form-group">
			<label for="">Teléfono</label>
			<input type="text" name="telefonoClub" class="form-control">
        </div>

        <div class="form-group">
			<label>Estadio</label>
    			<select name="idEstadio" class="form-control">
   					<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($estadios as $est)
    					<option value="{{$est['idEstadio']}}">{{$est['nombreEstadio']}}</option>
    				@endforeach
    			</select>
        </div>

        <div class="form-group">
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
		</div>

        <div class="form-group">
        	<label>Ciudad</label>
    			<select name="idCiudad" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($ciudades as $cd)
    					<option value="{{$cd['idCiudad']}}">{{$cd['nombreCiudad']}}</option>
    				@endforeach
    			</select>
		</div>

        <div class="form-group">	
			<label>Director Técnico</label>
    			<select name="idDirectorTecnico" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($directorestecnicos as $dts)
    					<option value="{{$dts['idDirectorTecnico']}}">{{$dts['nombreDirectorTecnico']}} {{$dts['apellidosDirectorTecnico']}}</option>
    				@endforeach
    			</select>
		</div>

        <div class="form-group">
        	<label>Asociación</label>
    			<select name="idAsociacion" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>
        </div>


        <div class="form-group">
            <label>Torneo</label>
                <select name="idTorneo" class="form-control">
                    <option disabled selected value>Seleciona una opción...</option>
                    @foreach ($torneos as $tor)
                        <option value="{{$tor['idTorneo']}}">{{$tor['nombreTorneo']}}</option>
                    @endforeach
                </select>
        </div>

			<button type="submit" class="btn btn-primary">Guardar</button>
		
	</form>	
@endsection