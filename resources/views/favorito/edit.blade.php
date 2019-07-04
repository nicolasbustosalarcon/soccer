@extends ('layouts.app')

@section ('titulo', 'Club Favorito')

@section ('content')

<form class="form-group text-white" method="POST" action="/favorito/{{$favorito->idusuarioClub}}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<label>Seleccionar Club</label>
	<select name="club" class="form-control" required>
		<option value="{{$favorito->idusuarioClub}}" >Seleciona una opción...</option>
		@foreach ($clubes as $c)
		<option value="{{$c['idClub']}}">{{$c['nombreClub']}}</option>
		@endforeach
	</select>
	<button type="submit" class="btn btn-primary">Cambiar</button>
    <a href="favorito" class='btn btn-danger'>Atrás</a>

</form>
@endsection