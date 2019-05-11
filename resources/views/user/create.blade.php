
@extends ('layouts.app')

@section ('titulo', 'Usuario Create')

@section ('content')
	<form class="form-group" method="POST" action="/user">	
		@csrf
		<div class="form-group">

			
			<label for="">Nombre Usuario</label>
			<input type="text" name="name" class="form-control">
			<label for="">Correo</label>
			<input type="text" name="email" class="form-control">
			<label for="">Contraseña</label>
			<input type="password" name="password" class="form-control">
			
			
				

			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>

@endsection