
@extends ('layouts.app')

@section ('titulo', 'User Edit - ' .' ' .$users->name)

@section ('content')

	<form class="form-group" method="POST" action="/user/{{$users->id}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">

			
			<label for="">Nombre Usuario</label>
			<input type="text" name="name" class="form-control" value="{{$users->name}}">
			<label for="">Correo</label>
			<input type="text" name="email" class="form-control" value="{{$users->email}}">
			<label for="">Contraseña</label>
			<input type="password" name="password" class="form-control" value="">
			<!--label for="">Tipo</label>
			<select name="tipoUsuario" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="usuario">Usuario</option>
					<option value="secretaria">Secretaria</option>
					<option value="administrador">Administrador</option>
					


			</select-->	

				

			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
		<a href="../../user"><button class='btn btn-danger'>Atrás</button></a>

@endsection