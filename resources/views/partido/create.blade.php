@extends ('layouts.app')

@section ('titulo', 'Partido Create')

@section ('content')
	<form class="form-group" method="POST" action="/partido">	
		@csrf
		<div class="form-group">

			<label>Club Local</label>
    			<select name="clubLocalPartido" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>
			<label for="">Goles Local</label>
			<input type="text" name="golesLocalPartido" class="form-control">
			

			<label>Club Visita</label>
    			<select name="clubVisitaPartido" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($clubes as $club)
    					<option value="{{$club['idClub']}}">{{$club['nombreClub']}}</option>
    				@endforeach
    			</select>
			<label for="">Goles Visita</label>
			<input type="text" name="golesVisitaPartido" class="form-control">
			<label for="">Fecha</label>
			<input type="date" name="fechaPartido" class="form-control">
            <label for="">Hora</label>
            <input type="time" name="horaPartido" class="form-control">
			<label for="">Jornada</label>
			<input type="text" name="jornadaPartido" class="form-control">

			<label>Estado</label>
			<select name="estadoPartido" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="Expirado">Expirado</option>
					<option value="Proximo">Proximo</option>
					<option value="Suspendido">Suspendido</option>
					<option value="enCurso">En curso</option>


			</select>	
			

			<label>Tipo de Partido</label>
			<select name="TipoPartido" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="amistoso">Amistoso</option>
					<option value="oficial">Oficial</option>
			</select>
			
			<label>Torneo</label>
    			<select name="idTorneo" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($torneos as $tor)
    					<option value="{{$tor['idTorneo']}}">{{$tor['nombreTorneo']}}</option>
    				@endforeach
    			</select>

					
			<label>Estadio</label>
    			<select name="idEstadio" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($estadios as $est)
    					<option value="{{$est['idEstadio']}}">{{$est['nombreEstadio']}}</option>
    				@endforeach
    			</select>
			
    		<label>Arbitro Central</label>
    			<select name="idArbitroCentral" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($arbitros as $arc)
    					<option value="{{$arc['idArbitro']}}">{{$arc['nombreArbitro']}} {{$arc['apellidosArbitro']}}</option>
    				@endforeach
    			</select>

    		<label>Arbitro Asistente número 1</label>
    			<select name="idArbitroAsistente1" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($arbitros as $aa1)
    					<option value="{{$aa1['idArbitro']}}">{{$aa1['nombreArbitro']}} {{$aa1['apellidosArbitro']}}</option>
    				@endforeach
    			</select>

    		<label>Arbitro Asistente número 2</label>
    			<select name="idArbitroAsistente2" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($arbitros as $aa2)
    					<option value="{{$aa2['idArbitro']}}">{{$aa2['nombreArbitro']}} {{$aa2['apellidosArbitro']}}</option>
    				@endforeach
    			</select>

    		<label>Cuarto Arbitro</label>
    			<select name="idCuartoArbitro" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($arbitros as $car)
    					<option value="{{$car['idArbitro']}}">{{$car['nombreArbitro']}} {{$car['apellidosArbitro']}}</option>
    				@endforeach
    			</select>
			
			

			<button type="submit" class="btn btn-primary">Guardar</button>
            <a href="../../admin" class='btn btn-danger'>Atrás</a>
		</div>
	</form>

@endsection