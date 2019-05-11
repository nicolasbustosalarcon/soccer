
@extends ('layouts.app')

@section ('titulo', 'Usuarios')

@section ('content')
<!---------READ DEL LISTADO DE CLUBES----->
	<a href="/user/create" class="btn btn-default">Crear Usuario</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Tipo</th>				
				<th>Acción</th>				
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user['id'] }}</td>
						<td>{{ $user['name'] }}</td>
						<td>{{ $user['email'] }}</td>
						<td>{{ $user->tipo}}</td>
						<td>
							<a href="/user/{{$user->id}}/edit" class="btn btn-warning">Editar</a>			
							<a href="{{ route('user.destroy', $user->id)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el usuario?')" class="btn btn-danger">Eliminar</a>	
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection