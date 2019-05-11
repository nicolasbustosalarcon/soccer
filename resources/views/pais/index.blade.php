
@extends ('layouts.app')

@section ('titulo', 'Países')

@section ('content')

<!--------READ DE LOS PAISES------------------------->
	<div class="row">
		<div class="col">
			<a href="/pais/create" class="btn btn-default">Añadir nuevo País...</a>


			<div class="row">
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Continente</th>
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						@foreach($paises as $pais)
							<tr>
								<td>{{ $pais['idPais'] }}</td>
								<td>{{ $pais['nombrePais'] }}</td>

								@foreach($continentes as $cont)
									@if($pais->idContinente === $cont->idContinente)
										<td>{{ $cont['nombreContinente'] }}</td>		
									@endif
								@endforeach
								
    			
								
								<td>
									<a href="/pais/{{$pais->idPais}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
									<a href="{{ route('pais.destroy', $pais->idPais)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el país?')" class="btn btn-danger">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>		
	</div>















@endsection