
@extends ('layouts.app')

@section ('titulo', 'Asociaciones')

@section ('content')

<div class="row">
		<div class="col">
			<h3>Datos ingresados correctamente.</h3>
			<a href="{{ route('admin.index')}}">Volver</a>
							</td>
		</div>
	</div>

<!--
	<a href="/asociacion/create" class="btn btn-default">Crear Asociación</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>ID Federación</th>
				<th>Nombre</th>
				<th>Fundación</th>
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($asociaciones as $asoc)
					<tr>
						<td>{{ $asoc['idAsociacion'] }}</td>

						@foreach($federaciones as $fed)
							@if($asoc->idFederacion === $fed->idFederacion)
								<td>{{ $fed['nombreFederacion'] }}</td>		
							@endif
						@endforeach

						<td>{{ $asoc['nombreAsociacion'] }}</td>
						<td>{{ $asoc['fundacionAsociacion'] }}</td>
						
						<td>
							<a href="/asociacion/{{$asoc->idAsociacion}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
							<a href="{{ route('asociacion.destroy', $asoc->idAsociacion)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la asociación?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>	
-->



@endsection