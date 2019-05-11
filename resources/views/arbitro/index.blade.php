
@extends ('layouts.app')

@section ('titulo', 'Arbitros')

@section ('content')

	<div class="row">
		<div class="col">
			<h3>Datos ingresados correctamente.</h3>
			<a href="{{ route('admin.index')}}">Volver</a>
							</td>
		</div>
	</div>

<!--
	<a href="/arbitro/create" class="btn btn-default">Crear Arbitro</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Tipo</th>
				<th>Nacimiento</th>
				<th>Pais</th>
				<th>Edad</th>
				<th>Grado</th>
				
				<th>Acción</th>
				
			</thead>
			<tbody>
				@foreach($arbitros as $arb)
					<tr>
						<td>{{ $arb['idArbitro'] }}</td>
						<td>{{ $arb['nombreArbitro'] }}</td>
						<td>{{ $arb['apellidosArbitro'] }}</td>
						<td>{{ $arb['tipoArbitro'] }}</td>
						<td>{{ $arb['nacimientoArbitro'] }}</td>

						@foreach($paises as $pais)
							@if($arb->idPais === $pais->idPais)
								<td>{{ $pais['nombrePais'] }}</td>		
							@endif
						@endforeach
					
						<td>{{ $arb['edadArbitro'] }}</td>
						<td>{{ $arb['gradoArbitro'] }}</td>

						<td>
							<a href="/arbitro/{{$arb->idArbitro}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
							<a href="{{ route('arbitro.destroy', $arb->idArbitro)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el árbitro?')" class="btn btn-danger">Eliminar</a>
							</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

->


@endsection