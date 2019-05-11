
@extends ('layouts.app')

@section ('titulo', 'Ciudades')

@section ('content')
	<a href="/ciudad/create" class="btn btn-default">Crear Ciudad</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>ID País</th>
				
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($ciudades as $ciu)
					<tr>
						<td>{{ $ciu['idCiudad'] }}</td>
						<td>{{ $ciu['nombreCiudad'] }}</td>

						@foreach($paises as $pais)
							@if($ciu->idPais === $pais->idPais)
								<td>{{ $pais['nombrePais'] }}</td>		
							@endif
						@endforeach
					
						


						
						<td>
							<a href="/ciudad/{{$ciu->idCiudad}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
							<a href="{{ route('ciudad.destroy', $ciu->idCiudad)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la ciudad?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>




@endsection