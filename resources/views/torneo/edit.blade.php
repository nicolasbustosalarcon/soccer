
@extends ('layouts.app')

@section ('titulo', 'Torneo Edit - ' .' ' .$torneos->nombreTorneo)

@section ('content')

	<form class="form-group" method="POST" action="/torneo/{{$torneos->idTorneo}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group text-light">

			
			<label for="">Nombre Torneo</label>
			<input type="text" name="nombreTorneo" class="form-control" value="{{$torneos->nombreTorneo}}" required>
			<label for="">Edición</label>
			<input type="text" name="edicion" class="form-control" value="{{$torneos->edicion}}" required>

            <div class="form-group text-light">
                <label for="imagenTorneo">Imagen</label>
                <input type="file" name="imagenTorneo" class="form-control">
            </div>
			
			<label>Asociación</label>
    			<select name="idAsociacion" class="form-control">
    				<option value="{{$torneos->idAsociacion}}">Seleciona una opción...</option>
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>

					
			<label>Confederación</label>
    			<select name="idConfederacion" class="form-control">
    				<option value="{{$torneos->idConfederacion}}">Seleciona una opción...</option>
    				@foreach ($confederaciones as $conf)
    					<option value="{{$conf['idConfederacion']}}">{{$conf['nombreConfederacion']}}</option>
    				@endforeach
    			</select>
			
    		<label>Club Campeón</label>
    			<select name="idClubCampeon" class="form-control">
    				<option value="{{$torneos->idClubCampeon}}">Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>

    			
			

			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
		<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

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