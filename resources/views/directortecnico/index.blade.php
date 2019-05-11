
@extends ('layouts.app')

@section ('titulo', 'Directores Tecnicos')

@section ('content')
	<a href="/directortecnico/create" class="btn btn-default">Crear Director Tecnico</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Nacimiento</th>
				<th>Edad</th>
				<th>Nacionalidad</th>


				
				
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($directorestecnicos as $dt)
					<tr>
						<td>{{ $dt['idDirectorTecnico'] }}</td>
						<td>{{ $dt['nombreDirectorTecnico'] }}</td>
						<td>{{ $dt['apellidosDirectorTecnico'] }}</td>
						<td>{{ $dt['nacimientoDirectorTecnico'] }}</td>
						<td>{{ $dt['edadDirectorTecnico'] }}</td>

						@foreach($paises as $pais)
							@if($dt->idPais === $pais->idPais)
								<td>{{ $pais['nombrePais'] }}</td>		
							@endif
						@endforeach
		


						
						<td>
							<a href="/directortecnico/{{$dt->idDirectorTecnico}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
							<a href="{{ route('directortecnico.destroy', $dt->idDirectorTecnico)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el DT?')" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>




@endsection