@extends ('layouts.app')

@section ('titulo', 'Equipo Favorito')

@section ('content')
	<form class="form-group" method="POST" action="/favorito">	
		@csrf
		<div class="form-group text-light">

			<label>Mi Club</label>
    			<select name="club" class="form-control" required>
    				<option disabled selected value>Seleciona tu club favorito...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>
			
			

			<button type="submit" class="btn btn-primary">Guardar</button>
            <a href="../../favorito" class='btn btn-danger'>Atrás</a>
		</div>
	</form>

@endsection