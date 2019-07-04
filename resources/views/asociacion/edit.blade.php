
@extends ('layouts.app')

@section ('titulo', 'Asociación Edit - ' .' ' .$asociaciones->nombreAsociacion)

@section ('content')

	<form class="form-group" method="POST" action="/asociacion/{{$asociaciones->idAsociacion}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group text-light">
			<label for="">Nombre</label>
			<input type="text" name="nombreAsociacion" class="form-control" value="{{$asociaciones->nombreAsociacion}}">
			<!--label for="">Imagen</label>
			<input type="file" name="imagenAsociacion" class="form-control" -->
			<label for="">Fundación</label>
			<input type="date" name="fundacionAsociacion" class="form-control" value="{{$asociaciones->fundacionAsociacion}}">
		
			<label for="">Sede</label>
			<input type="text" name="sedeAsociacion" class="form-control" value="{{$asociaciones->sedeAsociacion}}">
			
			
    		<label>País</label>a
    			<select name="idPais" class="form-control">
    				@foreach ($paises as $ps)
    					@if($asociaciones->idPais === $ps->idPais)
    				<option  value= "{{$ps['idPais']}}">Actual: {{$ps->nombrePais}}</option>
    					@endif
					@endforeach
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			
			<label>Federación</label>
    			<select name="idFederacion" class="form-control">
    				@foreach ($federaciones as $fed)
    					@if($asociaciones->idFederacion === $fed->idFederacion)
    				<option value="{{$fed['idFederacion']}}">Actual: {{$fed->nombreFederacion}}</option>
    					@endif
					@endforeach
    				@foreach ($federaciones as $fed)
    					<option value="{{$fed['idFederacion']}}">{{$fed['nombreFederacion']}}</option>
    				@endforeach
    			</select>


			<button type="submit" class="btn btn-primary">Editar</button>
			<a href="../../admin"><button class='btn btn-danger'>Atrás</button>

		
	</form>
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
            <div class="col">
                <div class="row">
                    <p>
                        
                    </p>
                </div>
            </div>
@endsection