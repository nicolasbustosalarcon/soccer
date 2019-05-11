
@extends ('layouts.app')

@section ('titulo', 'Federaciones')

@section ('content')
	<a href="/federacion/create" class="btn btn-default">Crear Federación</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>ID Confederacion</th>
				<th>Nombre</th>
				<th>Fundación</th>
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($federaciones as $fed)
					<tr>
						<td>{{ $fed['idFederacion'] }}</td>

						@foreach($confederaciones as $conf)
							@if($fed->idConfederacion === $conf->idConfederacion)
								<td>{{ $conf['nombreConfederacion'] }}</td>		
							@endif
						@endforeach
					
						<td>{{ $fed['nombreFederacion'] }}</td>
						<td>{{ $fed['fundacionFederacion'] }}</td>
						
						<td>
							<a href="/federacion/{{$fed->idFederacion}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
							<a href="{{ route('federacion.destroy', $fed->idConfederacion)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la federación?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>	



@endsection