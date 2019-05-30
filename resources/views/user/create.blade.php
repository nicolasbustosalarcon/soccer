@extends ('layouts.app')
@section ('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Registro Usuario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'user','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
            	<label for="name">Nombre</label>
            	<input type="text" name="name" class="form-control"  placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="email">Correo</label>
            	<input type="text" name="email" class="form-control" placeholder="Correo...">
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Password</label>
                  <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                  </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                  <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                  </div>
            </div>
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
            {!!Form::close()!!}
            <div><a href="../../admin"><button class="btn btn-danger" type="reset">Cancelar</button></a>
            </div>
      </div>
</div>
@endsection