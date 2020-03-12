
@extends ('layouts.app')

@section ('titulo', 'Jugador' .$jugadores->idJugador)

@section ('content')
<!--div class="col">
    <div class="row">
        @if(auth()->user()->authorizeRolesLogin('admin')) 
            <a href="{{ route('imprimir.reporte', $jugadores->idJugador)}}" class="btn btn-outline-success my-2 my-sm-0">Generar reporte</a>
        @endif
    </div>
</div>

<section id="player" class="container">
    <div class="row">
        <div class="player col-sm-9">
            <div class="row">
                <div class="player-image col-sm-5">
                    <img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}" class="border border-warning" height="353x" width="320px">
                    <span class="gradient" ></span>
                </div>
                <div class="col-sm-7 border border-warning">
                    <div class="player-data text-white">
                    	<?php
                    	$x = 0;
                    	?>
                    	@foreach($trayectorias as $t)
                    	@if($t->idClub === $jugadores->idClub)
                    	@if($x === 0)
                        <div class="text-center">{{$t->camisetaJugador}}</div>
                        <?php
                        $x = 1;
                        ?>
                        @endif
                        @endif
                        @endforeach
                        <h1>{{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}</h1>
                        <h2>Posición: {{$jugadores->posicionJugador}}</h2>
                    </div>
                    <div class="row">
                    	<ul class="player-list text-white">
                    		<li class="b-day">Fecha de Nacimiento: <span>{{$jugadores->nacimientoJugador}}</span><br>
                    			
                    		</li>
                    		<li class="weight">Peso: <span>{{$jugadores->pesoJugador}}kg.</span><br>
                    			
                    		</li>
                    		<li class="height">Altura: <span>{{$jugadores->alturaJugador}}Mt.</span><br>
                    			
                    		</li>
                    		<li class="origin">Edad: <span>{{$jugadores->edadJugador}}</span><br>
                    			
                    		</li>
                    		@foreach($paises as $pais)
                    		@if($jugadores->idPais === $pais->idPais)
                    		<li class="country">Nacionalidad: <span>{{$pais->nombrePais}}</span><br>
                    			
                    		</li>
                    		@endif
                    		@endforeach
                    	</ul>
                    </div>
                    <div class="essb_break_scroll"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="related col-md-8 text-white">
            <div class="row">
            	<div class="container">
            		<h2>Trayectoria</h2>
                    <div class="col">
                    @if(auth()->user()->authorizeRolesLogin('admin')) 
                        <a href="{{ route('trayectoriajugador.create', $jugadores->idJugador)}}" class="btn btn-outline-info my-2 my-sm-0">Crear Trayectoria</a>
                    @endif
                </div>
            	</div>
            	<div class="container">
            		<div class="row">
            			@foreach($trayectorias as $t)
            			<div class="col-sm">
            				<th><a class="text-white" href="{{ route('club.show', $t->idClub)}}"><img src="{{asset('images/club/' .$t->imagen)}}" class="img-responsive" style="width:21px !important; height:21px !important">  {{$t->nombreClub}}</th></a>            	
            			</div>
            			@endforeach
            		</div>
            	</div>

                <!--<article class="col-sm-3">
                    <a href="https://www.udechile.cl/johnny-herrera-y-empate-ante-everton-estamos-firmes-y-ultra-claros-que-tenemos-un-plantel-para-salir-de-este-mal-momento/">
                        <div class="thumbnail">
                            <img src="https://www.udechile.cl/wp-content/uploads/2019/04/johnny-380x200.jpg">
                        </div>
                        <h1>Johnny Herrera y empate ante Everton: “Estamos firmes y ultra claros que tenemos un plantel para salir de este mal momento”</h1>
                    </a>
                </article>
                <article class="col-sm-3">
                    <a href="https://www.udechile.cl/las-declaraciones-de-torres-y-herrera-tras-la-derrota-ante-union-espanola/">
                        <div class="thumbnail">
                            <img src="https://www.udechile.cl/wp-content/uploads/2019/03/0S7A3498-380x200.jpg">
                        </div>
                        <h1>Las declaraciones de Torres y Herrera tras la caída frente a Unión Española</h1>
                    </a>
                </article>
                <article class="col-sm-3">
                    <a href="https://www.udechile.cl/la-goleada-desde-adentro-revive-todo-lo-que-paso-en-el-triunfo-sobre-huachipato/">
                        <div class="thumbnail">
                            <img src="https://www.udechile.cl/wp-content/uploads/2019/03/foto-web-gol-herrera-380x200.jpg">
                        </div>
                        <h1>🎥 La goleada desde adentro: Revive todo lo que pasó en el triunfo sobre Huachipato</h1>
                    </a>
                </article>
            </div>>
            <div class="row">
            <div class="col">
                <p></p>
                <p>.</p>
            </div>
        </div>
        </div>
    </div>
</section-->
	
		
<div class="row">
    
        <div class="col-3  d-flex align-content-around flex-wrap" >
            
                
                <div class="col-12 pt-1 text-center text-white align-self-start">
                    <h4><strong>{{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}</strong></h4>
                </div>

                <div class="col-12 pt-1 text-center text-white align-self-center">
                    <img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}"  height="150px" width="150px">
                </div>
                    
                <div class="col-12 pt-3 text-center text-white align-self-end">
                    @foreach($trayectorias as $t)
                        @if ($t->idClub === $jugadores->idClub)
                            
                          <h5><strong><img src="{{asset('images/club/' .$t->imagen)}}" class="img-responsive" style="width:40px !important; height:40px !important"></strong></h5>
                        @endif
                    @endforeach
                </div>
            
        </div>

        <div class="col-9">
            <table class="table table-secondary table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>DATOS JUGADOR</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Nombre</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Fecha de nacimiento</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->nacimientoJugador}} ({{$jugadores->edadJugador}} años)
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Posición</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->posicionJugador}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Pierna Hábil</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->pieJugador}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Altura</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->alturaJugador}} cm.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Peso</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->pesoJugador}} kg.
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>País</small>
                                </div>
                                <div class="col-12">
                                    @foreach ($paises as $pais)
                                        @if ($pais->idPais === $jugadores->idPais)
                                            {{$pais->nombrePais}}
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-secondary table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>TRAYECTORIA JUGADOR</th>
                        <th> @if(auth()->user()->authorizeRolesLogin('admin')) 
                        <a href="{{ route('trayectoriajugador.create', $jugadores->idJugador)}}" class="btn btn-outline-info my-2 my-sm-0">Crear Trayectoria</a>
                    @endif</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($trayectorias as $t)
                    
                
                    <tr>
                        <td>
                             @foreach ($torneos as $tor)
                                @if ($t->idTorneo === $tor->idTorneo)
                                <div class="row">
                                    <div class="col-12 text-secondary">
                                        <small>Temporada</small>
                                    </div>
                                    <div class="col-12">
                                        {{$tor->edicion}} 
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($clubes as $club)
                                @if ($t->idClub === $club->idClub)
                                    
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Club</small>
                                </div>
                                <div class="col-12">
                                    {{$club->nombreClub}} 
                                </div>
                            </div>
                            {{-- expr --}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                             @foreach ($torneos as $tor)
                                @if ($t->idTorneo === $tor->idTorneo)
                                <div class="row">
                                    <div class="col-12 text-secondary">
                                        <small>Torneo</small>
                                    </div>
                                    <div class="col-12">
                                        {{$tor->nombreTorneo}} 
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Camiseta</small>
                                </div>
                                <div class="col-12">
                                   # {{$t->camisetaJugador}} 
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>















	
<div class="row">
    <div class="col">
        <p></p>
        <p>.</p>
    </div>
</div>
@endsection