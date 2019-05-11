
@extends ('layouts.app')

@section ('titulo', 'Estadios')

@section ('content')
	<a href="/estadio/create" class="btn btn-default">Crear Estadio</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>ID País</th>
				<th>ID Ciudad</th>
				<th>Inauguración</th>
				<th>Capacidad</th>
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($estadios as $est)
					<tr>
						<td>{{ $est['idEstadio'] }}</td>
						<td>{{ $est['nombreEstadio'] }}</td>

						@foreach($paises as $pais)
							@if($est->idPais === $pais->idPais)
								<td>{{ $pais['nombrePais'] }}</td>		
							@endif
						@endforeach
						
						@foreach($ciudades as $ciu)
							@if($est->idCiudad === $ciu->idCiudad)
								<td>{{ $ciu['nombreCiudad'] }}</td>		
							@endif
						@endforeach
						

						<td>{{ $est['inauguracionEstadio'] }}</td>
						<td>{{ $est['capacidadEstadio'] }} personas</td>


						
						<td>
							<a href="/estadio/{{$est->idEstadio}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
							<a href="{{ route('estadio.destroy', $est->idEstadio)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el estadio?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>



@endsection