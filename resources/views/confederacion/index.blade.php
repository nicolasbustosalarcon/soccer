
@extends ('layouts.app')

@section ('titulo', 'Confederaciones')

@section ('content')
	<a href="/confederacion/create" class="btn btn-default">Crear Confederación</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>ID Continente</th>
				<th>Nombre</th>
				<th>Fundación</th>
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($confederaciones as $conf)
					<tr>
						<td>{{ $conf['idConfederacion'] }}</td>

						@foreach($continentes as $cont)
							@if($conf->idContinente === $cont->idContinente)
								<td>{{ $cont['nombreContinente'] }}</td>		
							@endif
						@endforeach

						<td>{{ $conf['nombreConfederacion'] }}</td>
						<td>{{ $conf['fundacionConfederacion'] }}</td>
						
						<td>
							<a href="/confederacion/{{$conf->idConfederacion}}/edit" class="btn btn-warning">Editar<span class="glyphicon glyphicon-wrench"></span></a>
							<a href="{{ route('confederacion.destroy', $conf->idConfederacion)}}" onclick="return confirm('¿Estás seguro que deseas eliminar la confederación?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>	




@endsection